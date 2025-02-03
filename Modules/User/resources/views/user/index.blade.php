<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => 'Users',
            'createPermission' => 'user-create',
            'createRoute' => route('user.create'),
            'createText' => trans('translation.user_action_add'),
            'deletedPermission' => 'user-create',
            'deletedRoute' => route('user.trashed'),
            'deletedText' => trans('translation.user_form_deleted_users_list'),
        ])
    @endsection
    <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center  gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('user-export')
                    @include('components.export-buttons')
                @endcan
                <x-datatable-actions
                :multipleDeletePermission="'user-multiple-delete'"
                :multipleDeleteRoute="route('user.deleteMultiple')"
                :multipleActivatePermission="'user-multiple-activate'"
                :multipleActivateRoute="route('user.activateMultiple')"
                :multipleRestorePermission="'user-multiple-restore'"
                :multipleRestoreRoute="route('user.restoreMultiple')"
                :activateRoute="request()->routeIs('user.index')"
                :restoreRoute="request()->routeIs('user.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
        </div>
        </div>
        @include('user::user.index.filters')

        <div class="card-body">
            <div class="table-responsive">
                @include('user::user.table', ['model' => 'user'])
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ URL::asset('assets/js/modules/datatable.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>

    @endpush

</x-default-layout>
