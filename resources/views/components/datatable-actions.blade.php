<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
    <button type="button" class="btn btn-primary rotate mx-3" data-kt-menu-trigger="click"
        data-kt-menu-placement="bottom-start">
        {{ trans('translation.general_general_action') }}
        <span class="svg-icon fs-3 rotate-180 ms-3 me-0"><i class="fa fa-arrow-circle-down"></i></span>
    </button>

    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px"
        data-kt-menu="true">
        <div class="menu-item px-3">
            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                {{ trans('translation.general_general_action') }}</div>
        </div>

        <div class="separator mb-3 opacity-75"></div>

        <div class="menu-item px-3">
            @can($multipleDeletePermission)
                <a href="#" data-route-name="{{ $multipleDeleteRoute }}" class="menu-link px-3 delete_selected">
                    {{ trans('translation.general_general_delete_selected') }}
                </a>
            @endcan
            @if ($activateRoute)
                @can($multipleActivatePermission)
                    <a href="#" data-route-name="{{ $multipleActivateRoute }}"
                        class="menu-link px-3 activate_selected">
                        {{ trans('translation.general_general_activate_selected') }}
                    </a>
                @endcan
            @endif
            @if ($restoreRoute)
                @can($multipleRestorePermission ?? null)
                    <a href="#" data-route-name="{{ $multipleRestoreRoute ?? null}}" class="menu-link px-3 restore_selected">
                        {{ trans('translation.general_general_restore_selected') }}
                    </a>
                @endcan
            @endif

        </div>
    </div>
</div>

