<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.brand_form_manage_brands'),
            'createPermission' => 'brand-create',
            'createRoute' => route('brand.create'),
            'createText' => trans('translation.brand_action_add'),
            'deletedPermission' => 'brand-trashed',
            'deletedRoute' => route('brand.trashed'),
            'deletedText' => trans('translation.brand_form_deleted_brands_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('brand-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'brand-multiple-delete'"
                :multipleDeleteRoute="route('brand.deleteMultiple')"
                :multipleActivatePermission="'brand-multiple-activate'"
                :multipleActivateRoute="route('brand.activateMultiple')"
                :multipleRestorePermission="'brand-multiple-restore'"
                :multipleRestoreRoute="route('brand.restoreMultiple')"
                :activateRoute="request()->routeIs('brand.index')"
                :restoreRoute="request()->routeIs('brand.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('brand::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('brand::table', ['model' => 'brand'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/brands.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
