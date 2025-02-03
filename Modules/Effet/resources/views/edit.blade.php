<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.effet_action_add'),
            'listPermission' => 'effet-list',
            'listRoute' => route('effet.index'),
            'listText' => trans('translation.effet_form_effets_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.effet_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                           <form action="{{ route('effet.update', $object->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            
                            <x-single-select cols="col-md-6" div-id="bank_id" column="bank_id" model="effet"
                                label="effet_form_bank_id" optional="text-danger" id="bank_id" :options="banks()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="compte_id" column="compte_id" model="effet"
                                label="effet_form_compte_id" optional="text-danger" id="compte_id" :options="comptes()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="carnet_id" column="carnet_id" model="effet"
                                label="effet_form_carnet_id" optional="text-danger" id="carnet_id" :options="carnets()" :object=$object />
                            <x-input-field cols="col-md-6" divId="series" column="series" model="effet"
                                optional="text-danger" inputType="text" className="" columnId="series"
                                columnValue="{{ $object->series }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="number" column="number" model="effet"
                                optional="text-danger" inputType="text" className="" columnId="number"
                                columnValue="{{ $object->number }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="amount" column="amount" model="effet"
                                optional="text-danger" inputType="text" className="" columnId="amount"
                                columnValue="{{ $object->amount }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="doi" column="doi" model="effet"
                                optional="text-danger" inputType="datetime-local" className="" columnId="doi"
                                columnValue="{{ $object->doi }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="poi" column="poi" model="effet"
                                optional="text-danger" inputType="text" className="" columnId="poi"
                                columnValue="{{ $object->poi }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="beneficiary" column="beneficiary" model="effet"
                                optional="text-danger" inputType="text" className="" columnId="beneficiary"
                                columnValue="{{ $object->beneficiary }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="status" column="status" model="effet"
                                optional="text-danger" inputType="text" className="" columnId="status"
                                columnValue="{{ $object->status }}" attribute="required" readonly="false" />
                            <x-update-button />
                        </div>
                    </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Effet\App\Http\Requests\UpdateEffetRequest'); !!}
    @endpush
</x-default-layout>
