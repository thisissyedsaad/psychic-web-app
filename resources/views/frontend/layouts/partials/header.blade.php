<header class="wp-block-template-part">
    <div class="wp-block-group alignfull is-layout-flow wp-block-group-is-layout-flow" style="
            padding-top: var(--wp--preset--spacing--30);
            padding-bottom: var(--wp--preset--spacing--70);
          ">
        <div class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
            <nav class="is-responsive items-justified-right alignwide wp-block-navigation is-content-justification-right is-layout-flex wp-container-core-navigation-is-layout-d445cf74 wp-block-navigation-is-layout-flex"
                aria-label="Header menu 2" data-wp-interactive="core/navigation"
                data-wp-context='{"overlayOpenedBy":{"click":false,"hover":false,"focus":false},"type":"overlay","roleAttribute":"","ariaLabel":"Menu"}'>
                <button aria-haspopup="dialog" aria-label="Open menu"
                    class="wp-block-navigation__responsive-container-open"
                    data-wp-on-async--click="actions.openMenuOnClick" data-wp-on--keydown="actions.handleMenuKeydown">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        aria-hidden="true" focusable="false">
                        <rect x="4" y="7.5" width="16" height="1.5" />
                        <rect x="4" y="15" width="16" height="1.5" />
                    </svg>
                </button>
                <div class="wp-block-navigation__responsive-container" id="modal-1"
                    data-wp-class--has-modal-open="state.isMenuOpen" data-wp-class--is-menu-open="state.isMenuOpen"
                    data-wp-watch="callbacks.initMenu" data-wp-on--keydown="actions.handleMenuKeydown"
                    data-wp-on-async--focusout="actions.handleMenuFocusout" tabindex="-1">
                    <div class="wp-block-navigation__responsive-close" tabindex="-1">
                        <div class="wp-block-navigation__responsive-dialog" data-wp-bind--aria-modal="state.ariaModal"
                            data-wp-bind--aria-label="state.ariaLabel" data-wp-bind--role="state.roleAttribute">
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
                                data-wp-watch="callbacks.focusFirstElement" id="modal-1-content">
                                <ul
                                    class="wp-block-navigation__container is-responsive items-justified-right alignwide wp-block-navigation">
                                    <li class="wp-block-navigation-item wp-block-navigation-link">
                                        <a class="wp-block-navigation-item__content" href="{{ route('user.login') }}"><span
                                                class="wp-block-navigation-item__label">Login</span></a>
                                    </li>
                                    <li class="wp-block-navigation-item wp-block-navigation-link">
                                        <a class="wp-block-navigation-item__content" href="{{ route('join-us') }}"><span
                                                class="wp-block-navigation-item__label">Register</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div
                class="wp-block-group alignwide is-nowrap is-layout-flex wp-container-core-group-is-layout-6c531013 wp-block-group-is-layout-flex">
                <div class="wp-block-site-logo">
                    <a href="{{ route('home') }}" class="custom-logo-link" rel="home" aria-current="page">
                        <span id="header-logo-placeholder">
                            <div class="logo-circle"
                                style="width: 79px; height: 79px; background: #9C5EE4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                <span style="color: white; font-weight: bold; font-size: 24px;">S</span>
                            </div>
                        </span>
                    </a>
                </div>

                <p class="wp-block-site-title has-x-large-font-size">
                    <a href="{{ route('home') }}" target="_self" rel="home" aria-current="page"
                        id="header-site-name">Loading...</a>
                </p>
            </div>

            <div
                class="wp-block-group alignwide is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-9fd45780 wp-block-group-is-layout-flex">
                <nav class="has-large-font-size is-responsive items-justified-right wp-block-navigation is-content-justification-right is-layout-flex wp-container-core-navigation-is-layout-fc306653 wp-block-navigation-is-layout-flex"
                    aria-label="Header menu" data-wp-interactive="core/navigation"
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
                    <div class="wp-block-navigation__responsive-container has-text-color has-contrast-color has-background has-base-background-color"
                        id="modal-2" data-wp-class--has-modal-open="state.isMenuOpen"
                        data-wp-class--is-menu-open="state.isMenuOpen" data-wp-watch="callbacks.initMenu"
                        data-wp-on--keydown="actions.handleMenuKeydown"
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
                                    data-wp-watch="callbacks.focusFirstElement" id="modal-2-content">
                                    <ul
                                        class="wp-block-navigation__container has-large-font-size is-responsive items-justified-right wp-block-navigation has-large-font-size">
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('home') }}"><span
                                                    class="wp-block-navigation-item__label">Home</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('psychics') }}"><span
                                                    class="wp-block-navigation-item__label">Psychics</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('psychic-services') }}"><span
                                                    class="wp-block-navigation-item__label">Psychic Services</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('testimonial') }}"><span
                                                    class="wp-block-navigation-item__label">Testimonials</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('how-it-works') }}"><span
                                                    class="wp-block-navigation-item__label">How It Works</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('pricing') }}"><span
                                                    class="wp-block-navigation-item__label">Pricing</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('articles') }}"><span
                                                    class="wp-block-navigation-item__label">Articles</span></a>
                                        </li>
                                        <li
                                            class="has-large-font-size wp-block-navigation-item wp-block-navigation-link">
                                            <a class="wp-block-navigation-item__content"
                                                href="{{ route('contact-us') }}"><span
                                                    class="wp-block-navigation-item__label">Contact Us</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
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
                        document.getElementById('header-site-name').textContent = res.data.name;
                        if (res.data.logo) {
                            document.getElementById('header-logo-placeholder').innerHTML = `
                            <img src="${res.data.logo}" alt="${res.data.name}" width="79" height="79" class="custom-logo" decoding="async">
                            `;
                        }
                    }
                });
        });
    </script>
</header>