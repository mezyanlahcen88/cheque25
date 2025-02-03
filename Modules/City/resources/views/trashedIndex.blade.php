<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.city_action_add'),
            'listPermission' => 'city-list',
            'listRoute' => route('city.index'),
            'listText' => trans('translation.city_form_cities_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('city-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'city-multiple-delete'"
                :multipleDeleteRoute="route('city.deleteMultiple')"
                :multipleActivatePermission="'city-multiple-activate'"
                :multipleActivateRoute="route('city.activateMultiple')"
                :multipleRestorePermission="'city-multiple-restore'"
                :multipleRestoreRoute="route('city.restoreMultiple')"
                :activateRoute="request()->routeIs('city.index')"
                :restoreRoute="request()->routeIs('city.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('city::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('city::table', ['model' => 'city'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/cities.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
