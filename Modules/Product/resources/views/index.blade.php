<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.product_form_manage_products'),
            'createPermission' => 'product-create',
            'createRoute' => route('product.create'),
            'createText' => trans('translation.product_action_add'),
            'deletedPermission' => 'product-trashed',
            'deletedRoute' => route('product.trashed'),
            'deletedText' => trans('translation.product_form_deleted_products_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('product-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'product-multiple-delete'"
                :multipleDeleteRoute="route('product.deleteMultiple')"
                :multipleActivatePermission="'product-multiple-activate'"
                :multipleActivateRoute="route('product.activateMultiple')"
                :multipleRestorePermission="'product-multiple-restore'"
                :multipleRestoreRoute="route('product.restoreMultiple')"
                :activateRoute="request()->routeIs('product.index')"
                :restoreRoute="request()->routeIs('product.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('product::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('product::table', ['model' => 'product'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/products.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
