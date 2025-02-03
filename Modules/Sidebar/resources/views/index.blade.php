<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.sidebar_form_manage_sidebars'),
            'createPermission' => 'sidebar-create',
            'createRoute' => route('sidebar.create'),
            'createText' => trans('translation.sidebar_action_add'),
            'deletedPermission' => 'sidebar-trashed',
            'deletedRoute' => route('sidebar.trashed'),
            'deletedText' => trans('translation.sidebar_form_deleted_sidebars_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('sidebar-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'sidebar-multiple-delete'"
                :multipleDeleteRoute="route('sidebar.deleteMultiple')"
                :multipleActivatePermission="'sidebar-multiple-activate'"
                :multipleActivateRoute="route('sidebar.activateMultiple')"
                :multipleRestorePermission="'sidebar-multiple-restore'"
                :multipleRestoreRoute="route('sidebar.restoreMultiple')"
                :activateRoute="request()->routeIs('sidebar.index')"
                :restoreRoute="request()->routeIs('sidebar.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('sidebar::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('sidebar::table', ['model' => 'sidebar'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/sidebars.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
