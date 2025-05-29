<header class="wp-block-template-part">
    <div class="wp-block-group has-background-color has-text-color has-link-color is-layout-constrained">
        <!-- Main Header Container -->
        <div class="wp-block-group alignwide" style="padding: 20px 0;">
            <!-- Auth Links - Positioned at top right -->
            <div class="wp-block-buttons" style="position: absolute; top: 20px; right: 20px;">
                <div class="wp-block-button is-style-fill">
                    <a href="#"
                        style="padding: 8px 0px; border-radius: 4px;  text-decoration: none; font-weight: 500; margin-right: 10px;">Login</a>
                </div>
                <div class="wp-block-button is-style-fill">
                    <a href="#"
                        style="padding: 8px 20px; border-radius: 4px; text-decoration: none; font-weight: 500;">Register</a>
                </div>
            </div>

            <!-- Logo and Site Title Section - Left aligned -->
            <div class="wp-block-group is-layout-flex" style="align-items: center; margin-top: 40px;">
                <div class="site-logo" style="display: flex; align-items: center;">
                    <a href="{{ route('home') }}" style="display: flex; align-items: center; text-decoration: none;">
                        <span id="site-logo-placeholder">
                            <div class="logo-circle"
                                style="width: 50px; height: 50px; background: #9C5EE4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                <span style="color: white; font-weight: bold; font-size: 24px;">S</span>
                            </div>
                        </span>
                        <h1 id="site-name-placeholder"
                            style="margin: 0; color: #333; font-size: 24px; font-weight: 600;">Site Name</h1>
                    </a>
                </div>
            </div>

            <!-- Navigation Menu - Full width with proper spacing -->
            <nav class="main-navigation"
                style="margin-top: 30px; border-bottom: 1px solid #E5E7EB; padding-bottom: 15px;">
                <ul
                    style="display: flex; justify-content: flex-start; gap: 35px; margin: 0; padding: 0; list-style: none;">
                    <li><a href="{{ route('home') }}"
                            style="color: #333; text-decoration: none; font-weight: 500;">Home</a></li>
                    <li><a href="{{ route('psychics') }}" style="color: #333; text-decoration: none; font-weight: 500;">Psychics</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; font-weight: 500;">Psychic Reading
                            Topics</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; font-weight: 500;">Testimonials</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; font-weight: 500;">How It Works</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; font-weight: 500;">Pricing</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; font-weight: 500;">Articles</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; font-weight: 500;">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/api/site-settings', {
                headers: {
                    'Accept': 'application/json',
                    'X-API-Key': '{{ env('API_KEY') }}'
                }
            })
                .then(response => response.json())
                .then(res => {
                    if (res.success && res.data) {
                        document.getElementById('site-name-placeholder').textContent = res.data.name;
                        if (res.data.logo) {
                            document.getElementById('site-logo-placeholder').innerHTML = `<img src="${res.data.logo}" alt="${res.data.name}" style="height: 50px; margin-right: 15px;">`;
                        }
                    }
                });
        });
    </script>
</header>