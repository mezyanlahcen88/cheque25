<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.category_form_manage_categories'),
            'createPermission' => 'category-create',
            'createRoute' => route('category.create'),
            'createText' => trans('translation.category_action_add'),
            'deletedPermission' => 'category-trashed',
            'deletedRoute' => route('category.trashed'),
            'deletedText' => trans('translation.category_form_deleted_categories_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('category-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'category-multiple-delete'"
                :multipleDeleteRoute="route('category.deleteMultiple')"
                :multipleActivatePermission="'category-multiple-activate'"
                :multipleActivateRoute="route('category.activateMultiple')"
                :multipleRestorePermission="'category-multiple-restore'"
                :multipleRestoreRoute="route('category.restoreMultiple')"
                :activateRoute="request()->routeIs('category.index')"
                :restoreRoute="request()->routeIs('category.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('category::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('category::table', ['model' => 'category'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/categories.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
