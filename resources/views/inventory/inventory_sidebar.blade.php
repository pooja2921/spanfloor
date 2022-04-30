<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="30" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" title="Sapn Floor"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment2 == 'inventory') ? 'active' : '' }}">
                    <a href="{{url('/inventory')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>

                <!-- start inventory pages -->
                {{--<div class="nav-item {{ ($segment1 == 'products') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Products')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('products/create')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Product')}}</a>
                        <a href="{{url('products')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == '') ? 'active' : '' }}">{{ __('List Producs')}}</a>
                    </div>
                </div>--}}
                @can('manage_categories')
                <div class="nav-item {{ ($segment1 == 'categories') ? 'active' : '' }}">
                    <a href="{{url('categories')}}"><i class="ik ik-list"></i><span>{{ __('Categories')}}</span></a>
                </div>
                @endcan
                
                @can('manager_item')
                <div class="nav-item {{ ($segment1 == 'items') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Items')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('attribute/create')}}" class="menu-item {{ ($segment1 == 'attribute' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Attribute')}}</a>
                        <a href="{{url('items/create')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Items')}}</a>
                        <a href="{{url('items')}}" class="menu-item {{ ($segment1 == 'items' && $segment2 == '') ? 'active' : '' }}">{{ __('List Items')}}</a>
                    </div>
                </div>
                @endcan
                
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')
                        <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Users')}}</a>
                        <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add User')}}</a>
                         @endcan
                         <!-- only those have manage_role permission will get access -->
                        @can('manage_roles')
                        <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles')}}</a>
                        @endcan
                        <!-- only those have manage_permission permission will get access -->
                        @can('manage_permission')
                        <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permission')}}</a>
                        @endcan
                    </div>
                </div>
            



                <!-- end inventory pages -->

                
        </div>
    </div>
</div>