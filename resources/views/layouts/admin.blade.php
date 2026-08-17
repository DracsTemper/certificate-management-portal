<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Certificate Portal')
    </title>


    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <style>

        :root {
            --portal-primary: #1e3a5f;
            --portal-primary-dark: #162d4a;
            --portal-accent: #3b82f6;
            --portal-bg: #f4f7fb;
            --portal-sidebar: #172b4d;
            --portal-text: #243447;
            --portal-muted: #718096;
            --portal-border: #e5eaf0;
        }


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: var(--portal-bg);

            color: var(--portal-text);

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }


        /* =========================================
           Sidebar
        ========================================= */

        .portal-sidebar {

            position: fixed;

            top: 0;
            left: 0;
            bottom: 0;

            width: 250px;

            background: var(--portal-sidebar);

            color: #ffffff;

            z-index: 1040;

            display: flex;

            flex-direction: column;

            transition: transform 0.25s ease;
        }


        .portal-brand {

            height: 72px;

            display: flex;

            align-items: center;

            padding: 0 24px;

            border-bottom: 1px solid rgba(255,255,255,0.08);
        }


        .portal-brand-icon {

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--portal-accent);

            margin-right: 12px;

            font-size: 19px;
        }


        .portal-brand-text {

            font-size: 18px;

            font-weight: 700;

            letter-spacing: -0.3px;
        }


        .portal-brand-subtitle {

            display: block;

            font-size: 10px;

            font-weight: 400;

            color: rgba(255,255,255,0.55);

            margin-top: 1px;
        }


        .portal-sidebar-content {

            padding: 20px 14px;

            flex: 1;

            overflow-y: auto;
        }


        .portal-section-title {

            padding: 0 12px;

            margin: 8px 0 10px;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: rgba(255,255,255,0.4);
        }


        .portal-nav {

            list-style: none;

            padding: 0;

            margin: 0;
        }


        .portal-nav li {

            margin-bottom: 4px;
        }


        .portal-nav a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border-radius: 8px;

            color: rgba(255,255,255,0.7);

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition: all 0.2s ease;
        }


        .portal-nav a i {

            width: 20px;

            text-align: center;

            font-size: 16px;
        }


        .portal-nav a:hover {

            background: rgba(255,255,255,0.08);

            color: #ffffff;
        }


        .portal-nav a.active {

            background: var(--portal-accent);

            color: #ffffff;

            box-shadow:
                0 4px 12px rgba(59,130,246,0.25);
        }


        .portal-sidebar-footer {

            padding: 14px;

            border-top: 1px solid rgba(255,255,255,0.08);
        }


        /* =========================================
           Main Area
        ========================================= */

        .portal-main {

            margin-left: 250px;

            min-height: 100vh;
        }


        /* =========================================
           Top Navbar
        ========================================= */

        .portal-navbar {

            height: 72px;

            background: #ffffff;

            border-bottom: 1px solid var(--portal-border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            position: sticky;

            top: 0;

            z-index: 1030;
        }


        .portal-navbar-title {

            font-size: 20px;

            font-weight: 650;

            color: var(--portal-text);

            margin: 0;
        }


        .portal-navbar-right {

            display: flex;

            align-items: center;

            gap: 18px;
        }


        .portal-user {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .portal-user-avatar {

            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #e8f0fe;

            color: var(--portal-primary);

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 700;

            font-size: 14px;
        }


        .portal-user-name {

            font-size: 13px;

            font-weight: 600;

            line-height: 1.2;
        }


        .portal-user-role {

            font-size: 11px;

            color: var(--portal-muted);

            margin-top: 2px;
        }


        /* =========================================
           Content
        ========================================= */

        .portal-content {

            padding: 28px;
        }


        /* =========================================
           Cards
        ========================================= */

        .portal-card {

            background: #ffffff;

            border: 1px solid var(--portal-border);

            border-radius: 12px;

            box-shadow:
                0 2px 8px rgba(15,23,42,0.03);
        }


        .portal-card-header {

            padding: 18px 20px;

            border-bottom: 1px solid var(--portal-border);

            font-weight: 650;
        }


        .portal-card-body {

            padding: 20px;
        }


        /* =========================================
           Mobile
        ========================================= */

        .portal-mobile-toggle {

            display: none;

            border: 0;

            background: transparent;

            font-size: 22px;

            color: var(--portal-text);
        }


        .portal-overlay {

            display: none;

            position: fixed;

            inset: 0;

            background: rgba(15,23,42,0.45);

            z-index: 1035;
        }


        @media (max-width: 991.98px) {

            .portal-sidebar {

                transform: translateX(-100%);
            }


            .portal-sidebar.show {

                transform: translateX(0);
            }


            .portal-main {

                margin-left: 0;
            }


            .portal-mobile-toggle {

                display: block;
            }


            .portal-overlay.show {

                display: block;
            }


            .portal-navbar {

                padding: 0 18px;
            }


            .portal-content {

                padding: 20px;
            }


            .portal-navbar-title {

                font-size: 18px;
            }

        }


        @media (max-width: 575.98px) {

            .portal-content {

                padding: 15px;
            }


            .portal-user-name,
            .portal-user-role {

                display: none;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


{{-- =========================================
     Sidebar
========================================= --}}

<aside class="portal-sidebar" id="portalSidebar">


    {{-- Brand --}}
    <div class="portal-brand">

        <div class="portal-brand-icon">

            <i class="bi bi-award-fill"></i>

        </div>


        <div>

            <div class="portal-brand-text">
                Certificate Portal
            </div>

            <span class="portal-brand-subtitle">
                Administration
            </span>

        </div>

    </div>


    {{-- Navigation --}}
    <div class="portal-sidebar-content">


        <div class="portal-section-title">
            Main
        </div>


        <ul class="portal-nav">

            <li>

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                >

                    <i class="bi bi-grid-1x2-fill"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.students.index') }}"
                    class="{{ request()->routeIs('admin.students.*') ? 'active' : '' }}"
                >

                    <i class="bi bi-people-fill"></i>

                    <span>
                        Students
                    </span>

                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.students.import') }}"
                    class="{{ request()->routeIs('admin.students.import*') ? 'active' : '' }}"
                >

                    <i class="bi bi-file-earmark-arrow-up-fill"></i>

                    <span>
                        Import Students
                    </span>

                </a>

            </li>

        </ul>


        <div class="portal-section-title mt-4">
            System
        </div>


        <ul class="portal-nav">

            <li>

                <a href="#">

                    <i class="bi bi-gear-fill"></i>

                    <span>
                        Settings
                    </span>

                </a>

            </li>

        </ul>

    </div>


    {{-- Footer --}}
    <div class="portal-sidebar-footer">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                type="submit"
                class="portal-nav w-100 border-0 bg-transparent p-0 text-start"
            >

                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </a>

            </button>

        </form>

    </div>

</aside>


{{-- Mobile Overlay --}}
<div
    class="portal-overlay"
    id="portalOverlay"
></div>


{{-- =========================================
     Main
========================================= --}}

<div class="portal-main">


    {{-- Navbar --}}
    <nav class="portal-navbar">


        <div class="d-flex align-items-center gap-3">

            <button
                type="button"
                class="portal-mobile-toggle"
                id="portalMobileToggle"
            >
                <i class="bi bi-list"></i>
            </button>


            <div>

                <h1 class="portal-navbar-title">
                    @yield('page-title', 'Dashboard')
                </h1>

            </div>

        </div>


        {{-- User --}}
        <div class="portal-navbar-right">

            @auth

                <div class="portal-user">

                    <div class="portal-user-avatar">

                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                    </div>


                    <div>

                        <div class="portal-user-name">

                            {{ auth()->user()->name ?? 'Administrator' }}

                        </div>

                        <div class="portal-user-role">
                            Administrator
                        </div>

                    </div>

                </div>

            @endauth

        </div>

    </nav>


    {{-- Page Content --}}
    <main class="portal-content">

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <i class="bi bi-exclamation-circle-fill me-2"></i>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        @yield('content')

    </main>

</div>


{{-- Bootstrap JS --}}
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


<script>

    const sidebar = document.getElementById('portalSidebar');

    const overlay = document.getElementById('portalOverlay');

    const mobileToggle = document.getElementById('portalMobileToggle');


    function toggleSidebar()
    {
        sidebar.classList.toggle('show');

        overlay.classList.toggle('show');
    }


    mobileToggle?.addEventListener('click', function ()
    {
        toggleSidebar();
    });


    overlay?.addEventListener('click', function ()
    {
        toggleSidebar();
    });

</script>


@stack('scripts')

</body>

</html>