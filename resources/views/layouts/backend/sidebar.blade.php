<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
{{--            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">--}}
{{--                    <i class="flaticon-050-info"></i>--}}
{{--                    <span class="nav-text">About</span>--}}
{{--                </a>--}}
{{--                <ul aria-expanded="false">--}}
{{--                    <li><a href="{{route('about.create')}}">About</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->id == 1 || Auth::guard('admin')->user()->role == 'admin')
                <li><a href="{{route('admin.index')}}"><i class="nav-icon fa fa-users"></i>Admins</a></li>
            @endif


            <li><a href="{{route('languages.index')}}"><i class="nav-icon fas fa-globe"></i>Languages</a></li>
            <li><a href="{{route('settings.index')}}"><i class="nav-icon fas fa-cog"></i>Setting</a></li>

        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
