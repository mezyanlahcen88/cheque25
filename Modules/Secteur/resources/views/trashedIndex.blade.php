<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.secteur_action_add'),
            'listPermission' => 'secteur-list',
            'listRoute' => route('secteur.index'),
            'listText' => trans('translation.secteur_form_secteurs_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('secteur-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'secteur-multiple-delete'"
                :multipleDeleteRoute="route('secteur.deleteMultiple')"
                :multipleActivatePermission="'secteur-multiple-activate'"
                :multipleActivateRoute="route('secteur.activateMultiple')"
                :multipleRestorePermission="'secteur-multiple-restore'"
                :multipleRestoreRoute="route('secteur.restoreMultiple')"
                :activateRoute="request()->routeIs('secteur.index')"
                :restoreRoute="request()->routeIs('secteur.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('secteur::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('secteur::trashedTable', ['model' => 'secteur'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/secteurs.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
