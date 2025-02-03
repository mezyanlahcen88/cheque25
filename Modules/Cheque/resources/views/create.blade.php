<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.cheque_action_add'),
            'listPermission' => 'cheque-list',
            'listRoute' => route('cheque.index'),
            'listText' => trans('translation.cheque_form_cheques_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.cheque_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('cheque.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            
                            <x-single-select cols="col-md-6" div-id="bank_id" column="bank_id" model="cheque"
                                label="cheque_form_bank_id" optional="text-danger" id="bank_id" :options="banks()" :object=false />
                            <x-single-select cols="col-md-6" div-id="compte_id" column="compte_id" model="cheque"
                                label="cheque_form_compte_id" optional="text-danger" id="compte_id" :options="comptes()" :object=false />
                            <x-single-select cols="col-md-6" div-id="carnet_id" column="carnet_id" model="cheque"
                                label="cheque_form_carnet_id" optional="text-danger" id="carnet_id" :options="carnets()" :object=false />
                            <x-input-field cols="col-md-6" divId="series" column="series" model="cheque"
                                optional="text-danger" inputType="text" className="" columnId="series"
                                columnValue="{{ old('series') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="number" column="number" model="cheque"
                                optional="text-danger" inputType="text" className="" columnId="number"
                                columnValue="{{ old('number') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="amount" column="amount" model="cheque"
                                optional="text-danger" inputType="text" className="" columnId="amount"
                                columnValue="{{ old('amount') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="doi" column="doi" model="cheque"
                                optional="text-danger" inputType="datetime-local" className="" columnId="doi"
                                columnValue="{{ old('doi') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="poi" column="poi" model="cheque"
                                optional="text-danger" inputType="text" className="" columnId="poi"
                                columnValue="{{ old('poi') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="beneficiary" column="beneficiary" model="cheque"
                                optional="text-danger" inputType="text" className="" columnId="beneficiary"
                                columnValue="{{ old('beneficiary') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="status" column="status" model="cheque"
                                optional="text-danger" inputType="text" className="" columnId="status"
                                columnValue="{{ old('status') }}" attribute="required" readonly="false" />
                            <x-save-button />
                        </div>
                        </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Cheque\App\Http\Requests\StoreChequeRequest'); !!}
    @endpush
</x-default-layout>
