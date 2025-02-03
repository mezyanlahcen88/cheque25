<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.employe_action_add'),
            'listPermission' => 'employe-list',
            'listRoute' => route('employe.index'),
            'listText' => trans('translation.employe_form_employes_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('employe-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'employe-multiple-delete'"
                :multipleDeleteRoute="route('employe.deleteMultiple')"
                :multipleActivatePermission="'employe-multiple-activate'"
                :multipleActivateRoute="route('employe.activateMultiple')"
                :multipleRestorePermission="'employe-multiple-restore'"
                :multipleRestoreRoute="route('employe.restoreMultiple')"
                :activateRoute="request()->routeIs('employe.index')"
                :restoreRoute="request()->routeIs('employe.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('employe::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('employe::table', ['model' => 'employe'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/employes.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
