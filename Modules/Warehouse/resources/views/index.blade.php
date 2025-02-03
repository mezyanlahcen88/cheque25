<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.warehouse_form_manage_warehouses'),
            'createPermission' => 'warehouse-create',
            'createRoute' => route('warehouse.create'),
            'createText' => trans('translation.warehouse_action_add'),
            'deletedPermission' => 'warehouse-trashed',
            'deletedRoute' => route('warehouse.trashed'),
            'deletedText' => trans('translation.warehouse_form_deleted_warehouses_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('warehouse-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'warehouse-multiple-delete'"
                :multipleDeleteRoute="route('warehouse.deleteMultiple')"
                :multipleActivatePermission="'warehouse-multiple-activate'"
                :multipleActivateRoute="route('warehouse.activateMultiple')"
                :multipleRestorePermission="'warehouse-multiple-restore'"
                :multipleRestoreRoute="route('warehouse.restoreMultiple')"
                :activateRoute="request()->routeIs('warehouse.index')"
                :restoreRoute="request()->routeIs('warehouse.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('warehouse::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('warehouse::table', ['model' => 'warehouse'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/warehouses.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
