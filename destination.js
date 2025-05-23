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
            name: "Marina Bay Sands",
            distance: "0.5 km from city centre",
            rating: 4.7,
            reviews: 18500,
            price: "S$550",
            image: "https://images.unsplash.com/photo-1525625293386-3f8f99389edd?q=80&w=1952&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Iconic 5-star hotel with the world's largest rooftop infinity pool overlooking Singapore's skyline.",
            amenities: ["Infinity Pool", "Casino", "Luxury Shopping", "SkyPark", "Celebrity Chef Restaurants"]
        },
        {
            id: 3,
            name: "Taj Lake Palace",
            distance: "On Lake Pichola",
            rating: 4.8,
            reviews: 3200,
            price: "₹35,000",
            image: "https://plus.unsplash.com/premium_photo-1661963050879-c6abd84f0261?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "17th-century white marble palace floating on Udaipur's lake, offering royal luxury.",
            amenities: ["Private Boat Transfer", "Palace Tours", "Jiva Spa", "Fine Dining", "Cultural Shows"]
        },
        {
            id: 4,
            name: "Hotel Ritz Paris",
            distance: "0.1 km from Place Vendôme",
            rating: 4.9,
            reviews: 4200,
            price: "€1,200",
            image: "https://plus.unsplash.com/premium_photo-1733342441106-96a5e23b2c9f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Legendary palace hotel hosting icons like Coco Chanel and Hemingway since 1898.",
            amenities: ["Chanel Spa", "Michelin-star Dining", "Historic Bar", "Luxury Shopping Concierge"]
        },
        {
            id: 5,
            name: "Icehotel",
            distance: "200 km from Arctic Circle",
            rating: 4.5,
            reviews: 1800,
            price: "SEK 3,500",
            image: "https://images.unsplash.com/photo-1518186285589-2f7649de83e0",
            description: "World's first hotel made entirely of ice and snow, rebuilt annually.",
            amenities: ["Northern Lights Viewing", "Ice Sculpting Classes", "Dog Sledding", "Absolut Icebar"]
        },
        {
            id: 6,
            name: "Burj Al Arab",
            distance: "Private Island",
            rating: 4.8,
            reviews: 12500,
            price: "AED 6,000",
            image: "https://images.unsplash.com/photo-1518684079-3c830dcef090",
            description: "7-star sail-shaped hotel with gold interiors and helicopter transfers.",
            amenities: ["Private Beach", "Underwater Restaurant", "Rolls Royce Fleet", "24-karat Gold iPads"]
        },
        {
            id: 7,
            name: "Giraffe Manor",
            distance: "20 km from Nairobi",
            rating: 4.9,
            reviews: 890,
            price: "$850",
            image: "https://images.unsplash.com/photo-1581337204873-ef36aa186caa",
            description: "Boutique hotel where endangered Rothschild giraffes join guests for breakfast.",
            amenities: ["Giraffe Feedings", "Nature Walks", "Conservation Programs", "Vintage Decor"]
        },
        {
            id: 8,
            name: "Hotel Plaza Athénée",
            distance: "Central Park South",
            rating: 4.7,
            reviews: 3200,
            price: "$1,100",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945",
            description: "French elegance in NYC with iconic red awnings and Dior Spa.",
            amenities: ["Gucci Concierge", "Alain Ducasse Restaurant", "Haute Couture Suites"]
        },
        {
            id: 9,
            name: "The Oberoi Udaivilas",
            distance: "On Lake Pichola",
            rating: 4.9,
            reviews: 2400,
            price: "₹45,000",
            image: "https://images.unsplash.com/photo-1725623851398-45ca8236a95b?q=80&w=2066&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Award-winning luxury resort with private pools, Mughal-inspired architecture, and sunset views over the lake.",
            amenities: ["Private Boat Rides", "Ayurvedic Spa", "Palace-style Courtyards", "Butler Service"]
        },
        {
            id: 10,
            name: "Aman Tokyo",
            distance: "0.3 km from Otemachi Station",
            rating: 4.8,
            reviews: 1500,
            price: "¥150,000",
            image: "https://images.unsplash.com/photo-1528164344705-47542687000d",
            description: "Minimalist urban retreat with traditional Japanese design, featuring an onsen (hot spring) and tea ceremonies.",
            amenities: ["Floor-to-Ceiling City Views", "Kaiseki Dining", "Zen Garden", "24-hour Concierge"]
        },
        {
            id: 11,
            name: "Shangri-La Paris",
            distance: "0.2 km from Eiffel Tower",
            rating: 4.7,
            reviews: 3800,
            price: "€900",
            image: "https://plus.unsplash.com/premium_photo-1718893372075-6bdc1df43c89?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Former royal residence with direct Eiffel Tower views, Michelin-starred dining, and a glass-domed pool.",
            amenities: ["Eiffel Tower Suites", "Chauffeured Rolls Royce", "Private Balconies", "La Bauhinia Restaurant"]
        },
        {
            id: 12,
            name: "Conrad Maldives Rangali Island",
            distance: "Private Island (30-min seaplane from Male)",
            rating: 4.9,
            reviews: 5200,
            price: "$1,200",
            image: "https://images.unsplash.com/photo-1571896349842-33c89424de2d",
            description: "Overwater villas with glass floors, an underwater restaurant, and private coral reefs.",
            amenities: ["Ithaa Undersea Restaurant", "Spa on Its Own Island", "Sunset Cruises", "Diving Center"]
        },
        {
            id: 13,
            name: "Ashford Castle",
            distance: "30 km from Galway",
            rating: 4.8,
            reviews: 1800,
            price: "€600",
            image: "https://plus.unsplash.com/premium_photo-1688480179675-8f211d16e9a1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "800-year-old castle on 350 acres with falconry, horseback riding, and a Victorian-style cinema.",
            amenities: ["Falconry School", "Boating on Lough Corrib", "Afternoon Tea", "Oak-paneled Drawing Rooms"]
        },
        {
            id: 14,
            name: "Hotel del Coronado",
            distance: "Beachfront (San Diego, CA)",
            rating: 4.6,
            reviews: 6700,
            price: "$450",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945",
            description: "Historic Victorian beach resort where Marilyn Monroe filmed 'Some Like It Hot.' Oceanfront fire pits and spa.",
            amenities: ["Private Beach", "Sunset S'mores", "Ice Skating Rink (Winter)", "Vintage Photo Studio"]
        },
        {
            id: 15,
            name: "Laucala Island",
            distance: "Private Island (1-hour flight from Nadi)",
            rating: 4.9,
            reviews: 420,
            price: "$4,200",
            image: "https://images.unsplash.com/photo-1571896349842-33c89424de2d",
            description: "Ultra-exclusive private island with coconut plantations, volcanic cliffs, and Fijian-style villas.",
            amenities: ["Horseback Riding on Beach", "Organic Farm-to-Table Dining", "Submarine Tours", "Hilltop Chapel"]
        },
        {
            id: 16,
            name: "Amangiri",
            distance: "In Canyon Point (remote desert)",
            rating: 4.9,
            reviews: 890,
            price: "$3,500",
            image: "https://images.unsplash.com/photo-1692520428077-7bd5baa6d3ae?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Minimalist desert hideout blending into sandstone cliffs with a floating pool and guided slot canyon hikes.",
            amenities: ["Private Airstrip", "Canyon Yoga", "Stargazing Deck", "Customized Adventure Itineraries"]
        },
        {
            id: 17,
            name: "Belmond Hotel das Cataratas",
            distance: "Inside Iguazu National Park",
            rating: 4.8,
            reviews: 2100,
            price: "R$3,200",
            image: "https://plus.unsplash.com/premium_photo-1733266891438-267b79746f23?q=80&w=1976&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "The only hotel inside Iguazu National Park, offering sunrise access to the falls before crowds arrive.",
            amenities: ["Private Falls Viewing", "Guided Rainforest Walks", "Portuguese Tile Pool", "Itaipu Dam Tours"]
        },
        {
            id: 18,
            name: "Cheval Blanc Randheli",
            distance: "Private Atoll (40-min seaplane from Male)",
            rating: 4.9,
            reviews: 950,
            price: "$2,800",
            image: "https://images.unsplash.com/photo-1571896349842-33c89424de2d",
            description: "LVMH-owned luxury with overwater villas designed by Jean-Michel Gathy and a Guerlain spa.",
            amenities: ["Four Seasons Spa", "Champagne Cellar", "Art Gallery", "Kids Club with Lego Room"]
        },
        {
            id: 19,
            name: "Soneva Kiri",
            distance: "Koh Kood Island (1-hour flight from Bangkok)",
            rating: 4.8,
            reviews: 1300,
            price: "฿45,000",
            image: "https://images.unsplash.com/photo-1607385404764-380a5e06c7fe?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Eco-luxury resort with treetop dining pods, an open-air cinema, and chocolate room.",
            amenities: ["Treepod Dining", "Observatory", "Barefoot Luxury Philosophy", "Recycled Glass Art Studio"]
        },
        {
            id: 20,
            name: "Al Maha Desert Resort",
            distance: "45 km from Dubai",
            rating: 4.7,
            reviews: 3200,
            price: "AED 3,500",
            image: "https://images.unsplash.com/photo-1518684079-3c830dcef090",
            description: "Bedouin-style suites with private pools in the Dubai Desert Conservation Reserve.",
            amenities: ["Camel Trekking", "Falconry Displays", "Desert Wildlife Drives", "Starlit Dining"]
        },
        {
            id: 21,
            name: "Fairmont Le Château Frontenac",
            distance: "Old Quebec City",
            rating: 4.7,
            reviews: 5400,
            price: "CA$500",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945",
            description: "Fairytale castle hotel where Churchill and Roosevelt strategized during WWII. Panoramic St. Lawrence River views.",
            amenities: ["Afternoon Tea with Maple Syrup", "Ice Canoeing", "Underground Art Gallery", "Ghost Tours"]
        },
        {
            id: 22,
            name: "Cap Rocat",
            distance: "Bay of Palma",
            rating: 4.8,
            reviews: 1100,
            price: "€650",
            image: "https://images.unsplash.com/photo-1713245536846-d58078e2b7f3?q=80&w=1976&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "19th-century military fortress turned luxury hotel with sea-view bunkers and a saltwater infinity pool.",
            amenities: ["Private Beach Coves", "Fortress Tours", "Mediterranean Cooking Classes", "Stargazing Terraces"]
        },
        {
            id: 23,
            name: "Singita Kruger National Park",
            distance: "Private Reserve (adjacent to Kruger)",
            rating: 4.9,
            reviews: 680,
            price: "$1,800",
            image: "https://images.unsplash.com/photo-1581337204873-ef36aa186caa",
            description: "Safari lodge with guided game drives to spot the Big Five. Eco-friendly and community-focused.",
            amenities: ["Private Game Drives", "Boma Dinners", "Wine Cellar", "Bush Walks with Rangers"]
        },
        {
            id: 24,
            name: "Fogo Island Inn",
            distance: "Off the coast of Newfoundland",
            rating: 4.8,
            reviews: 950,
            price: "CA$2,500",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945",
            description: "Nordic-designed outpost on stilts with iceberg views, local artisan workshops, and foraging tours.",
            amenities: ["Community Host Program", "Sauna with Ocean View", "Microbrewery", "Traditional 'Jiggs Dinner'"]
        },
        {
            id: 25,
            name: "Hotel Unique",
            distance: "2 km from Ibirapuera Park",
            rating: 4.6,
            reviews: 2900,
            price: "R$1,200",
            image: "https://images.unsplash.com/photo-1676193361016-2a9d1b9d475e?q=80&w=2157&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Ship-shaped rooftop pool with panoramic city views and avant-garde design.",
            amenities: ["Skye Bar", "Hammam Spa", "Underground Wine Cellar", "24-hour Party Vibe"]
        },
        {
            id: 26,
            name: "Juvet Landscape Hotel",
            distance: "In Valldal Nature Reserve",
            rating: 4.7,
            reviews: 720,
            price: "NOK 4,200",
            image: "https://images.unsplash.com/photo-1518186285589-2f7649de83e0",
            description: "Glass-walled cabins where 'Ex Machina' was filmed. Minimalist design immersed in fjords and forests.",
            amenities: ["Northern Lights Alerts", "Private Saunas", "Foraging Tours", "No TVs or Radios"]
        },
        {
            id: 27,
            name: "Kakslauttanen Arctic Resort",
            distance: "250 km above Arctic Circle",
            rating: 4.6,
            reviews: 3800,
            price: "€550",
            image: "https://images.unsplash.com/photo-1518684079-3c830dcef090",
            description: "Glass igloos and log cabins for aurora viewing, with reindeer sleigh rides and ice saunas.",
            amenities: ["Snow Igloo Church", "Husky Safaris", "Ice Gallery", "Lappish Dinner in Kota Hut"]
        },
        {
            id: 28,
            name: "The Chedi Andermatt",
            distance: "Alps Ski Region",
            rating: 4.8,
            reviews: 1600,
            price: "CHF 800",
            image: "https://plus.unsplash.com/premium_photo-1732030992711-27e178f00ec7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Alpine chic with a 12,000-bottle wine tower, cigar lounge, and ski-in/ski-out access.",
            amenities: ["Heated Outdoor Pool", "Private Ski Butlers", "Cheese Fondue Cave", "Japanese Onsen Baths"]
        },
        {
            id: 29,
            name: "Song Saa Private Island",
            distance: "Koh Rong Archipelago",
            rating: 4.7,
            reviews: 840,
            price: "$950",
            image: "https://images.unsplash.com/photo-1571896349842-33c89424de2d",
            description: "Overwater bungalows with coral reefs, jungle spa treatments, and Cambodian seafood BBQs.",
            amenities: ["Marine Conservation Tours", "Jungle Cinema", "Recycled Driftwood Decor", "Full Moon Parties"]
        },
        {
            id: 30,
            name: "Hotel Marqués de Riscal",
            distance: "Rioja Wine Region",
            rating: 4.7,
            reviews: 2100,
            price: "€400",
            image: "https://images.unsplash.com/photo-1694056590800-003c4fe6785d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            description: "Frank Gehry-designed 'wine hotel' with titanium ribbons, vineyard tours, and vinotherapy spa.",
            amenities: ["Wine Tasting Sessions", "Hot Air Balloon Rides", "Michelin-starred Dining", "Harvest Experiences"]
        }
    ];

    const hotelCardsContainer = document.querySelector('.hotel-cards');
    const modal = document.getElementById('hotelModal');
    const closeModal = document.querySelector('.close-modal');
    const bookNowBtn = document.getElementById('book-now-btn');
    const searchInput = document.getElementById('search-input');

    // Create hotel cards
    function createHotelCard(hotel) {
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
        return card;
        // hotelCardsContainer.appendChild(card);
    }

    // Function to filter and display hotels
    function filterAndRenderHotels() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        hotelCardsContainer.innerHTML = ''; // Clear current cards

        // If search is empty, show all hotels
        if (!searchTerm) {
            renderAllHotels();
            return;
        }

        // Filter hotels
        const filteredHotels = hotels.filter(hotel => {
            // Check name, description, and amenities
            return (
                hotel.name.toLowerCase().includes(searchTerm) ||
                hotel.description.toLowerCase().includes(searchTerm) ||
                hotel.amenities.some(amenity => 
                    amenity.toLowerCase().includes(searchTerm)
                )
            );
        });

        // Display results
        if (filteredHotels.length === 0) {
            hotelCardsContainer.innerHTML = '<p class="no-results">No hotels found matching your search.</p>';
        } else {
            filteredHotels.forEach(hotel => {
                hotelCardsContainer.appendChild(createHotelCard(hotel));
            });
            attachModalListeners();
        }
    }

    function renderAllHotels() {
        hotelCardsContainer.innerHTML = '';
        hotels.forEach(hotel => {
            hotelCardsContainer.appendChild(createHotelCard(hotel));
        });
        attachModalListeners();
    }

    // Modal functionality
    function attachModalListeners() {
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
    }

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

    // Event listener for real-time search with debounce
    searchInput.addEventListener('input', function() {
        filterAndRenderHotels();
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    renderAllHotels(); // Initial render
});