@push('css')
    <style>

        /* todo - not catching, cause included??? */
        #admin-menu-off-canvas {
            /*width: 12px !important;*/
            /*max-width: 23px !important;*/

            /*width: 12rem !important;*/
            /*max-width: 23rem !important;*/
            /*background-color: #292727;*/
            /*opacity: .9;*/
            /*color: #fff;*/
        }

    </style>
@endpush

<div class="container-fluid">

    {{--Menu Button--}}
    <button class="btn btn-secondary bg-secondary px-4" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#admin-menu-off-canvas" aria-controls="admin-menu-off-canvas">
        <i class="fas fa-bars mr-1"></i>
        Admin Menu
    </button>

{{--    <button class="btn btn-secondary bg-secondary" type="button" data-bs-toggle="offcanvas"--}}
{{--            data-bs-target="#admin-menu-off-canvas" aria-controls="admin-menu-off-canvas">--}}
{{--        Menu--}}
{{--    </button>--}}

    <div class="offcanvas offcanvas-start" tabindex="-1" id="admin-menu-off-canvas" aria-labelledby="admin-menu-label"
         style="width: 14rem !important; max-width: 14rem !important;"
        {{--        style="background-color: #292727; opacity: .9; color: #fff;"--}}
    >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="admin-menu-label">Admin Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Navigation items here -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt mr-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="fas fa-users mr-1"></i>
                        Users
                    </a>
                </li>

                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('admin.roles.index') }}" class="nav-link">--}}
                {{--                        <i class="fas fa-user-tag mr-1"></i>--}}
                {{--                        Roles--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">--}}
                {{--                        <i class="fas fa-user-lock mr-1"></i>--}}
                {{--                        Permissions--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('admin.categories.index') }}" class="nav-link">--}}
                {{--                        <i class="fas fa-list mr-1"></i>--}}
                {{--                        Categories--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('admin.posts.index') }}" class="nav-link">--}}
                {{--                        <i class="fas fa-file-alt mr-1"></i>--}}
                {{--                        Posts--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                {{--                <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>--}}
                {{--                <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>--}}
                {{--                <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>--}}
            </ul>
        </div>
    </div>
</div>
