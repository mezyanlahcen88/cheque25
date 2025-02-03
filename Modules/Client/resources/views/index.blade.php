<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.client_form_manage_clients'),
            'createPermission' => 'client-create',
            'createRoute' => route('client.create'),
            'createText' => trans('translation.client_action_add'),
            'deletedPermission' => 'client-trashed',
            'deletedRoute' => route('client.trashed'),
            'deletedText' => trans('translation.client_form_deleted_clients_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('client-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'client-multiple-delete'"
                :multipleDeleteRoute="route('client.deleteMultiple')"
                :multipleActivatePermission="'client-multiple-activate'"
                :multipleActivateRoute="route('client.activateMultiple')"
                :multipleRestorePermission="'client-multiple-restore'"
                :multipleRestoreRoute="route('client.restoreMultiple')"
                :activateRoute="request()->routeIs('client.index')"
                :restoreRoute="request()->routeIs('client.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('client::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('client::table', ['model' => 'client'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/clients.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
