<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.language_action_add'),
            'listPermission' => 'language-list',
            'listRoute' => route('language.index'),
            'listText' => trans('translation.language_form_languages_list'),
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
                @include('language::trashedTable', ['model' => 'language'])
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/users_datatable.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
    @endpush

</x-default-layout>
























    <div class="card">
        <div class="card-header border-0">
            @include('components.datatable-header')
        </div>
        <div class="card-body mt-n5">
            @include('language::trashedTable', [
                'model' => 'language',
            ])
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ asset('assets/custom_js/datatable.js') }}"></script>
    @endpush
</x-default-layout>
