<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.compte_action_add'),
            'listPermission' => 'compte-list',
            'listRoute' => route('compte.index'),
            'listText' => trans('translation.compte_form_comptes_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('compte-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'compte-multiple-delete'"
                :multipleDeleteRoute="route('compte.deleteMultiple')"
                :multipleActivatePermission="'compte-multiple-activate'"
                :multipleActivateRoute="route('compte.activateMultiple')"
                :multipleRestorePermission="'compte-multiple-restore'"
                :multipleRestoreRoute="route('compte.restoreMultiple')"
                :activateRoute="request()->routeIs('compte.index')"
                :restoreRoute="request()->routeIs('compte.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('compte::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('compte::table', ['model' => 'compte'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/comptes.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
