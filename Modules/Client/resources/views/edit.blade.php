<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.client_action_add'),
            'listPermission' => 'client-list',
            'listRoute' => route('client.index'),
            'listText' => trans('translation.client_form_clients_list'),
        ])
    @endsection
    <form action="{{ route('client.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.client_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">

                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" />
                            </div>

                            <x-input-field cols="col-md-6" divId="ref" column="ref" model="client"
                                optional="text-danger" inputType="text" className="" columnId="ref"
                                columnValue="{{ $object->ref }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="ice" column="ice" model="client"
                                optional="text-primary" inputType="text" className="" columnId="ice"
                                columnValue="{{ $object->ice }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="name" column="name" model="client"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                                <x-single-select cols="col-md-6" div-id="fonction" column="fonction" model="client"
                                label="client_form_fonction" optional="text-primary" id="fonction" :options="fonctions()" :object=$object />
                            <x-input-field cols="col-md-6" divId="phone" column="phone" model="client"
                                optional="text-primary" inputType="text" className="" columnId="phone"
                                columnValue="{{ $object->phone }}" attribute="unique:clients" readonly="false" />
                            <x-input-field cols="col-md-6" divId="fax" column="fax" model="client"
                                optional="text-primary" inputType="text" className="" columnId="fax"
                                columnValue="{{ $object->fax }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="email" column="email" model="client"
                                optional="text-primary" inputType="text" className="" columnId="email"
                                columnValue="{{ $object->email }}" attribute="unique:clients" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="state_id" column="state_id" model="client"
                                label="client_form_state_id" optional="text-primary" id="state_id" :options="states()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="city_id" column="city_id" model="client"
                                label="client_form_city_id" optional="text-primary" id="city_id" :options="cities()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="secteur_id" column="secteur_id" model="client"
                                label="client_form_secteur_id" optional="text-primary" id="secteur_id" :options="secteurs()" :object=$object />
                            <x-input-field cols="col-md-6" divId="cd_postale" column="cd_postale" model="client"
                                optional="text-primary" inputType="text" className="" columnId="cd_postale"
                                columnValue="{{ $object->cd_postale }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="address" column="address" model="client"
                                optional="text-primary" inputType="textarea" className="" columnId="address"
                                columnValue="{{ $object->address }}" attribute="" readonly="false" />

                                <x-ckeditor-field
                                cols="col-md-12"
                                column="comment"
                                model="client"
                                optional="text-primary"
                                columnValue="{{ $object->comment }}"
                                divID="comment"
                            />

                        </div>
                    </div>
                </div>
            </div>
<x-update-button />
        </div>
    </form>
    @push('scripts')
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>
    {!! JsValidator::formRequest('Modules\Client\App\Http\Requests\UpdateClientRequest'); !!}
    @endpush
</x-default-layout>
