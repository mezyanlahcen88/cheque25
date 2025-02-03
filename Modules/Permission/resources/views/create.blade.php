<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.permission_action_add'),
            'listPermission' => 'permission-list',
            'listRoute' => route('permission.index'),
            'listText' => trans('translation.permission_form_permissions_list'),
        ])
    @endsection
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('translation.permission_action_add') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <x-input-field cols="col-md-6" divId="name" column="name" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="libele" column="libele" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="libele"
                                columnValue="{{ old('libele') }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="guard_name" column="guard_name" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="guard_name"
                                columnValue="web" attribute="" readonly="readonly" />
                            <x-single-select cols="col-md-6" div-id="groupe_id" column="groupe_id" model="permission"
                                label="permission_form_groupe_id" optional="text-primary" id="groupe_id"
                                :options="permisionGroupes()" :object=false />

                            <x-save-button />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('translation.permission_action_generate') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('permission.generate') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <x-input-field cols="col-md-6" divId="model" column="model" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="model"
                                columnValue="{{ old('model') }}" attribute="" readonly="false" />

                            <x-save-button />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {!! JsValidator::formRequest('Modules\Permission\App\Http\Requests\StorePermissionRequest') !!}
    @endpush
</x-default-layout>
