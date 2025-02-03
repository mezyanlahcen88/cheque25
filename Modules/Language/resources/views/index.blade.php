<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb', [
            'title' => trans('translation.language_form_manage_languages'),
            'createPermission' => 'language-create',
            'createRoute' => route('language.create'),
            'createText' => trans('translation.language_action_add'),
            'deletedPermission' => 'language-trashed',
            'deletedRoute' => route('language.trashed'),
            'deletedText' => trans('translation.language_form_deleted_languages_list'),
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
            <div class="d-flex justify-content-end align-items-center deleteMultipleDiv d-none">
                @include('components.delete_selected')
            </div>
            <!--end::Group actions-->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('language::table', ['model' => 'language'])
            </div>
        </div>
    </div>
    @push('scripts')

        <script src="{{ URL::asset('assets/custom_js/langauges.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
        <script src="{{ URL::asset('assets/custom_js/makeLangueDefault.js') }}"></script>
    @endpush

</x-default-layout>
