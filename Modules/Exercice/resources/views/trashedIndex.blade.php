<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.exercice_action_add'),
            'listPermission' => 'exercice-list',
            'listRoute' => route('exercice.index'),
            'listText' => trans('translation.exercice_form_exercices_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('exercice-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'exercice-multiple-delete'"
                :multipleDeleteRoute="route('exercice.deleteMultiple')"
                :multipleActivatePermission="'exercice-multiple-activate'"
                :multipleActivateRoute="route('exercice.activateMultiple')"
                :multipleRestorePermission="'exercice-multiple-restore'"
                :multipleRestoreRoute="route('exercice.restoreMultiple')"
                :activateRoute="request()->routeIs('exercice.index')"
                :restoreRoute="request()->routeIs('exercice.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('exercice::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('exercice::table', ['model' => 'exercice'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/exercices.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
