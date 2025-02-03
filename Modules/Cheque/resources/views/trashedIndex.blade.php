<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.cheque_action_add'),
            'listPermission' => 'cheque-list',
            'listRoute' => route('cheque.index'),
            'listText' => trans('translation.cheque_form_cheques_list'),
        ])
    @endsection
   <div class="card card-p-1 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @can('cheque-export')
                    @include('components.export-buttons')
                @endcan
            <x-datatable-actions
                :multipleDeletePermission="'cheque-multiple-delete'"
                :multipleDeleteRoute="route('cheque.deleteMultiple')"
                :multipleActivatePermission="'cheque-multiple-activate'"
                :multipleActivateRoute="route('cheque.activateMultiple')"
                :multipleRestorePermission="'cheque-multiple-restore'"
                :multipleRestoreRoute="route('cheque.restoreMultiple')"
                :activateRoute="request()->routeIs('cheque.index')"
                :restoreRoute="request()->routeIs('cheque.trashed')"
            />
            </div>
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                </div>
        </div>
        @include('cheque::filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('cheque::table', ['model' => 'cheque'])
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/cheques.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
