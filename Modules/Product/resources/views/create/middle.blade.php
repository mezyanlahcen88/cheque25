<div class="col-md-6">
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-1">

            <div class="card-body text-center pt-5">
                <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" model="product" />
                <div class="text-muted fs-7 mt-5">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg
                    image
                    files are accepted</div>
            </div>
        </div>
                
                    <div class="card card-flush py-4">           
                        <div class="card-body pt-0 row">
                            
                            <x-input-field cols="col-md-6" divId="reference" column="reference" model="product"
                                optional="text-danger" inputType="text" className="" columnId="reference"
                                columnValue="{{ old('reference') }}" attribute="required" readonly="false" />
                                <x-input-field cols="col-md-6" divId="name" column="name" model="product"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="buy_price" column="buy_price" model="product"
                                optional="text-danger" inputType="number" className="" columnId="buy_price"
                                columnValue="{{ old('buy_price') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="actions" column="actions" model="product"
                                optional="text-danger" inputType="text" className="" columnId="actions"
                                columnValue="{{ old('actions') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="lot_number" column="lot_number"
                                model="product" optional="text-danger" inputType="text" className=""
                                columnId="lot_number" columnValue="{{ old('lot_number') }}"
                                attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="date_of_expiration"
                                column="date_of_expiration" model="product" optional="text-danger"
                                inputType="datetime-local" className="" columnId="date_of_expiration"
                                columnValue="{{ old('date_of_expiration') }}" attribute="required"
                                readonly="false" />
                            <x-input-field cols="col-md-6" divId="destockage_unit" column="destockage_unit"
                                model="product" optional="text-danger" inputType="text" className=""
                                columnId="destockage_unit" columnValue="{{ old('destockage_unit') }}"
                                attribute="required" readonly="false" />
                            <x-input-radio-field cols="col-md-6" column="iscomposable" model="product"
                                optional="text-primary" trueText="Yes" falseText="No"
                                columnValue="{{ old('iscomposable') }}" divID="iscomposable" />
                                <x-ckeditor-field
                                cols="col-md-12"
                                column="description"
                                model="product"
                                optional="text-danger"
                                columnValue="{{ old('description') }}"
                                divID="description"
                            />
                        </div>
                    </div>
        
    </div>
</div>