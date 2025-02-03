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
                        <h3 class="card-title">{{trans('translation.employe_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('employe.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="first_name" column="first_name" model="employe"
                                optional="text-danger" inputType="text" className="" columnId="first_name"
                                columnValue="{{ old('first_name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="last_name" column="last_name" model="employe"
                                optional="text-danger" inputType="text" className="" columnId="last_name"
                                columnValue="{{ old('last_name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="doe" column="doe" model="employe"
                                optional="text-danger" inputType="date" className="" columnId="doe"
                                columnValue="{{ old('doe') }}" attribute="required" readonly="false" />
                            <x-save-button />
                        </div>
                        </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Employe\App\Http\Requests\StoreEmployeRequest'); !!}
    @endpush
</x-default-layout>
