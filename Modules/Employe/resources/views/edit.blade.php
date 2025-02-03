<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.employe_action_add'),
            'listPermission' => 'employe-list',
            'listRoute' => route('employe.index'),
            'listText' => trans('translation.employe_form_employes_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.employe_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                           <form action="{{ route('employe.update', $object->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="first_name" column="first_name" model="employe"
                                optional="text-danger" inputType="text" className="" columnId="first_name"
                                columnValue="{{ $object->first_name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="last_name" column="last_name" model="employe"
                                optional="text-danger" inputType="text" className="" columnId="last_name"
                                columnValue="{{ $object->last_name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="doe" column="doe" model="employe"
                                optional="text-danger" inputType="date" className="" columnId="doe"
                                columnValue="{{ $object->doe }}" attribute="required" readonly="false" />
                            <x-update-button />
                        </div>
                    </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Employe\App\Http\Requests\UpdateEmployeRequest'); !!}
    @endpush
</x-default-layout>
