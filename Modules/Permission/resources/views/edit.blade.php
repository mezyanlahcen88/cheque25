<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.permission_action_add'),
            'listPermission' => 'permission-list',
            'listRoute' => route('permission.index'),
            'listText' => trans('translation.permission_form_permissions_list'),
        ])
    @endsection
    <form action="{{ route('permission.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.permission_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <x-input-field cols="col-md-6" divId="name" column="name" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="libele" column="libele" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="libele"
                                columnValue="{{ $object->libele }}" attribute="required" readonly="false" />
                                <x-input-field cols="col-md-6" divId="guard_name" column="guard_name" model="permission"
                                optional="text-danger" inputType="text" className="" columnId="guard_name"
                                columnValue="web" attribute="required" readonly="readonly" />
                            <x-single-select cols="col-md-6" div-id="groupe_id" column="groupe_id" model="permission"
                                label="permission_form_groupe_id" optional="text-primary" id="groupe_id" :options="permisionGroupes()" :object=$object />
                        </div>
                    </div>
                </div>
            </div>
<x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Permission\App\Http\Requests\UpdatePermissionRequest'); !!}
    @endpush
</x-default-layout>
