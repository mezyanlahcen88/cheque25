<x-default-layout>
    @section('breadcrumb')
        @include('components.simple_breadcrumb', [
            'title' => trans('translation.setting_form_manage_settings'),
            'createPermission' => 'setting-create',
            'createRoute' => route('setting.create'),
            'createText' => trans('translation.setting_action_add'),
        ])
    @endsection
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#General"
                    aria-selected="true" role="tab">General</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#Social" aria-selected="true"
                    role="tab">Social links</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#email_settings"
                    aria-selected="true" role="tab">Email Settings</a>
            </li>
        </ul>
        <div class="tab-content">
            @include('setting::general')
            @include('setting::social_links')
            @include('setting::email_settings')
        </div>
        <!--end::Tab content-->
    </div>
    @push('scripts')
    <script src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var allEditors = document.querySelectorAll('.ckeditor');
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create(allEditors[i]);
}

    </script>
    
    @endpush
</x-default-layout>
