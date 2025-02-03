<div class="card-header d-flex align-items-center row d-none" id="filterDiv">
    
        
        <x-single-select cols="col-md-4" div-id="bank_id" column="bank_id" label="carnet_form_bank_id"
        optional="text-primary" id="bank_id" :options="banks()" :object=false />
        <x-single-select cols="col-md-4" div-id="compte_id" column="compte_id" label="carnet_form_compte_id"
        optional="text-primary" id="compte_id" :options="comptes()" :object=false />
        <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="carnet_form_isactive"
        optional="text-primary" id="isactive" :options="status()" :object=false />

</div>
