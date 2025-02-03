<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu"
            data-kt-menu="true" data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    <span class="menu-title text-uppercase">{{ trans('translation.navigation_navigation_dashboard') }}</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title text-uppercase">{{ trans('translation.navigation_navigation_dashboard') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item pt-5">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item user management-->
            @if (auth()->user()->can('sidebar-manage-users'))
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
                        <span class="menu-title text-uppercase">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                                href="{{ route('user.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-uppercase">Users</span>
                            </a>
                        </div>
                        @if (auth()->user()->can('role-list'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('role.index') ? 'active' : '' }}"
                                    href="{{ route('role.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-uppercase">Roles</span>
                                </a>
                            </div>
                        @endif
                        @if (auth()->user()->can('permission-list'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('permission.index') ? 'active' : '' }}"
                                    href="{{ route('permission.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-uppercase">Permissions</span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <!--end:Menu sub-->
                </div>
            @endif
            {{-- start sidebar logic --}}
            @foreach (getSidebar() as $sidebar)
                @if ($sidebar['type'] === 'sidebar')
                    <div class="menu-item">
                        <a class="menu-link"
                            href="{{ $sidebar['route'] ? route($sidebar['route'] . '.index') : '#' }}">
                            <span class="menu-icon">{!! getIcon($sidebar['icon'], 'fs-2') !!}</span>
                            <span class="menu-title text-uppercase">{{ trans('translation.navigation_navigation_'.strtolower($sidebar['name'])) }}</span>
                        </a>
                    </div>
                @endif
                @if ($sidebar['type'] === 'hasChilds')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">{!! getIcon($sidebar['icon'], 'fs-2') !!}</span>
                            <span class="menu-title text-uppercase">{{ trans('translation.navigation_navigation_'.strtolower($sidebar['name']))  }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            @if (strtolower($sidebar['name']) !== 'settings')
                                @foreach ($sidebar['childs'] as $child)
                                    @if (auth()->user()->can($child['permission']))
                                        <div class="menu-item">
                                            <a class="menu-link {{ request()->routeIs($child['route'] . '.index') ? 'active' : '' }}"
                                                href="{{ $child['route'] ? route($child['route'] . '.index') : '#' }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title text-uppercase">{{ trans('translation.navigation_navigation_'.strtolower($child['name']))  }}</span>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($sidebar['childs'] as $child)
                                    @if (auth()->user()->can($child['permission']))
                                        <div class="menu-item">
                                            <a class="menu-link {{ request()->routeIs($child['route'] . '.index') ? 'active' : '' }}"
                                                href="{{ $child['route'] ? route($child['route'] . '.index') : '#' }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title text-uppercase">{{ trans('translation.navigation_navigation_'.strtolower($child['name']))  }}</span>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                                @can('setting-list')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('setting.edit') ? 'active' : '' }}"
                                            href="{{ route('setting.edit', 'update-system-settings') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-uppercase">Settings</span>
                                        </a>
                                    </div>
                                @endcan
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
