<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.product_action_add'),
            'listPermission' => 'product-list',
            'listRoute' => route('product.index'),
            'listText' => trans('translation.product_form_products_list'),
        ])
    @endsection
    <form action="{{ route('product.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.product_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-225rem">
                                
                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture($object->picture,'products')))" avatar-name="picture" model="product"/>
                            </div>
                            
                            <x-input-field cols="col-md-6" divId="reference" column="reference" model="product"
                                optional="text-danger" inputType="text" className="" columnId="reference"
                                columnValue="{{ $object->reference }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="product_type" column="product_type" model="product"
                                optional="text-danger" inputType="text" className="" columnId="product_type"
                                columnValue="{{ $object->product_type }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="service" column="service" model="product"
                                optional="text-danger" inputType="text" className="" columnId="service"
                                columnValue="{{ $object->service }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="buy_unit" column="buy_unit" model="product"
                                optional="text-danger" inputType="text" className="" columnId="buy_unit"
                                columnValue="{{ $object->buy_unit }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="buy_price" column="buy_price" model="product"
                                optional="text-danger" inputType="number" className="" columnId="buy_price"
                                columnValue="{{ $object->buy_price }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="actions" column="actions" model="product"
                                optional="text-danger" inputType="text" className="" columnId="actions"
                                columnValue="{{ $object->actions }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="lot_number" column="lot_number" model="product"
                                optional="text-danger" inputType="text" className="" columnId="lot_number"
                                columnValue="{{ $object->lot_number }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="date_of_expiration" column="date_of_expiration" model="product"
                                optional="text-danger" inputType="datetime-local" className="" columnId="date_of_expiration"
                                columnValue="{{ $object->date_of_expiration }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="destockage_unit" column="destockage_unit" model="product"
                                optional="text-danger" inputType="text" className="" columnId="destockage_unit"
                                columnValue="{{ $object->destockage_unit }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="category_id" column="category_id" model="product"
                                label="product_form_category_id" optional="text-danger" id="category_id" :options="categories()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="brand_id" column="brand_id" model="product"
                                label="product_form_brand_id" optional="text-danger" id="brand_id" :options="brands()" :object=$object />
                            <x-single-select cols="col-md-6" div-id="warehouse_id" column="warehouse_id" model="product"
                                label="product_form_warehouse_id" optional="text-danger" id="warehouse_id" :options="warehouses()" :object=$object />
                            <x-input-checkbox-field
                                cols="col-md-6"
                                column="iscomposable"
                                model="product"
                                optional="text-danger"
                                columnValue="{{ $object->iscomposable }}"
                                divID="iscomposable"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Product\App\Http\Requests\UpdateProductRequest'); !!}
    @endpush
</x-default-layout>
