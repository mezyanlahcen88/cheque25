<div class="card-header d-flex align-items-center row d-none" id="filterDiv">
    
        
        <x-single-select cols="col-md-4" div-id="city_id" column="city_id" label="secteur_form_city_id"
        optional="text-primary" id="city_id" :options="cities()" :object=false />
        <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="secteur_form_isactive"
        optional="text-primary" id="isactive" :options="status()" :object=false />

</div>
