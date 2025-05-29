<footer class="footer-main"
    style="background:#181818; color:#fff; padding: 0; width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw;">
    <div class="footer-content" style="max-width: 1400px; margin: 0 auto; padding: 60px 0 0 0;">
        <div class="footer-navs" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
            <!-- Footer Nav 1 -->
            <div>
                <h3 style="font-size: 22px; font-weight: 600; margin-bottom: 18px;">About</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="#" style="color: #fff; text-decoration: none;">About Us</a></li>
                    <li><a href="#" style="color: #fff; text-decoration: none;">Articles</a></li>
                    <li><a href="#" style="color: #fff; text-decoration: none;">Join Us</a></li>
                    <li><a href="#" style="color: #fff; text-decoration: none;">Jobs</a></li>
                </ul>
            </div>
            <!-- Footer Nav 2 -->
            <div>
                <h3 style="font-size: 22px; font-weight: 600; margin-bottom: 18px;">Psychics</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="#" style="color: #fff; text-decoration: none;">Top Psychics</a></li>
                </ul>
            </div>
            <!-- Footer Nav 3 -->
            <div>
                <h3 style="font-size: 22px; font-weight: 600; margin-bottom: 18px;">Support</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="#" style="color: #fff; text-decoration: none;">Contact Us</a></li>
                </ul>
            </div>
            <div></div>
        </div>
        <div class="footer-row-main"
            style="display: flex; justify-content: space-between; align-items: center; margin-top: 40px;">
            <div class="footer-brand-row" style="display: flex; align-items: center; margin: 0;">
                <a href="/" style="display: flex; align-items: center; text-decoration: none;">
                    <span id="footer-logo-placeholder">
                        <div class="logo-circle"
                            style="width: 70px; height: 70px; background: #9C5EE4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 18px;">
                            <span style="color: white; font-weight: bold; font-size: 32px;">S</span>
                        </div>
                    </span>
                    <span id="footer-site-name-placeholder" style="font-size: 24px; font-weight: 500; color: #fff;">Site
                        Name</span>
                </a>
            </div>
            <div class="footer-links-bottom" style="display: flex; gap: 24px;">
                <a href="{{ route('home') }}" style="color: #fff; text-decoration: none;">Home</a>
                <a href="{{ route('privacy-policy') }}" style="color: #fff; text-decoration: none;">Privacy Policy</a>
                <a href="{{ route('terms-and-conditions') }}" style="color: #fff; text-decoration: none;">Terms and
                    Conditions</a>
            </div>
        </div>
        <hr style="border: none; border-top: 1px solid #333; margin: 16px 0 16px 0;" />
        <div class="footer-bottom"
            style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap;">
            <span style="font-size: 13px; color: #bbb; margin: 20px; margin-top: 0px;">For entertainment purposes only.
                Must be 18 years
                or
                older.</span>
            <span style="font-size: 15px; color: #bbb; margin: 20px; margin-top: 0px;">© <span
                    id="footer-year">2025</span> <a id="footer-site-link" href="/"
                    style="color: #fff; text-decoration: underline;"><span id="footer-site-name-copyright">Site
                        Name</span></a></span>
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
                        document.getElementById('footer-site-name-placeholder').textContent = res.data.name;
                        document.getElementById('footer-site-name-copyright').textContent = res.data.name;
                        if (res.data.logo) {
                            document.getElementById('footer-logo-placeholder').innerHTML = `<img src="${res.data.logo}" alt="${res.data.name}" style="height: 70px; margin-right: 18px;">`;
                        }
                    }
                });
            // Set year
            document.getElementById('footer-year').textContent = new Date().getFullYear();
        });
    </script>
</footer>