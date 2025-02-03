<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.supplier_form_manage_suppliers'),
            'createPermission' => 'supplier-create',
            'createRoute' => route('supplier.create'),
            'createText' => trans('translation.supplier_action_add'),
            'deletedPermission' => 'supplier-trashed',
            'deletedRoute' => route('supplier.trashed'),
            'deletedText' => trans('translation.supplier_form_deleted_suppliers_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('supplier-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'supplier-multiple-delete'"
                :multipleDeleteRoute="route('supplier.deleteMultiple')"
                :multipleActivatePermission="'supplier-multiple-activate'"
                :multipleActivateRoute="route('supplier.activateMultiple')"
                :multipleRestorePermission="'supplier-multiple-restore'"
                :multipleRestoreRoute="route('supplier.restoreMultiple')"
                :activateRoute="request()->routeIs('supplier.index')"
                :restoreRoute="request()->routeIs('supplier.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('supplier::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('supplier::table', ['model' => 'supplier'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/suppliers.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
