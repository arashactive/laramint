<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Mint <sup>V 0.01</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __("Dashboard") }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>{{ __("Messages") }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Course Management') }}
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('myCourse') }}">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>{{ __("My Course") }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    @can('menu.education')
    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Education') }}
    </div>

    @can('mentor.list')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#MentorsCollapse" aria-expanded="true" aria-controls="ACLCollapse">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Learners</span>
        </a>
        <div id="MentorsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ route('myLearners') }}">{{ __('My Learners') }}</a>

            </div>

        </div>

    </li>
    @endcan

    @can('course.index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminMenuCourse') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>{{ __("Education Center") }}</span></a>
    </li>
    @endcan

    @endcan


    @can('menu.education')




    @role('Super-Admin')

    <div class="sidebar-heading">
        {{ __('Financial') }}
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Financial" aria-expanded="true" aria-controls="ACLCollapse">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>{{ __('Financial') }}</span>
        </a>
        <div id="Financial" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('plan.index') }}">{{ __('Plan') }}</a>

            </div>
        </div>
    </li>


    <div class="sidebar-heading">
        {{ __('Admin Configuration') }}
    </div>
    <!-- Nav Item - Admin Setup LMS -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ACLCollapse" aria-expanded="true" aria-controls="ACLCollapse">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>ACL</span>
        </a>
        <div id="ACLCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.index') }}">{{ __('User') }}</a>
                <a class="collapse-item" href="{{ route('role.index') }}">{{ __('Role') }}</a>
                <a class="collapse-item" href="{{ route('permission.index') }}">{{ __('Permission') }}</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('configuration.index') }}">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>{{ __("Configuration") }}</span></a>
    </li>

    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endcan
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->