<div class="card-header d-flex align-items-center row d-none" id="filterDiv">
    
        
        <x-single-select cols="col-md-4" div-id="category_id" column="category_id" label="category_form_category_id"
        optional="text-primary" id="category_id" :options="categories()" :object=false />
        <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="category_form_isactive"
        optional="text-primary" id="isactive" :options="status()" :object=false />

</div>
