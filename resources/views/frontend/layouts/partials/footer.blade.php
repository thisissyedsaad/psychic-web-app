<footer class="wp-block-template-part">
    <div style="height: 100px" aria-hidden="true" class="wp-block-spacer"></div>

    <div class="wp-block-group is-style-section-5 has-global-padding is-layout-constrained wp-block-group-is-layout-constrained is-style-section-5--15"
        style="
            padding-top: var(--wp--preset--spacing--60);
            padding-bottom: var(--wp--preset--spacing--50);
          ">
        <div
            class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <h3 class="wp-block-heading">About</h3>

                <nav class="is-vertical wp-block-navigation is-layout-flex wp-container-core-navigation-is-layout-fe9cc265 wp-block-navigation-is-layout-flex"
                    aria-label="Footer menu">
                    <ul class="wp-block-navigation__container is-vertical wp-block-navigation">
                        <li class="wp-block-navigation-item wp-block-navigation-link">
                            <a class="wp-block-navigation-item__content" href="{{ route('about-us') }}"><span
                                    class="wp-block-navigation-item__label">About Us</span></a>
                        </li>
                        <li class="wp-block-navigation-item wp-block-navigation-link">
                            <a class="wp-block-navigation-item__content" href="{{ route('articles') }}"><span
                                    class="wp-block-navigation-item__label">Articles</span></a>
                        </li>
                        <li class="wp-block-navigation-item wp-block-navigation-link">
                            <a class="wp-block-navigation-item__content" href="{{ route('join-us') }}"><span
                                    class="wp-block-navigation-item__label">Join Us</span></a>
                        </li>
                        <li class="wp-block-navigation-item wp-block-navigation-link">
                            <a class="wp-block-navigation-item__content" href="https://jobs.topratedpsychics.org" target="_blank"><span
                                    class="wp-block-navigation-item__label">Jobs</span></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <h3 class="wp-block-heading">Psychics</h3>

                <nav class="is-vertical wp-block-navigation is-layout-flex wp-container-core-navigation-is-layout-fe9cc265 wp-block-navigation-is-layout-flex"
                    aria-label="Footer menu 2">
                    <ul class="wp-block-navigation__container is-vertical wp-block-navigation">
                        <li class="wp-block-navigation-item wp-block-navigation-link">
                            <a class="wp-block-navigation-item__content" href="{{ route('psychics') }}"><span
                                    class="wp-block-navigation-item__label">Top Psychics</span></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <h3 class="wp-block-heading">Support</h3>

                <nav class="is-vertical wp-block-navigation is-layout-flex wp-container-core-navigation-is-layout-fe9cc265 wp-block-navigation-is-layout-flex"
                    aria-label="Footer menu 3">
                    <ul class="wp-block-navigation__container is-vertical wp-block-navigation">
                        <li class="wp-block-navigation-item wp-block-navigation-link">
                            <a class="wp-block-navigation-item__content" href="{{ route('contact-us') }}"><span
                                    class="wp-block-navigation-item__label">Contact Us</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="wp-block-group alignwide is-layout-flow wp-block-group-is-layout-flow">
            <div style="height: var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>

            <div
                class="wp-block-group is-horizontal is-content-justification-space-between is-layout-flex wp-container-core-group-is-layout-cbeee361 wp-block-group-is-layout-flex">
                <div
                    class="wp-block-group is-nowrap is-layout-flex wp-container-core-group-is-layout-6c531013 wp-block-group-is-layout-flex">
                    <div class="is-default-size wp-block-site-logo">
                        <a href="{{ route('home') }}" class="custom-logo-link" rel="home" aria-current="page">
                            <span id="footer-logo-placeholder">
                                <div class="logo-circle"
                                    style="width: 79px; height: 79px; background: #9C5EE4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <span style="color: white; font-weight: bold; font-size: 24px;">S</span>
                                </div>
                            </span>
                        </a>
                    </div>

                    <p id="footer-site-name">Loading...</p>
                </div>

                <nav class="is-responsive items-justified-space-between wp-block-navigation is-content-justification-space-between is-layout-flex wp-container-core-navigation-is-layout-b2891da8 wp-block-navigation-is-layout-flex"
                    aria-label="Navigation" data-wp-interactive="core/navigation"
                    data-wp-context='{"overlayOpenedBy":{"click":false,"hover":false,"focus":false},"type":"overlay","roleAttribute":"","ariaLabel":"Menu"}'>
                    <button aria-haspopup="dialog" aria-label="Open menu"
                        class="wp-block-navigation__responsive-container-open"
                        data-wp-on-async--click="actions.openMenuOnClick"
                        data-wp-on--keydown="actions.handleMenuKeydown">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            aria-hidden="true" focusable="false">
                            <rect x="4" y="7.5" width="16" height="1.5" />
                            <rect x="4" y="15" width="16" height="1.5" />
                        </svg>
                    </button>
                    <div class="wp-block-navigation__responsive-container" id="modal-16"
                        data-wp-class--has-modal-open="state.isMenuOpen" data-wp-class--is-menu-open="state.isMenuOpen"
                        data-wp-watch="callbacks.initMenu" data-wp-on--keydown="actions.handleMenuKeydown"
                        data-wp-on-async--focusout="actions.handleMenuFocusout" tabindex="-1">
                        <div class="wp-block-navigation__responsive-close" tabindex="-1">
                            <div class="wp-block-navigation__responsive-dialog"
                                data-wp-bind--aria-modal="state.ariaModal" data-wp-bind--aria-label="state.ariaLabel"
                                data-wp-bind--role="state.roleAttribute">
                                <button aria-label="Close menu" class="wp-block-navigation__responsive-container-close"
                                    data-wp-on-async--click="actions.closeMenuOnClick">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        aria-hidden="true" focusable="false">
                                        <path
                                            d="m13.06 12 6.47-6.47-1.06-1.06L12 10.94 5.53 4.47 4.47 5.53 10.94 12l-6.47 6.47 1.06 1.06L12 13.06l6.47 6.47 1.06-1.06L13.06 12Z">
                                        </path>
                                    </svg>
                                </button>
                                <div class="wp-block-navigation__responsive-container-content"
                                    data-wp-watch="callbacks.focusFirstElement" id="modal-16-content">
                                    <ul
                                        class="wp-block-navigation__container is-responsive items-justified-space-between wp-block-navigation">
                                        <li class="wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('home') }}"><span
                                                    class="wp-block-navigation-item__label">Home</span></a>
                                        </li>
                                        <li class="wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('privacy-policy') }}"><span
                                                    class="wp-block-navigation-item__label">Privacy Policy</span></a>
                                        </li>
                                        <li class="wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('terms-and-conditions') }}"><span
                                                    class="wp-block-navigation-item__label">Terms and
                                                    Conditions</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide is-style-wide--17" />

            <div
                class="wp-block-group alignfull is-content-justification-space-between is-layout-flex wp-container-core-group-is-layout-91e87306 wp-block-group-is-layout-flex">
                <p class="has-small-font-size">
                    For entertainment purposes only. Must be 18 years or older.
                </p>

                <p class="has-small-font-size">
                    © 2025 <a href="{{ route('home') }}"><strong id="footer-copyright-name">Loading...</strong></a>
                </p>
            </div>
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
                        document.getElementById('footer-site-name').textContent = res.data.name;
                        document.getElementById('footer-copyright-name').textContent = res.data.name;
                        if (res.data.logo) {
                            document.getElementById('footer-logo-placeholder').innerHTML = `
                            <img src="${res.data.logo}" alt="${res.data.name}" width="256" height="256" class="custom-logo" decoding="async" fetchpriority="high">
                            `;
                        }
                    }
                });
        });
    </script>
</footer>