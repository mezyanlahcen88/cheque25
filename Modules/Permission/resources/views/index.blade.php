<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.permission_form_manage_permissions'),
            'createPermission' => 'permission-create',
            'createRoute' => route('permission.create'),
            'createText' => trans('translation.permission_action_add'),
            'deletedPermission' => 'permission-delete',
            'deletedRoute' => route('permission.index'),
            'deletedText' => trans('translation.permission_form_deleted_permissions_list'),
        ])
    @endsection
    <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
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
                :multipleRestorePermission="''"
                :multipleRestoreRoute="''"
                :activateRoute="request()->routeIs('permission.index')"
                :restoreRoute="''"
            />
            </div>
            <!--begin::delete_selected-->
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
            </div>
        </div>
        <!--begin::Filters-->
        @include('permission::filters')
        <!--end::Filters-->

        <div class="card-body">
            <div class="table-responsive">
                @include('permission::table', ['model' => 'permission'])
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/permissions.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush

</x-default-layout>
