<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Mint <sup>V 0.01</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __("Dashboard") }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Configuration') }}
    </div>

    <!-- Nav Item - Admin Setup LMS -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#EducationCollapse"
            aria-expanded="true" aria-controls="EducationCollapse">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Education</span>
        </a>
        <div id="EducationCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ __('First Step:') }}</h6>
                @can('department.index')
                    <a class="collapse-item" href="{{ route('department.index') }}">{{ __('Department') }}</a>
                @endcan
                @can('course.index')
                <a class="collapse-item" href="{{ route('course.index') }}">{{ __('Course') }}</a>
                @endcan
                @can('term.index')
                <a class="collapse-item" href="{{ route('term.index') }}">{{ __('terms') }}</a>
                @endcan
                
                <h6 class="collapse-header">{{ __('Second Step:') }}</h6>
                @can('session.index')
                <a class="collapse-item" href="{{ route('session.index') }}">{{ __('session') }}</a>
                @endcan
            </div>
        </div>
    </li>


    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ToolboxCollapse"
            aria-expanded="true" aria-controls="ACLCollapse">
            <i class="fas fa-fw fa-toolbox"></i>
            <span>Tool Box</span>
        </a>
        <div id="ToolboxCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('file.index') }}">{{ __('Files') }}</a>
            </div>
        </div>
    </li>
    @endrole

    @role('Super-Admin')
    <!-- Nav Item - Admin Setup LMS -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ACLCollapse"
            aria-expanded="true" aria-controls="ACLCollapse">
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
    @endrole
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->