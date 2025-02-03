<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.carnet_action_add'),
            'listPermission' => 'carnet-list',
            'listRoute' => route('carnet.index'),
            'listText' => trans('translation.carnet_form_carnets_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.carnet_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('carnet.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                            <x-single-select cols="col-md-6" div-id="bank_id" column="bank_id" model="carnet"
                                label="carnet_form_bank_id" optional="text-danger" id="bank_id" :options="banks()" :object=false />
                            <x-single-select cols="col-md-6" div-id="compte_id" column="compte_id" model="carnet"
                                label="carnet_form_compte_id" optional="text-danger" id="compte_id" :options="comptes()" :object=false />
                            <x-input-field cols="col-md-6" divId="nbr_cheque" column="nbr_cheque" model="carnet"
                                optional="text-danger" inputType="number" className="" columnId="nbr_cheque"
                                columnValue="{{ old('nbr_cheque') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="society" column="society" model="carnet"
                                optional="text-danger" inputType="text" className="" columnId="society"
                                columnValue="{{ old('society') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="series" column="series" model="carnet"
                                optional="text-danger" inputType="text" className="" columnId="series"
                                columnValue="{{ old('series') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="nbr_first_cheque" column="nbr_first_cheque" model="carnet"
                                optional="text-danger" inputType="text" className="" columnId="nbr_first_cheque"
                                columnValue="{{ old('nbr_first_cheque') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="nbr_last_cheque" column="nbr_last_cheque" model="carnet"
                                optional="text-danger" inputType="text" className="" columnId="nbr_last_cheque"
                                columnValue="{{ old('nbr_last_cheque') }}" attribute="required" readonly="false" />
                            <x-save-button />
                        </div>
                        </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Carnet\App\Http\Requests\StoreCarnetRequest'); !!}
    @endpush
</x-default-layout>
