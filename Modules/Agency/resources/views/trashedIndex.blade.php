<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.agency_form_deleted_agencies_list'),
            'listPermission' => 'agency-list',
            'listRoute' => route('agency.index'),
            'listText' => trans('translation.agency_form_agencies_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('agency-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'agency-multiple-delete'"
                :multipleDeleteRoute="route('agency.deleteMultiple')"
                :multipleActivatePermission="'agency-multiple-activate'"
                :multipleActivateRoute="route('agency.activateMultiple')"
                :multipleRestorePermission="'agency-multiple-restore'"
                :multipleRestoreRoute="route('agency.restoreMultiple')"
                :activateRoute="request()->routeIs('agency.index')"
                :restoreRoute="request()->routeIs('agency.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('agency::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('agency::trashedTable', ['model' => 'agency'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/agencies.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
