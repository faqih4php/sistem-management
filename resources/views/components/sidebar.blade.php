<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">NexFlow</span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div class="d-flex align-items-center gap-1">
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end smini-hide border-0"
                    aria-labelledby="sidebar-dark-mode-dropdown">
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_off" data-dark-mode="off">
                        <i class="far fa-sun fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Light</span>
                    </button>
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_on" data-dark-mode="on">
                        <i class="far fa-moon fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Dark</span>
                    </button>
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_system" data-dark-mode="system">
                        <i class="fa fa-desktop fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">System</span>
                    </button>
                </div>
            </div>
            <!-- END Dark Mode -->

            <!-- Options -->
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown"
                    data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                    aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="default">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="{{ asset('css/themes/amethyst.min.css') }}">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="{{ asset('css/themes/city.min.css') }}">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="{{ asset('css/themes/flat.min.css') }}">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="{{ asset('css/themes/modern.min.css') }}">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="{{ asset('css/themes/smooth.min.css') }}">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </button>
                    <!-- END Color Themes -->

                    <div class="dropdown-divider d-dark-none"></div>

                    <!-- Sidebar Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout"
                        data-action="sidebar_style_light" href="javascript:void(0)">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout" data-action="sidebar_style_dark"
                        href="javascript:void(0)">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- END Sidebar Styles -->

                    <div class="dropdown-divider d-dark-none"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout" data-action="header_style_light"
                        href="javascript:void(0)">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout" data-action="header_style_dark"
                        href="javascript:void(0)">
                        <span>Header Dark</span>
                    </a>
                    <!-- END Header Styles -->
                </div>
            </div>
            <!-- END Options -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="nav-main-link-icon si si-home"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                @auth
                    @if (optional(auth()->user()->role)->name == 'Admin')
                        <li class="nav-main-item {{ request()->routeIs('users.*') ? 'open' : '' }}">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="{{ request()->routeIs('roles.*') ? 'true' : 'false' }}" href="#">
                                <i class="nav-main-link-icon si si-users"></i>
                                <span class="nav-main-link-name">Users</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                        href="{{ route('users.index') }}">
                                        <span class="nav-main-link-name">List User</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('users.create') ? 'active' : '' }}"
                                        href="{{ route('users.create') }}">
                                        <span class="nav-main-link-name">Create User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item {{ request()->routeIs('roles.*') ? 'open' : '' }}">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="{{ request()->routeIs('roles.*') ? 'true' : 'false' }}" href="#">
                                <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                                <span class="nav-main-link-name">Roles</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('roles.index') ? 'active' : '' }}"
                                        href="{{ route('roles.index') }}">
                                        <span class="nav-main-link-name">List Role</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('roles.create') ? 'active' : '' }}"
                                        href="{{ route('roles.create') }}">
                                        <span class="nav-main-link-name">Create Role</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif(optional(auth()->user()->role)->name == 'Project Manager')
                        <li class="nav-main-item {{ request()->routeIs('projects.*') ? 'open' : '' }}">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="{{ request()->routeIs('projects.*') ? 'true' : 'false' }}" href="#">
                                <i class="nav-main-link-icon far fa-folder-open"></i>
                                <span class="nav-main-link-name">Projects</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('projects.index') ? 'active' : '' }}"
                                        href="{{ route('projects.index') }}">
                                        <span class="nav-main-link-name">List Project</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('projects.create') ? 'active' : '' }}"
                                        href="{{ route('projects.create') }}">
                                        <span class="nav-main-link-name">Create Project</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item {{ request()->routeIs('tasks.*') ? 'open' : '' }}">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="{{ request()->routeIs('tasks.*') ? 'true' : 'false' }}" href="#">
                                <i class="nav-main-link-icon far fa-sticky-note"></i>
                                <span class="nav-main-link-name">Tasks</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}"
                                        href="{{ route('tasks.index') }}">
                                        <span class="nav-main-link-name">List Tasks</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->routeIs('tasks.project') || request()->routeIs('tasks.create') ? 'active' : '' }}"
                                        href="{{ route('tasks.project') }}">
                                        <span class="nav-main-link-name">Create Task</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('projects.member') ? 'active' : '' }}"
                                href="{{ route('projects.member') }}">
                                <i class="nav-main-link-icon far fa-folder-open"></i>
                                <span class="nav-main-link-name">My Projects</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('tasks.member') ? 'active' : '' }}"
                                href="{{ route('tasks.member') }}">
                                <i class="nav-main-link-icon fa fa-list"></i>
                                <span class="nav-main-link-name">My Tasks</span>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
