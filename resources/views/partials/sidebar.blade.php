@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

              {{--start for admin--}}
            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
               
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('location_access')
                    <li class="{{ $request->segment(2) == 'locations' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.locations.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">@lang('global.locations.title')</span>
                        </a>
                    </li>
                @endcan
                @endcan

                
                </ul>

            {{--end for user--}}

            @can('rateCc_access')
                <li class="{{ $request->segment(2) == 'rateCcs' ? 'active' : '' }}">
                    <a href="{{ route('admin.rateCcs.index') }}">
                        <i class="fa fa-gears"></i>
                        <span class="title">อัตราการเสียภาษีรถ ตามความจุกระบอกสูบ (ซีซี.)</span>
                    </a>
                </li>
            @endcan

            @can('rateWeight_access')
                <li class="{{ $request->segment(2) == 'rateWeights' ? 'active' : '' }}">
                    <a href="{{ route('admin.rateWeights.index') }}">
                        <i class="fa fa-gears"></i>
                        <span class="title">อัตราการเสียภาษีรถ คิดตามน้ำหนักรถ</span>
                    </a>
                </li>
            @endcan

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
