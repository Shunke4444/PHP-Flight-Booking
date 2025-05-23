document.addEventListener('DOMContentLoaded', () => {
  const svg = document.querySelector('.map-container svg');
  const hoveredInput = document.getElementById('hovered-country');
  const selectedInput = document.getElementById('selected-country');
  const countryInput = document.getElementById('country');
  const useCountryBtn = document.getElementById('useCountryBtn');

  if (!svg) {
    console.error('SVG not found in .map-container');
    return;
  }

  const panzoom = Panzoom(svg, {
    maxScale: 5,
    minScale: 1,
    contain: 'none',
  });

  svg.parentElement.addEventListener('wheel', panzoom.zoomWithWheel);
  svg.setAttribute('tabindex', 0);

  const countries = svg.querySelectorAll('path');

countries.forEach(path => {
  const originalFill = path.style.fill;

function getCountryName(path) {
  // Use the title attribute if present (your SVG uses this)
  if (path.hasAttribute('title') && path.getAttribute('title').trim()) {
    return path.getAttribute('title').trim();
  }
  // Fallback to id
  return path.id || 'Unknown';
}

  path.addEventListener('mouseenter', () => {
    const countryName = getCountryName(path);
    path.style.fill = 'yellow';
    hoveredInput.value = countryName;
  });

  path.addEventListener('mouseleave', () => {
    path.style.fill = originalFill || '';
    hoveredInput.value = '';
  });

  path.addEventListener('click', () => {
    const countryName = getCountryName(path);
    if (countryName) {
      selectedInput.value = countryName;
      countryInput.value = countryName;
      countryInput.focus();
    }
  });
});

  useCountryBtn?.addEventListener('click', () => {
    if (hoveredInput.value) {
      selectedInput.value = hoveredInput.value;
      countryInput.value = hoveredInput.value;
      countryInput.focus();
    }
  });

  // Booking form logic
  const form = document.getElementById('bookingForm');
  const modal = document.getElementById('confirmationModal');
  const confirmationDetails = document.getElementById('confirmationDetails');
  const editBtn = document.getElementById('editBtn');
  const confirmBtn = document.getElementById('confirmBtn');

  const dateInput = document.getElementById('travel-date');
  const groupSizeSelect = document.getElementById('group-size');
  const membersInput = document.getElementById('members');

  const today = new Date().toISOString().split('T')[0];
  if (dateInput) {
    dateInput.setAttribute('min', today);
  }

  groupSizeSelect.addEventListener('change', () => {
    const value = groupSizeSelect.value;
    if (value === 'Solo') {
      membersInput.value = 1;
      membersInput.readOnly = true;
    } else if (value === 'Couple') {
      membersInput.value = 2;
      membersInput.readOnly = true;
    } else if (value === 'Group') {
      membersInput.value = '';
      membersInput.readOnly = false;
    } else {
      membersInput.value = '';
      membersInput.readOnly = false;
    }
  });

  form.addEventListener('submit', e => {
    e.preventDefault();

    const formData = new FormData(form);
    const groupSize = groupSizeSelect.value;
    const members = parseInt(membersInput.value, 10);

    if (!groupSize || !members || isNaN(members)) {
      alert('Please fill in all required fields correctly.');
      return;
    }

    if (groupSize === 'Solo' && members !== 1) {
      alert('Solo selection must have 1 member.');
      return;
    }
    if (groupSize === 'Couple' && members !== 2) {
      alert('Couple selection must have 2 members.');
      return;
    }
    if (groupSize === 'Group' && (members < 3 || members > 20)) {
      alert('Group must be between 3 and 20 members.');
      return;
    }

    let summaryHtml = `<ul>`;
    const addedKeys = new Set();
    for (let [key, value] of formData.entries()) {
      if (addedKeys.has(key)) continue;
      addedKeys.add(key);

      let displayValue = value;
      if (key === 'activity' || key === 'info') {
        const allVals = formData.getAll(key);
        displayValue = allVals.length > 0 ? allVals.join(', ') : 'None';
      }
      if (!value) displayValue = 'N/A';

      const labelMap = {
        'city': 'City or closest major city',
        'country': 'Country or Region',
        'travel-date': 'Travel Date',
        'group-size': 'Group Size',
        'members': 'Number of Members',
        'budget': 'Budget (₱)',
        'activity': 'Activities',
        'info': 'Information Requested'
      };

      if (labelMap[key]) {
        summaryHtml += `<li><strong>${labelMap[key]}:</strong> ${displayValue}</li>`;
      }
    }
    summaryHtml += `</ul>`;
    confirmationDetails.innerHTML = summaryHtml;
    modal.style.display = 'flex';
  });

  editBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  confirmBtn.addEventListener('click', () => {
    modal.style.display = 'none';
    alert('Booking confirmed! Thank you for your submission.');
  });
});
