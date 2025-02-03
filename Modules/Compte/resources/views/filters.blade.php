<div class="card-header d-flex align-items-center row d-none" id="filterDiv">
    
        
        <x-single-select cols="col-md-4" div-id="bank_id" column="bank_id" label="compte_form_bank_id"
        optional="text-primary" id="bank_id" :options="banks()" :object=false />
        <x-single-select cols="col-md-4" div-id="society_id" column="society_id" label="compte_form_society_id"
        optional="text-primary" id="society_id" :options="societies()" :object=false />
        <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="compte_form_isactive"
        optional="text-primary" id="isactive" :options="status()" :object=false />

</div>
