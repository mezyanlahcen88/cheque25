<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.bank_action_add'),
            'listPermission' => 'bank-list',
            'listRoute' => route('bank.index'),
            'listText' => trans('translation.bank_form_banks_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('bank-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'bank-multiple-delete'"
                :multipleDeleteRoute="route('bank.deleteMultiple')"
                :multipleActivatePermission="'bank-multiple-activate'"
                :multipleActivateRoute="route('bank.activateMultiple')"
                :multipleRestorePermission="'bank-multiple-restore'"
                :multipleRestoreRoute="route('bank.restoreMultiple')"
                :activateRoute="request()->routeIs('bank.index')"
                :restoreRoute="request()->routeIs('bank.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('bank::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('bank::table', ['model' => 'bank'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/banks.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
