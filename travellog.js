document.addEventListener('DOMContentLoaded', function() {
    const travelForm = document.getElementById('travel-form');
    const travelList = document.getElementById('travel-list');
    const imageInput = document.getElementById('images');
    const imagePreview = document.getElementById('image-preview');

    // Load and display entries from database on page load
    fetchTravelEntries();

    // Image preview functionality (unchanged)
    imageInput.addEventListener('change', function() {
        imagePreview.innerHTML = '';
        if (this.files && this.files.length > 0) {
            Array.from(this.files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        imagePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });

    // Form submission - modified to work with PHP backend
    travelForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(travelForm);
        
        fetch('travelLog.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            } else {
                return response.text();
            }
        })
        .then(data => {
            if (data) {
                console.error('Server response:', data);
                alert('Error submitting form. Check console for details.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving your travel entry');
        });
    });

    // Fetch entries from database
    function fetchTravelEntries() {
        fetch('getTravelEntries.php')
            .then(response => response.json())
            .then(entries => {
                renderTravelEntries(entries);
            })
            .catch(error => {
                console.error('Error fetching entries:', error);
                travelList.innerHTML = '<p class="no-entries">Error loading travel entries</p>';
            });
    }

    // Render entries - modified to work with database data
    function renderTravelEntries(entries) {
        travelList.innerHTML = '';

        if (!entries || entries.length === 0) {
            travelList.innerHTML = '<p class="no-entries">No travel entries yet. Add your first trip!</p>';
            return;
        }

        const sortedEntries = [...entries].sort((a, b) => new Date(b.travel_date) - new Date(a.travel_date));

        sortedEntries.forEach(entry => {
            const template = document.getElementById('travel-entry-template');
            const li = template.content.cloneNode(true).querySelector('li');
            
            li.querySelector('.delete-btn').dataset.id = entry.id;
            li.querySelector('.destination-title').textContent = entry.destination;
            li.querySelector('.date').textContent = formatDate(entry.travel_date);
            li.querySelector('.notes').textContent = entry.notes;
            
            const imagesContainer = li.querySelector('.travel-images');
            if (entry.images && entry.images.length === 0) {
                imagesContainer.remove();
            } else if (entry.images) {
                entry.images.forEach(img => {
                    const imgEl = document.createElement('img');
                    imgEl.src = `view_image.php?id=${img.id}`;
                    imgEl.alt = entry.destination;
                    imagesContainer.appendChild(imgEl);
                });
            }
            
            travelList.appendChild(li);
        });

        // Attach delete handlers
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this travel entry?')) {
                    const id = parseInt(this.getAttribute('data-id'));
                    deleteEntry(id);
                }
            });
        });
    }

    // Delete entry - modified for database
    function deleteEntry(id) {
        fetch('deleteTravelEntry.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${id}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchTravelEntries(); // Refresh the list
            } else {
                alert('Error deleting entry: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the entry');
        });
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
// document.addEventListener('DOMContentLoaded', function () {
//     const travelForm = document.getElementById('travel-form');
//     const travelList = document.getElementById('travel-list');
//     const imageInput = document.getElementById('images');
//     const imagePreview = document.getElementById('image-preview');
//     let travelEntries = JSON.parse(localStorage.getItem('travelEntries')) || [];

//     renderTravelEntries();

//     imageInput.addEventListener('change', function () {
//         imagePreview.innerHTML = '';
//         if (this.files && this.files.length > 0) {
//             Array.from(this.files).forEach(file => {
//                 if (file.type.startsWith('image/')) {
//                     const reader = new FileReader();
//                     reader.onload = function (e) {
//                         const img = document.createElement('img');
//                         img.src = e.target.result;
//                         imagePreview.appendChild(img);
//                     };
//                     reader.readAsDataURL(file);
//                 }
//             });
//         }
//     });

//     travelForm.addEventListener('submit', async function (e) {
//         e.preventDefault();

//         const destination = document.getElementById('destination').value.trim();
//         const date = document.getElementById('date').value;
//         const notes = document.getElementById('notes').value.trim();
//         const images = imageInput.files;

//         if (!destination || !date || !notes) {
//             alert('Please fill in all required fields');
//             return;
//         }

//         const newEntry = {
//             id: Date.now(),
//             destination,
//             date,
//             notes,
//             images: []
//         };

//         try {
//             if (images && images.length > 0) {
//                 const imagePromises = Array.from(images)
//                     .filter(file => file.type.match('image.*'))
//                     .map(file => {
//                         return new Promise((resolve) => {
//                             const reader = new FileReader();
//                             reader.onload = function (e) {
//                                 resolve(e.target.result);
//                             };
//                             reader.readAsDataURL(file);
//                         });
//                     });

//                 newEntry.images = await Promise.all(imagePromises);
//             }

//             travelEntries.push(newEntry);
//             localStorage.setItem('travelEntries', JSON.stringify(travelEntries));
//             renderTravelEntries();

//             travelForm.reset();
//             imagePreview.innerHTML = '';
//             imageInput.value = '';

//         } catch (error) {
//             console.error('Error saving travel entry:', error);
//             alert('An error occurred while saving your travel entry');
//         }
//     });

//   function renderTravelEntries() {
//   travelList.innerHTML = '';

//   if (travelEntries.length === 0) {
//     travelList.innerHTML = '<p class="no-entries">No travel entries yet. Add your first trip!</p>';
//     return;
//   }

//   const sortedEntries = [...travelEntries].sort((a, b) => new Date(b.date) - new Date(a.date));

//   sortedEntries.forEach(entry => {
//     const template = document.getElementById('travel-entry-template');
//     const li = template.content.cloneNode(true).querySelector('li');
    
//     li.querySelector('.delete-btn').dataset.id = entry.id;
//     li.querySelector('.destination-title').textContent = entry.destination;
//     li.querySelector('.date').textContent = formatDate(entry.date);
//     li.querySelector('.notes').textContent = entry.notes;
    
//     const imagesContainer = li.querySelector('.travel-images');
//     if (entry.images.length === 0) {
//       imagesContainer.remove();
//     } else {
//       entry.images.forEach(img => {
//         const imgEl = document.createElement('img');
//         imgEl.src = img;
//         imgEl.alt = entry.destination;
//         imagesContainer.appendChild(imgEl);
//       });
//     }
    
//     travelList.appendChild(li);
//   });

//   document.querySelectorAll('.delete-btn').forEach(button => {
//     button.addEventListener('click', function () {
//       if (confirm('Are you sure you want to delete this travel entry?')) {
//         const id = parseInt(this.getAttribute('data-id'));
//         deleteEntry(id);
//       }
//     });
//   });
// }
//     function deleteEntry(id) {
//         travelEntries = travelEntries.filter(entry => entry.id !== id);
//         localStorage.setItem('travelEntries', JSON.stringify(travelEntries));
//         renderTravelEntries();
//     }

//     function formatDate(dateString) {
//         try {
//             const options = { year: 'numeric', month: 'long', day: 'numeric' };
//             return new Date(dateString).toLocaleDateString('en-US', options);
//         } catch (e) {
//             return dateString; 
//         }
//     }
// });