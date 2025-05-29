function fetchPsychics() {
    AjaxService.get('/api/psychics')
        .then(function(response) {
            console.log(response);
            const psychicsContainer = document.querySelector('.psychic-listings-container');
            
            // Clear existing content
            psychicsContainer.innerHTML = '';
            
            // Loop through psychics
            response.data.data.forEach(psychic => {
                // Generate star rating based on rating value
                const rating = psychic.rating || 5; // Default to 5 if not provided
                const reviewCount = psychic.review_count || Math.floor(Math.random() * 1000 + 100); // Random number for demo
                
                // Generate 5 stars with filled or empty based on rating
                let starsHtml = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        starsHtml += '★'; // Filled star
                    } else {
                        starsHtml += '☆'; // Empty star
                    }
                }
                
                const psychicCard = `
                    <li class="psychic-card" style="
                        background-color: #faf9f5; 
                        border: 1px solid black; 
                        width: calc(100% - 40px);
                        padding: 20px;
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        gap: 20px;
                        text-align: left;
                        margin: 0 20px 20px 20px;
                        box-sizing: border-box;
                    ">
                        <img class="psychic-photo" 
                             src="${psychic.profile_photo}" 
                             alt="${psychic.profile_name}" 
                             style="
                                 width: 80px; 
                                 height: 80px; 
                                 border-radius: 50%; 
                                 object-fit: cover;
                                 flex-shrink: 0;
                             "
                        >
                        <div style="flex: 1; min-width: 0;">
                            <h3 class="psychic-name" style="margin: 0 0 5px 0; font-size: 18px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                ${psychic.profile_name}
                            </h3>
                            <div class="psychic-stars" style="font-size: 16px; color: #ffc107; margin-bottom: 5px;">
                                ${starsHtml}
                            </div>
                            <div class="reviews-count" style="font-size: 14px; color: #666; margin-bottom: 5px;">
                                (${reviewCount} Reviews)
                            </div>
                            <p class="psychic-tagline" style="margin: 0; font-size: 14px; color: #444; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                ${psychic.tagline || ''}
                            </p>
                        </div>
                        <a href="/psychics/${psychic.id}" 
                           class="get-reading-btn" 
                           style="
                               padding: 8px 20px;
                               background-color: #222;
                               color: white;
                               border-radius: 20px;
                               text-decoration: none;
                               font-size: 14px;
                               flex-shrink: 0;
                               white-space: nowrap;
                           "
                        >
                            Get Reading
                        </a>
                    </li>
                `;
                
                psychicsContainer.innerHTML += psychicCard;
            });
        })
        .catch(function(error) {
            console.log(error);
            const psychicsContainer = document.querySelector('.psychic-listings-container');
            if (psychicsContainer) {
                psychicsContainer.innerHTML = '<p>Error loading psychics. Please try again later.</p>';
            }
        });
}

document.addEventListener('DOMContentLoaded', fetchPsychics); 