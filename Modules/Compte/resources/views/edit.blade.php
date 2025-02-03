<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.compte_action_add'),
            'listPermission' => 'compte-list',
            'listRoute' => route('compte.index'),
            'listText' => trans('translation.compte_form_comptes_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.compte_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                           <form action="{{ route('compte.update', $object->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="type_compte" column="type_compte" model="compte"
                                optional="text-danger" inputType="text" className="" columnId="type_compte"
                                columnValue="{{ $object->type_compte }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="bank_id" column="bank_id" model="compte"
                                label="compte_form_bank_id" optional="text-danger" id="bank_id" :options="banks()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="society_id" column="society_id" model="compte"
                                label="compte_form_society_id" optional="text-primary" id="society_id" :options="societies()" :object=$object />
                            <x-input-field cols="col-md-6" divId="agence" column="agence" model="compte"
                                optional="text-danger" inputType="text" className="" columnId="agence"
                                columnValue="{{ $object->agence }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="city" column="city" model="compte"
                                optional="text-danger" inputType="text" className="" columnId="city"
                                columnValue="{{ $object->city }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="rip" column="rip" model="compte"
                                optional="text-danger" inputType="text" className="" columnId="rip"
                                columnValue="{{ $object->rip }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="start_solde" column="start_solde" model="compte"
                                optional="text-danger" inputType="text" className="" columnId="start_solde"
                                columnValue="{{ $object->start_solde }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="start_date" column="start_date" model="compte"
                                optional="text-danger" inputType="datetime-local" className="" columnId="start_date"
                                columnValue="{{ $object->start_date }}" attribute="required" readonly="false" />
                            <x-ckeditor-field
                                cols="col-md-12"
                                column="comment"
                                model="compte"
                                optional="text-primary"
                                columnValue="{{ $object->comment }}"
                                divID="comment"
                            />
                            <x-update-button />
                        </div>
                    </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Compte\App\Http\Requests\UpdateCompteRequest'); !!}
    @endpush
</x-default-layout>
