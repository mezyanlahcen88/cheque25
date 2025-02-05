<div class="card-header d-flex align-items-center row d-none" id="filterDiv">
    
        
        <x-single-select cols="col-md-4" div-id="category_id" column="category_id" label="product_form_category_id"
        optional="text-primary" id="category_id" :options="categories()" :object=false />
        <x-single-select cols="col-md-4" div-id="brand_id" column="brand_id" label="product_form_brand_id"
        optional="text-primary" id="brand_id" :options="brands()" :object=false />
        <x-single-select cols="col-md-4" div-id="warehouse_id" column="warehouse_id" label="product_form_warehouse_id"
        optional="text-primary" id="warehouse_id" :options="warehouses()" :object=false />
        <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="product_form_isactive"
        optional="text-primary" id="isactive" :options="status()" :object=false />

</div>
