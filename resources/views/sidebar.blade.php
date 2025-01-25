<style>

    ul{
        list-style-type: none;
    }
    
    </style>
    
    
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md" style="background-color: #0e1a50">
    
        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->
    
    
        <!-- Sidebar content -->
        <div class="sidebar-content">
    
            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
    
                    <!-- Main -->
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Main"></i></li>

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                            <i class="icon-home4"></i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">MASTER</div> <i class="icon-menu" title="Main"></i></li>

                    <li class="nav-item">
                        <a href="{{ url('/pegawai') }}" class="nav-link {{ (request()->is('pegawai*')) ? 'active' : '' }}">
                            <i class="icon-users4"></i>
                            <span>
                                Pegawai
                            </span>
                        </a>
                    </li>

                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">SETTING</div> <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                            <i class="icon-user"></i>
                            <span>
                                Users
                            </span>
                        </a>
                    </li>
    
            </div>
        </div>
        
    </div>