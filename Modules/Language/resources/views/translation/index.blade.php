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
        <div class="card-header align-items-center  gap-2 gap-md-5">
            <div class="card-title">
                @include('components.search')
            </div>
            <div class="d-flex buttons">
                @include('components.filter-button')
                @include('components.export-buttons')
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
                @include('components.delete_selected')
            </div>
        </div>
        @include('language::translation.filters')
        <div class="card-body">
            <div class="table-responsive">
                @include('language::translation.table', ['model' => 'languagetranslate'])
            </div>
        </div>
    </div>
   @include('language::translation.add_translation_modal')

    @push('scripts')
    <script src="{{ URL::asset('assets/custom_js/translation.js') }}"></script>
    <script src="{{ URL::asset('assets/custom_js/translation_module.js') }}"></script>
    <script src="{{ URL::asset('assets/custom_js/delete.js') }}"></script>
    <script src="{{ URL::asset('assets/custom_js/change_status.js') }}"></script>
    @endpush
</x-default-layout>
