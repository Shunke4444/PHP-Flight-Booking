document.addEventListener('DOMContentLoaded', function() {
    const hotels = [
        {
            id: 1,
            name: "The Manila Hotel",
            distance: "2.02 km from city centre",
            rating: 4.2,
            reviews: 2094,
            price: "P6,842",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80",
            description: "A historic 5-star hotel in Manila offering luxurious accommodations with a blend of classic and modern Filipino design. Located near Rizal Park with stunning views of Manila Bay.",
            amenities: ["Free WiFi", "Swimming Pool", "Spa", "Fitness Center", "Restaurant", "24-hour Room Service"]
        },
        {
            id: 2,
            name: "New Coast Hotel Manila",
            distance: "2.81 km from city centre",
            rating: 4.5,
            reviews: 3543,
            price: "P5,321",
            image: "https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80",
            description: "Contemporary hotel featuring modern rooms with city views, an outdoor pool, and multiple dining options. Conveniently located near shopping and business districts.",
            amenities: ["Free WiFi", "Outdoor Pool", "Business Center", "Airport Shuttle", "Bar/Lounge", "Conference Facilities"]
        },
        {
            id: 3,
            name: "Manila Prince Hotel",
            distance: "1.64 km from city centre",
            rating: 4.3,
            reviews: 137,
            price: "P4,099",
            image: "https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80",
            description: "Comfortable mid-range hotel offering clean accommodations with essential amenities. Great value for money in a central location.",
            amenities: ["Free WiFi", "Restaurant", "24-hour Front Desk", "Laundry Service", "Meeting Rooms", "Safety Deposit Box"]
        }
    ];

    const hotelCardsContainer = document.querySelector('.hotel-cards');
    const modal = document.getElementById('hotelModal');
    const closeModal = document.querySelector('.close-modal');
    const bookNowBtn = document.getElementById('book-now-btn');

    // Create hotel cards
    hotels.forEach(hotel => {
        const starRating = '★'.repeat(Math.floor(hotel.rating)) + '☆'.repeat(5 - Math.floor(hotel.rating));
        
        const card = document.createElement('div');
        card.className = 'hotel-card';
        
        card.innerHTML = `
            <img src="${hotel.image}" alt="${hotel.name}" style="width:100%; height:200px; object-fit:cover;">
            <div class="hotel-content">
                <h3 class="hotel-name">${hotel.name}</h3>
                <p class="hotel-distance"><i class="fas fa-map-marker-alt"></i> ${hotel.distance}</p>
                
                <div class="hotel-rating">
                    <span class="rating-stars">${starRating}</span>
                    <span class="rating-text">${hotel.rating} (${hotel.reviews} reviews)</span>
                </div>
                
                <div class="divider"></div>
                
                <div class="hotel-price">${hotel.price}</div>
                <div class="price-period">Per night</div>
                
                <button class="book-btn view-details-btn" data-id="${hotel.id}">View Details</button>
            </div>
        `;
        
        hotelCardsContainer.appendChild(card);
    });

    // Modal functionality
    const viewDetailsBtns = document.querySelectorAll('.view-details-btn');
    
    viewDetailsBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const hotelId = parseInt(this.getAttribute('data-id'));
            const hotel = hotels.find(h => h.id === hotelId);
            
            if (hotel) {
                openModal(hotel);
            }
        });
    });

    function openModal(hotel) {
        const starRating = '★'.repeat(Math.floor(hotel.rating)) + '☆'.repeat(5 - Math.floor(hotel.rating));
        
        document.getElementById('modal-hotel-name').textContent = hotel.name;
        document.getElementById('modal-rating').innerHTML = `
            <span class="rating-stars">${starRating}</span>
            <span class="rating-text">${hotel.rating} (${hotel.reviews} reviews)</span>
        `;
        document.getElementById('modal-distance').innerHTML = `
            <i class="fas fa-map-marker-alt"></i> ${hotel.distance}
        `;
        document.getElementById('modal-hotel-image').src = hotel.image;
        document.getElementById('modal-hotel-image').alt = hotel.name;
        document.getElementById('modal-description').textContent = hotel.description;
        document.getElementById('modal-price').textContent = hotel.price;
        
        const amenitiesList = document.getElementById('modal-amenities');
        amenitiesList.innerHTML = '';
        hotel.amenities.forEach(amenity => {
            const li = document.createElement('li');
            li.innerHTML = `<i class="fas fa-check"></i> ${amenity}`;
            amenitiesList.appendChild(li);
        });
        
        // Set the Book Now button to link to travelPlanner.php with hotel ID
        bookNowBtn.href = `travelPlanner.php?id=${hotel.id}`;
        
        modal.style.display = 'block';
    }

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});