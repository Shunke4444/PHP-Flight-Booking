function showSuccess() {
    const successModal = document.getElementById('successModal');
    if (successModal) {
        successModal.style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.checkbox-option').forEach(option => {
    option.addEventListener('click', function(e) {
      // Prevent double toggling if the checkbox itself was clicked
      if (e.target.tagName.toLowerCase() === 'input') return;
      const checkbox = this.querySelector('input[type="checkbox"]');
      if (checkbox) checkbox.checked = !checkbox.checked;
    });
  });
  
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
      // Use the title attribute if present
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

  const form = document.getElementById('bookingForm');
  const modal = document.getElementById('confirmationModal');
  const confirmationDetails = document.getElementById('confirmationDetails');
  const editBtn = document.getElementById('editBtn');
  const confirmBtn = document.getElementById('confirmBtn');

  const dateInput = document.getElementById('travel-date');
  const groupSizeSelect = document.getElementById('group-size');
  const membersInput = document.getElementById('members');
  const contactNumberInput = document.getElementById('contact-number');

  const today = new Date().toISOString().split('T')[0];
  if (dateInput) {
    dateInput.setAttribute('min', today);
  }

  if (contactNumberInput) {
    contactNumberInput.addEventListener('input', function () {
      // Allow only numbers, +, and spaces
      this.value = this.value.replace(/[^0-9+ ]/g, '');
    });
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

  // The form submit handler is intentionally removed as requested.
  // If you want to add custom logic for the button, you can do so here.

  editBtn?.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  confirmBtn?.addEventListener('click', () => {
    modal.style.display = 'none';
    alert('Booking confirmed! Thank you for your submission.');
  });
});