<div class="col-md-3 ps-5">
    <div class="d-flex flex-column  gap-lg-10 w-100 mb-7">
    <div class="card card-flush py-1">
        <div class="card-body pt-0">
            <x-single-select cols="col-md-12" div-id="product_type" column="product_type" model="product"
                label="product_form_product_type" optional="text-danger" id="product_type" :options="productTypes()"
                :object=false />
        </div>
    </div>
    <div class="card card-flush py-1">
        <div class="card-body pt-0">
            <x-single-select cols="col-md-12" div-id="service" column="service" model="product"
                label="product_form_service" optional="text-danger" id="service" :options="services()"
                :object=false />
        </div>
    </div>
    <div class="card card-flush py-1">
        <div class="card-body pt-0">
            <x-single-select cols="col-md-12" div-id="buy_unit" column="buy_unit" model="product"
                label="product_form_buy_unit" optional="text-danger" id="buy_unit" :options="buyUnits()"
                :object=false />
        </div>
    </div>
</div>