<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>

            <a class="nav-link {{ Request::routeIs('admin/profile') ? 'active' : '' }}" href="{{ route('admin/profile') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <!-- MOVIE -->
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

            <!-- USER -->
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

            <!-- HALL -->
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

            <!-- SEANCE -->
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

            <!-- RESERVATION -->
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

            <!-- Price -->
            <a class="nav-link {{ Request::routeIs('admin/price')||Request::routeIs('admin/add_price') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Price
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/price')||Request::routeIs('admin/add_price') ? 'show' : '' }}" id="collapsePrice" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/price') ? 'active' : '' }}" href="{{ route('admin/price') }}">View price</a>
                    <a class="nav-link {{ Request::routeIs('admin/add_price') ? 'active' : '' }}" href="{{ route('admin/add_price') }}">Add price</a>
                </nav>
            </div>

            <!-- DISCOUNT -->
            <!-- <a class="nav-link {{ Request::routeIs('admin/discount')||Request::routeIs('admin/add_discount') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDiscount" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Discount
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::routeIs('admin/discount')||Request::routeIs('admin/add_discount') ? 'show' : '' }}" id="collapseDiscount" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('admin/discount') ? 'active' : '' }}" href="{{ route('admin/discount') }}">View Discount</a>
                    <a class="nav-link {{ Request::routeIs('admin/add_discount') ? 'active' : '' }}" href="{{ route('admin/add_discount') }}">Add Discount</a>
                </nav>
            </div> -->


        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
