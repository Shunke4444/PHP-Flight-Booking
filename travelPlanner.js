 document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('bookingModal');
      const bookNowBtns = document.querySelectorAll('.explore-btn, .travel-btn, .travel-planner-btn');
      const closeBtn = document.querySelector('.close-btn');
      const bookInfoBtns = document.querySelectorAll('.book-btn');
      
      function openModal() {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
      }
      
      function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
      }
      
      bookNowBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          openModal();
        });
      });

      bookInfoBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          openModal();
        });
      });
      
      closeBtn.addEventListener('click', closeModal);
      
      window.addEventListener('click', function(e) {
        if (e.target === modal) {
          closeModal();
        }
      });
      
      const bookingForm = document.getElementById('bookingForm');
      bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const destination = document.getElementById('destination').value;
        const travelDate = document.getElementById('travel-date').value;
        const travelers = document.getElementById('travelers').value;
        const budget = document.getElementById('budget').value;
        const interests = Array.from(document.getElementById('interests').selectedOptions)
                              .map(option => option.value);
        
        console.log('Form submitted:', { 
          destination, 
          travelDate, 
          travelers, 
          budget, 
          interests 
        });
        
        closeModal();
        alert('Your travel request has been submitted! We\'ll contact you soon.');
        bookingForm.reset();
      });
    });


    document.addEventListener('DOMContentLoaded', function() {
    const travelDateInput = document.getElementById('travel-date');
    if (travelDateInput) {
      const today = new Date();
      const yyyy = today.getFullYear();
      const mm = String(today.getMonth() + 1).padStart(2, '0');
      const dd = String(today.getDate()).padStart(2, '0');
      const minDate = `${yyyy}-${mm}-${dd}`;
      travelDateInput.setAttribute('min', minDate);
    }
  });



document.addEventListener('DOMContentLoaded', function() {
  const bookingModal = document.getElementById('bookingModal');
  const confirmationModal = document.getElementById('confirmationModal');
  const closeBtns = document.querySelectorAll('.close-btn');
  const bookNowBtns = document.querySelectorAll('.explore-btn, .travel-btn, .travel-planner-btn');
  const bookInfoBtns = document.querySelectorAll('.book-btn');
  const bookingForm = document.getElementById('bookingForm');
  const confirmationDetails = document.getElementById('confirmationDetails');
  const editBtn = document.getElementById('editBtn');
  const confirmBtn = document.getElementById('confirmBtn');

  function openModal(modal) {
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
  }
  
  function closeModal(modal) {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
  
  bookNowBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      openModal(bookingModal);
    });
  });

  bookInfoBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      openModal(bookingModal);
    });
  });
  
  closeBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const modal = this.closest('.modal');
      closeModal(modal);
    });
  });
  
  window.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
      closeModal(e.target);
    }
  });

  bookingForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = {
      city: document.getElementById('city').value,
      country: document.getElementById('country').value,
      travelDate: document.getElementById('travel-date').value,
      groupSize: document.getElementById('group-size').value,
      members: document.getElementById('members').value,
      budget: document.getElementById('budget').value || 'Not specified',
      activities: Array.from(document.querySelectorAll('input[name="activity"]:checked')).map(el => el.nextElementSibling.textContent).join(', '),
      information: Array.from(document.querySelectorAll('input[name="info"]:checked')).map(el => el.nextElementSibling.textContent).join(', ')
    };

    const formattedDate = formData.travelDate ? new Date(formData.travelDate).toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    }) : 'Not specified';

    confirmationDetails.innerHTML = `
      <p><strong>Destination:</strong> ${formData.city}, ${formData.country}</p>
      <p><strong>Travel Date:</strong> ${formattedDate}</p>
      <p><strong>Group Type:</strong> ${formData.groupSize}</p>
      <p><strong>Number of Members:</strong> ${formData.members}</p>
      <p><strong>Budget:</strong> $${formData.budget}</p>
      <p><strong>Activities:</strong> ${formData.activities || 'None selected'}</p>
      <p><strong>Information Needed:</strong> ${formData.information || 'None selected'}</p>
    `;

    closeModal(bookingModal);
    openModal(confirmationModal);
  });

  editBtn.addEventListener('click', function() {
    closeModal(confirmationModal);
    openModal(bookingModal);
  });

  confirmBtn.addEventListener('click', function() {
    alert('Your booking has been confirmed! Thank you for choosing our service.');
    closeModal(confirmationModal);
    bookingForm.reset();
  });
});
