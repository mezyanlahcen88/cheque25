<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.carnet_action_add'),
            'listPermission' => 'carnet-list',
            'listRoute' => route('carnet.index'),
            'listText' => trans('translation.carnet_form_carnets_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('carnet-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'carnet-multiple-delete'"
                :multipleDeleteRoute="route('carnet.deleteMultiple')"
                :multipleActivatePermission="'carnet-multiple-activate'"
                :multipleActivateRoute="route('carnet.activateMultiple')"
                :multipleRestorePermission="'carnet-multiple-restore'"
                :multipleRestoreRoute="route('carnet.restoreMultiple')"
                :activateRoute="request()->routeIs('carnet.index')"
                :restoreRoute="request()->routeIs('carnet.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('carnet::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('carnet::table', ['model' => 'carnet'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/carnets.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
