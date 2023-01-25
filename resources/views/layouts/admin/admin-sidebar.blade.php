<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>

            <a class="nav-link {{ Request::routeIs('admin/profile') ? 'active' : '' }}" href="{{ route('admin/profile') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            {{--                MOVIE--}}
            <a class="nav-link {{ Request::routeIs('admin/movie')||Request::routeIs('admin/add_movie') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMovie" aria-expanded="true" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Movie
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/movie')||Request::routeIs('admin/add_movie') ? 'show' : '' }}" id="collapseMovie" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/movie') ? 'active' : '' }}" href="{{ route('admin/movie') }}">View Movie</a>
                    <a class="nav-link {{ Request::routeIs('admin/add_movie') ? 'active' : '' }}" href="{{ route('admin/add_movie') }}">Add movie</a>
                </nav>
            </div>

            {{--                USER--}}
            <a class="nav-link {{ Request::routeIs('admin/user')||Request::routeIs('admin/user.add') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                User
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/user')||Request::routeIs('admin/add_user') ? 'show' : '' }}" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/user') ? 'active' : '' }}" href="{{ route('admin/user') }}">View User</a>
                    <a class="nav-link {{ Request::routeIs('admin/user.add') ? 'active' : '' }}" href="{{ route('admin/user.add') }}">Add User</a>
                </nav>
            </div>

            {{--                HALL--}}
            <a class="nav-link {{ Request::routeIs('admin/hall')||Request::routeIs('admin/add_hall') ? 'show' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHall" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Hall
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/hall')||Request::routeIs('admin/add_hall') ? 'show' : '' }}" id="collapseHall" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/hall') ? 'active' : '' }}" href="{{ route('admin/hall') }}">View Hall</a>
                    <a class="nav-link {{ Request::routeIs('admin/add_hall') ? 'active' : '' }}" href="{{ route('admin/add_hall') }}">Add Hall</a>
                </nav>
            </div>

            {{--                SEANCE--}}
            <a class="nav-link {{ Request::routeIs('admin/seance')||Request::routeIs('admin/add_seance') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSeance" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Seance
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/seance')||Request::routeIs('admin/add_seance') ? 'show' : '' }}" id="collapseSeance" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/seance') ? 'active' : '' }}" href="{{ route('admin/seance') }}">View Seance</a>
                    <a class="nav-link {{ Request::routeIs('admin/add_seance') ? 'active' : '' }}" href="{{ route('admin/add_seance') }}">Add Seance</a>
                </nav>
            </div>

            {{--                RESERVATION--}}
            <a class="nav-link {{ Request::routeIs('admin/reservation')||Request::routeIs('admin/add_reservation') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReservation" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Reservation
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/reservation')||Request::routeIs('admin/add_reservation') ? 'show' : '' }}" id="collapseReservation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/reservation') ? 'active' : '' }}" href="{{ route('admin/reservation') }}">View Reservation</a>
                    <a class="nav-link {{ Request::routeIs('admin/add_reservation') ? 'active' : '' }}" href="{{ route('admin/add_reservation') }}">Add Reservation</a>
                </nav>
            </div>


<!--            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts1">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Layouts
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>-->
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
