<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.numerotation_form_manage_numerotations'),
            'createPermission' => 'numerotation-create',
            'createRoute' => route('numerotation.create'),
            'createText' => trans('translation.numerotation_action_add'),
            'deletedPermission' => 'numerotation-trashed',
            'deletedRoute' => route('numerotation.trashed'),
            'deletedText' => trans('translation.numerotation_form_deleted_numerotations_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('numerotation-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'numerotation-multiple-delete'"
                :multipleDeleteRoute="route('numerotation.deleteMultiple')"
                :multipleActivatePermission="'numerotation-multiple-activate'"
                :multipleActivateRoute="route('numerotation.activateMultiple')"
                :multipleRestorePermission="'numerotation-multiple-restore'"
                :multipleRestoreRoute="route('numerotation.restoreMultiple')"
                :activateRoute="request()->routeIs('numerotation.index')"
                :restoreRoute="request()->routeIs('numerotation.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('numerotation::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('numerotation::table', ['model' => 'numerotation'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/numerotations.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
