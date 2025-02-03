<div class="card-header d-flex align-items-center row d-none" id="filterDiv">
    
        
        <x-single-select cols="col-md-4" div-id="site_id" column="site_id" label="society_form_site_id"
        optional="text-primary" id="site_id" :options="sites()" :object=false />
        <x-single-select cols="col-md-4" div-id="state_id" column="state_id" label="society_form_state_id"
        optional="text-primary" id="state_id" :options="states()" :object=false />
        <x-single-select cols="col-md-4" div-id="city_id" column="city_id" label="society_form_city_id"
        optional="text-primary" id="city_id" :options="cities()" :object=false />
        <x-single-select cols="col-md-4" div-id="secteur_id" column="secteur_id" label="society_form_secteur_id"
        optional="text-primary" id="secteur_id" :options="secteurs()" :object=false />
        <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="society_form_isactive"
        optional="text-primary" id="isactive" :options="status()" :object=false />

</div>
