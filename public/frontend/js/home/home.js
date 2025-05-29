// Function to fetch top psychics
function fetchTopPsychics() {
    fetch('/api/psychics/top',
        {
            headers: {
                'X-API-Key': api_key,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            const psychicsContainer = document.querySelector('.wp-block-columns.is-layout-flex.wp-container-core-columns-is-layout-28f84493');

            // Clear existing content
            psychicsContainer.innerHTML = '';

            // Loop through psychics
            data.data.forEach(psychic => {
                const psychicCard = `
                    <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="
                        border-width: 1px;
                        padding-top: var(--wp--preset--spacing--40);
                        padding-right: var(--wp--preset--spacing--40);
                        padding-bottom: var(--wp--preset--spacing--40);
                        padding-left: var(--wp--preset--spacing--40);
                        flex-basis: 33%;
                    ">
                        <figure class="wp-block-image size-full">
                            <a href="/psychics/${psychic.id}">
                                <img width="500" height="500" src="${psychic.profile_photo}" alt="${psychic.profile_name}" class="wp-image-67" />
                            </a>
                        </figure>

                        <p class="has-text-align-center">
                            <strong><span style="text-decoration: underline">
                                <a href="/psychics/${psychic.id}">${psychic.profile_name}</a>
                            </span></strong>
                        </p>

                        <div class="wp-block-group is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-23441af8 wp-block-group-is-layout-flex">
                            <figure class="wp-block-image size-full">
                                <img width="100" height="20" src="/frontend/images/home/5starrating.png" alt="" class="wp-image-69" />
                            </figure>
                            <p class="has-small-font-size">(${psychic.review_count || 0} Reviews)</p>
                        </div>

                        <p>${psychic.tagline || ''}</p>

                        <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                            <div class="wp-block-button">
                                <a class="wp-block-button__link wp-element-button" href="/psychics/${psychic.id}">Get Reading</a>
                            </div>
                        </div>
                    </div>
                `;

                psychicsContainer.innerHTML += psychicCard;
            });
        })
        .catch(error => {
            console.error('Error fetching top psychics:', error);
            const psychicsContainer = document.querySelector('.wp-block-columns.is-layout-flex.wp-container-core-columns-is-layout-28f84493');
            if (psychicsContainer) {
                psychicsContainer.innerHTML = '<p>Error loading psychics. Please try again later.</p>';
            }
        });
}

// Call the function when the DOM is loaded
document.addEventListener('DOMContentLoaded', fetchTopPsychics);