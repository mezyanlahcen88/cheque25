<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.permission_action_add'),
            'listPermission' => 'permission-list',
            'listRoute' => route('permission.index'),
            'listText' => trans('translation.permission_form_permissions_list'),
        ])
    @endsection
    <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center  gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                @include('components.search')
                <!--end::Search-->
            </div>
            <div class="d-flex buttons">
                {{-- start filter button --}}
                @include('components.filter-button')
                {{-- end filter button --}}
                {{-- start export button --}}
                @include('components.export-buttons')
                {{-- end export button --}}

                <x-datatable-actions
                :multipleDeletePermission="'permission-multiple-delete'"
                :multipleDeleteRoute="route('permission.deleteMultiple')"
                :multipleActivatePermission="'permission-multiple-activate'"
                :multipleActivateRoute="route('permission.activateMultiple')"
                :multipleRestorePermission="'permission-multiple-restore'"
                :multipleRestoreRoute="route('permission.restoreMultiple')"
                :activateRoute="request()->routeIs('permission.index')"
                :restoreRoute="request()->routeIs('permission.trashed')"
            />
            </div>
            <!--begin::delete_selected-->
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                @include('components.delete_selected')
            </div>
            <!--end::delete_selected-->
        </div>
        <!--begin::Filters-->
        @include('user::filters')
        <!--end::Filters-->
        <div class="card-body">
            <div class="table-responsive">
                @include('permission::trashedTable', ['model' => 'permission'])
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ URL::asset('assets/js/modules/datatable.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
