<div class="col-md-3 pe-5">
    <div class="d-flex flex-column  gap-lg-10 w-100 mb-7">

        <div class="card card-flush py-1">
            <div class="card-body pt-0">
                <x-single-select cols="col-md-12" div-id="category_id" column="category_id" model="product"
                    label="product_form_category_id" optional="text-danger" id="category_id" :options="categories()"
                    :object=false />
            </div>
        </div>
        <div class="card card-flush py-1">
            <div class="card-body pt-0">
                <x-single-select cols="col-md-8" div-id="brand_id" column="brand_id" model="product"
                    label="product_form_brand_id" optional="text-danger" id="brand_id" :options="brands()"
                    :object=false />
            </div>
        </div>
        <div class="card card-flush py-1">
            <div class="card-body pt-0">
                <x-single-select cols="col-md-8" div-id="warehouse_id" column="warehouse_id" model="product"
                    label="product_form_warehouse_id" optional="text-danger" id="warehouse_id" :options="warehouses()"
                    :object=false />
            </div>
        </div>
    </div>
</div>