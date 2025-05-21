document.addEventListener('DOMContentLoaded', function () {
    const travelForm = document.getElementById('travel-form');
    const travelList = document.getElementById('travel-list');
    const imageInput = document.getElementById('images');
    const imagePreview = document.getElementById('image-preview');
    let travelEntries = JSON.parse(localStorage.getItem('travelEntries')) || [];

    renderTravelEntries();

    imageInput.addEventListener('change', function () {
        imagePreview.innerHTML = '';
        if (this.files && this.files.length > 0) {
            Array.from(this.files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        imagePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });

    travelForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const destination = document.getElementById('destination').value.trim();
        const date = document.getElementById('date').value;
        const notes = document.getElementById('notes').value.trim();
        const images = imageInput.files;

        if (!destination || !date || !notes) {
            alert('Please fill in all required fields');
            return;
        }

        const newEntry = {
            id: Date.now(),
            destination,
            date,
            notes,
            images: []
        };

        try {
            if (images && images.length > 0) {
                const imagePromises = Array.from(images)
                    .filter(file => file.type.match('image.*'))
                    .map(file => {
                        return new Promise((resolve) => {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                resolve(e.target.result);
                            };
                            reader.readAsDataURL(file);
                        });
                    });

                newEntry.images = await Promise.all(imagePromises);
            }

            travelEntries.push(newEntry);
            localStorage.setItem('travelEntries', JSON.stringify(travelEntries));
            renderTravelEntries();

            travelForm.reset();
            imagePreview.innerHTML = '';
            imageInput.value = '';

        } catch (error) {
            console.error('Error saving travel entry:', error);
            alert('An error occurred while saving your travel entry');
        }
    });

  function renderTravelEntries() {
  travelList.innerHTML = '';

  if (travelEntries.length === 0) {
    travelList.innerHTML = '<p class="no-entries">No travel entries yet. Add your first trip!</p>';
    return;
  }

  const sortedEntries = [...travelEntries].sort((a, b) => new Date(b.date) - new Date(a.date));

  sortedEntries.forEach(entry => {
    const template = document.getElementById('travel-entry-template');
    const li = template.content.cloneNode(true).querySelector('li');
    
    li.querySelector('.delete-btn').dataset.id = entry.id;
    li.querySelector('.destination-title').textContent = entry.destination;
    li.querySelector('.date').textContent = formatDate(entry.date);
    li.querySelector('.notes').textContent = entry.notes;
    
    const imagesContainer = li.querySelector('.travel-images');
    if (entry.images.length === 0) {
      imagesContainer.remove();
    } else {
      entry.images.forEach(img => {
        const imgEl = document.createElement('img');
        imgEl.src = img;
        imgEl.alt = entry.destination;
        imagesContainer.appendChild(imgEl);
      });
    }
    
    travelList.appendChild(li);
  });

  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
      if (confirm('Are you sure you want to delete this travel entry?')) {
        const id = parseInt(this.getAttribute('data-id'));
        deleteEntry(id);
      }
    });
  });
}
    function deleteEntry(id) {
        travelEntries = travelEntries.filter(entry => entry.id !== id);
        localStorage.setItem('travelEntries', JSON.stringify(travelEntries));
        renderTravelEntries();
    }

    function formatDate(dateString) {
        try {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        } catch (e) {
            return dateString; 
        }
    }
});