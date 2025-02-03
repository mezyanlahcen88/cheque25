<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.supplier_action_add'),
            'listPermission' => 'supplier-list',
            'listRoute' => route('supplier.index'),
            'listText' => trans('translation.supplier_form_suppliers_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.supplier_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                             <div class="row">
                                <div class="col-md-12 text-center mb-5">

                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" />
                                </div>

                            <x-input-field cols="col-md-6" divId="ice" column="ice" model="supplier"
                                optional="text-danger" inputType="text" className="" columnId="ice"
                                columnValue="{{ old('ice') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="name" column="name" model="supplier"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="fonction" column="fonction" model="supplier"
                                optional="text-primary" inputType="number" className="" columnId="fonction"
                                columnValue="{{ old('fonction') }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="phone" column="phone" model="supplier"
                                optional="text-primary" inputType="text" className="" columnId="phone"
                                columnValue="{{ old('phone') }}" attribute="unique:suppliers" readonly="false" />
                            <x-input-field cols="col-md-6" divId="fax" column="fax" model="supplier"
                                optional="text-primary" inputType="text" className="" columnId="fax"
                                columnValue="{{ old('fax') }}" attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="email" column="email" model="supplier"
                                optional="text-primary" inputType="text" className="" columnId="email"
                                columnValue="{{ old('email') }}" attribute="unique:suppliers" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="state_id" column="state_id" model="supplier"
                                label="supplier_form_state_id" optional="text-primary" id="state_id" :options="states()" :object=false />
                            <x-single-select cols="col-md-6" div-id="city_id" column="city_id" model="supplier"
                                label="supplier_form_city_id" optional="text-primary" id="city_id" :options="cities()" :object=false />
                            <x-single-select cols="col-md-6" div-id="secteur_id" column="secteur_id" model="supplier"
                                label="supplier_form_secteur_id" optional="text-primary" id="secteur_id" :options="secteurs()" :object=false />
                            <x-input-field cols="col-md-6" divId="cd_postale" column="cd_postale" model="supplier"
                                optional="text-primary" inputType="text" className="" columnId="cd_postale"
                                columnValue="{{ old('cd_postale') }}" attribute="" readonly="false" />
                            <x-ckeditor-field
                                cols="col-md-12"
                                column="address"
                                model="supplier"
                                optional="text-primary"
                                columnValue="{{ old('address') }}"
                                divID="address"
                            />
                            <x-ckeditor-field
                                cols="col-md-12"
                                column="comment"
                                model="supplier"
                                optional="text-primary"
                                columnValue="{{ old('comment') }}"
                                divID="comment"
                            />
                                 <x-save-button />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Supplier\App\Http\Requests\StoreSupplierRequest'); !!}
    @endpush
</x-default-layout>
