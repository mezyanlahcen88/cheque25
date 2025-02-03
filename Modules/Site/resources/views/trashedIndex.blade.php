<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.site_action_add'),
            'listPermission' => 'site-list',
            'listRoute' => route('site.index'),
            'listText' => trans('translation.site_form_sites_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('site-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'site-multiple-delete'"
                :multipleDeleteRoute="route('site.deleteMultiple')"
                :multipleActivatePermission="'site-multiple-activate'"
                :multipleActivateRoute="route('site.activateMultiple')"
                :multipleRestorePermission="'site-multiple-restore'"
                :multipleRestoreRoute="route('site.restoreMultiple')"
                :activateRoute="request()->routeIs('site.index')"
                :restoreRoute="request()->routeIs('site.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('site::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('site::table', ['model' => 'site'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/sites.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
