<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.state_form_manage_states'),
            'createPermission' => 'state-create',
            'createRoute' => route('state.create'),
            'createText' => trans('translation.state_action_add'),
            'deletedPermission' => 'state-trashed',
            'deletedRoute' => route('state.trashed'),
            'deletedText' => trans('translation.state_form_deleted_states_list'),
        ])
          @endsection
 <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('state-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'state-multiple-delete'"
                :multipleDeleteRoute="route('state.deleteMultiple')"
                :multipleActivatePermission="'state-multiple-activate'"
                :multipleActivateRoute="route('state.activateMultiple')"
                :multipleRestorePermission="'state-multiple-restore'"
                :multipleRestoreRoute="route('state.restoreMultiple')"
                :activateRoute="request()->routeIs('state.index')"
                :restoreRoute="request()->routeIs('state.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('state::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('state::table', ['model' => 'state'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/states.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
