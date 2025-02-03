<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.language_action_add'),
            'listPermission' => 'language-list',
            'listRoute' => route('language.index'),
            'listText' => trans('translation.language_form_languages_list'),
        ])
    @endsection
    <form action="{{ route('language.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
                        <div class="col-md-9">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">Title</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <x-input-field cols="col-md-6" divID="name" column="name" model="language"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="locale" column="locale" model="language"
                                optional="text-danger" inputType="text" className="" columnId="locale"
                                columnValue="{{ old('locale') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="isDefault" column="isDefault" model="language"
                                optional="text-danger" inputType="text" className="" columnId="isDefault"
                                columnValue="{{ old('isDefault') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="status" column="status" model="language"
                                optional="text-danger" inputType="text" className="" columnId="status"
                                columnValue="{{ old('status') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="visible" column="visible" model="language"
                                optional="text-danger" inputType="text" className="" columnId="visible"
                                columnValue="{{ old('visible') }}" attribute="required" readonly="false" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Picture</h3>
                    </div>
                    <div class="card-body text-center">

                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="flag_path" />
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">{{trans('translation.general_general_save')}}</button>
            </div>
        </div>
    </form>
    @push('scripts')
    @endpush
</x-default-layout>
