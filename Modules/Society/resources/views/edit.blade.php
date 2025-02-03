<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.society_action_add'),
            'listPermission' => 'society-list',
            'listRoute' => route('society.index'),
            'listText' => trans('translation.society_form_societies_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.society_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                           <form action="{{ route('society.update', $object->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">

                            <x-single-select cols="col-md-6" div-id="site_id" column="site_id" model="society"
                                label="society_form_site_id" optional="text-danger" id="site_id" :options="sites()" :object=$object />
                            <x-input-field cols="col-md-6" divId="ice" column="ice" model="society"
                                optional="text-primary" inputType="text" className="" columnId="ice"
                                columnValue="{{ $object->ice }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="name" column="name" model="society"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="phone" column="phone" model="society"
                                optional="text-primary" inputType="text" className="" columnId="phone"
                                columnValue="{{ $object->phone }}" attribute="unique:societies" readonly="false" />
                            <x-input-field cols="col-md-6" divId="fax" column="fax" model="society"
                                optional="text-primary" inputType="text" className="" columnId="fax"
                                columnValue="{{ $object->fax }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="email" column="email" model="society"
                                optional="text-primary" inputType="text" className="" columnId="email"
                                columnValue="{{ $object->email }}" attribute="unique:societies" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="state_id" column="state_id" model="society"
                                label="society_form_state_id" optional="text-primary" id="state_id" :options="states()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="city_id" column="city_id" model="society"
                                label="society_form_city_id" optional="text-primary" id="city_id" :options="cities()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="secteur_id" column="secteur_id" model="society"
                                label="society_form_secteur_id" optional="text-primary" id="secteur_id" :options="secteurs()" :object=$object />
                            <x-input-field cols="col-md-6" divId="cd_postale" column="cd_postale" model="society"
                                optional="text-primary" inputType="text" className="" columnId="cd_postale"
                                columnValue="{{ $object->cd_postale }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="address" column="address" model="society"
                                optional="text-primary" inputType="text" className="" columnId="address"
                                columnValue="{{ $object->address }}" attribute="" readonly="false" />
                            <x-ckeditor-field
                                cols="col-md-12"
                                column="comment"
                                model="society"
                                optional="text-primary"
                                columnValue="{{ $object->comment }}"
                                divID="comment"
                            />
                        </div>
                    </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Society\App\Http\Requests\UpdateSocietyRequest'); !!}
    @endpush
</x-default-layout>
