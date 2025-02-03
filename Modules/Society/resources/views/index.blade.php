<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.society_form_manage_societies'),
            'createPermission' => 'society-create',
            'createRoute' => route('society.create'),
            'createText' => trans('translation.society_action_add'),
            'deletedPermission' => 'society-trashed',
            'deletedRoute' => route('society.trashed'),
            'deletedText' => trans('translation.society_form_deleted_societies_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('society-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'society-multiple-delete'"
                :multipleDeleteRoute="route('society.deleteMultiple')"
                :multipleActivatePermission="'society-multiple-activate'"
                :multipleActivateRoute="route('society.activateMultiple')"
                :multipleRestorePermission="'society-multiple-restore'"
                :multipleRestoreRoute="route('society.restoreMultiple')"
                :activateRoute="request()->routeIs('society.index')"
                :restoreRoute="request()->routeIs('society.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('society::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('society::table', ['model' => 'society'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/societies.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
