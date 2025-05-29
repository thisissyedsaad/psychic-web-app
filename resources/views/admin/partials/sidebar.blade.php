<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="mr-auto">
                <a id="navbar-brand-name" class="navbar-brand" href="{{ route('dashboard') }}" 
                style="padding: 10px; padding-left: 10px; padding-top: 3px; color: #5E5873; font-weight: 700; font-size: 1.3rem; text-align: left; display: block;">
                    Top Rated Psychics
                </a>
            </li>
            {{-- <li class=nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="sidebar-nav-items" data-feather="home" ></i>
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}">
                    <i class="sidebar-nav-items" data-feather="external-link"></i>
                    <span class="menu-title text-truncate">Visit Site</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>Psychics</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('admin/psychics*') ? 'active' : '' }}">
                <a href="{{ route('psychics.index') }}">
                    <i class="sidebar-nav-items" data-feather="box"></i>
                    <span class="menu-title text-truncate">Psychics</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>Settings</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('admin/psychic-services*') ? 'active' : '' }}">
                <a href="{{ route('psychic-services.index') }}">
                    <i class="sidebar-nav-items" data-feather="message-square"></i>
                    <span class="menu-title text-truncate">Psychic Services</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/app-links*') ? 'active' : '' }}">
                <a href="{{ route('app-links.index') }}">
                    <i class="sidebar-nav-items" data-feather="link"></i>
                    <span class="menu-title text-truncate">App Links</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/payment-links*') ? 'active' : '' }}">
                <a href="{{ route('payment-links.index') }}">
                    <i class="sidebar-nav-items" data-feather="credit-card"></i>
                    <span class="menu-title text-truncate">Payment Links</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/social-media-links*') ? 'active' : '' }}">
                <a href="{{ route('social-media-links.index') }}">
                    <i class="sidebar-nav-items" data-feather="share-2"></i>
                    <span class="menu-title text-truncate">Social Media Links</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>Content</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
                <a href="{{ route('pages.index') }}">
                    <i class="sidebar-nav-items" data-feather="file-text"></i>
                    <span class="menu-title text-truncate">Pages</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>API</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('admin/api-doc*') ? 'active' : '' }}">
                <a href="#">
                    <i class="sidebar-nav-items" data-feather="code"></i>
                    <span class="menu-title text-truncate">API Doc</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Site Settings</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('admin/site-setting*') ? 'active' : '' }}">
                <a href="{{ route('site.setting') }}">
                    <i class="sidebar-nav-items" data-feather="settings"></i>
                    <span class="menu-title text-truncate">Site</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/seo*') ? 'active' : '' }}">
                <a href="{{ route('seo.settings') }}">
                    <i class="sidebar-nav-items" data-feather="search"></i>
                    <span class="menu-title text-truncate">SEO</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/sitemap*') ? 'active' : '' }}">
                <a href="{{ route('sitemap.setting') }}">
                    <i class="sidebar-nav-items" data-feather="map"></i>
                    <span class="menu-title text-truncate">Sitemap</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/database/backup*') ? 'active' : '' }}">
                <a href="{{ route('database.backup') }}">
                    <i class="sidebar-nav-items" data-feather="disc"></i>
                    <span class="menu-title text-truncate">Export Database</span>
                </a>
            </li>
            <div class="mb-5"></div>
        </ul>
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
                    document.getElementById('navbar-brand-name').textContent = res.data.name;
                }
            });
    });
    feather.replace({ class: 'sidebar-nav-items' });

</script>