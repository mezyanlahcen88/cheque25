<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.effet_form_manage_effets'),
            'createPermission' => 'effet-create',
            'createRoute' => route('effet.create'),
            'createText' => trans('translation.effet_action_add'),
            'deletedPermission' => 'effet-trashed',
            'deletedRoute' => route('effet.trashed'),
            'deletedText' => trans('translation.effet_form_deleted_effets_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('effet-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'effet-multiple-delete'"
                :multipleDeleteRoute="route('effet.deleteMultiple')"
                :multipleActivatePermission="'effet-multiple-activate'"
                :multipleActivateRoute="route('effet.activateMultiple')"
                :multipleRestorePermission="'effet-multiple-restore'"
                :multipleRestoreRoute="route('effet.restoreMultiple')"
                :activateRoute="request()->routeIs('effet.index')"
                :restoreRoute="request()->routeIs('effet.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('effet::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('effet::table', ['model' => 'effet'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/effets.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
