<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => 'Users',
            'createPermission' => 'user-create',
            'createRoute' => route('admin.users.create'),
            'createText' => trans('translation.user_action_add'),
            'deletedPermission' => 'user-delete',
            'deletedRoute' => route('admin.users.create'),
            'deletedText' => trans('translation.user_action_add'),
        ])
    @endsection
    <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                @include('components.search')
                <!--end::Search-->
            </div>
            <div class="d-flex">
                {{-- start filter button --}}
                @include('components.filter-button')
                {{-- end filter button --}}
                {{-- start export button --}}
                @include('components.export-buttons')
                {{-- end export button --}}
            </div>
            <!--begin::Group actions-->
            @include('components.group-actions')
            <!--end::Group actions-->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('pages.apps.user-management.users.table', ['model' => 'user'])
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/users.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
    @endpush

</x-default-layout>
