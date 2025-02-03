<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.language_action_add'),
            'listPermission' => 'language-list',
            'listRoute' => route('language.index'),
            'listText' => trans('translation.language_form_languages_list'),
        ])
    @endsection
    <form action="{{ route('language.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">Title</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <x-input-field cols="col-md-6" divID="name" column="name" model="language"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="locale" column="locale" model="language"
                                optional="text-danger" inputType="text" className="" columnId="locale"
                                columnValue="{{ $object->locale }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="isDefault" column="isDefault" model="language"
                                optional="text-danger" inputType="text" className="" columnId="isDefault"
                                columnValue="{{ $object->isDefault }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="status" column="status" model="language"
                                optional="text-danger" inputType="text" className="" columnId="status"
                                columnValue="{{ $object->status }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="visible" column="visible" model="language"
                                optional="text-danger" inputType="text" className="" columnId="visible"
                                columnValue="{{ $object->visible }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="flag_path" column="flag_path" model="language"
                                optional="text-danger" inputType="text" className="" columnId="flag_path"
                                columnValue="{{ $object->flag_path }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="created_at" column="created_at" model="language"
                                optional="text-danger" inputType="text" className="" columnId="created_at"
                                columnValue="{{ $object->created_at }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divID="updated_at" column="updated_at" model="language"
                                optional="text-danger" inputType="text" className="" columnId="updated_at"
                                columnValue="{{ $object->updated_at }}" attribute="required" readonly="false" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">{{trans('translation.general_general_update')}}</button>
            </div>
        </div>
    </form>
    @push('scripts')
    @endpush
</x-default-layout>
