<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <span class="brand-text font-weight-bold">GCLIT LMS</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Vite::image('user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">User Name</a>
            </div>
        </div>

        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item {{ $active['letter'] ?? '' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $active['letter'] ?? '' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mail-bulk text-cyan"></i>
                        <p>
                            Letters
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('letter.type', 'PD') }}"
                                class="nav-link {{ ($active['letter'] ?? '') == 'PD' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-blue"></i>
                                <p>President Directors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('letter.type', 'TD') }}"
                                class="nav-link {{ ($active['letter'] ?? '') == 'TD' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-green"></i>
                                <p>Technical Directors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('letter.type', 'FD') }}"
                                class="nav-link {{ ($active['letter'] ?? '') == 'FD' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-yellow"></i>
                                <p>Finance Directors</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
