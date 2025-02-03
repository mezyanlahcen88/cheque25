<div class="card-header d-flex justify-content-center align-items-center row d-none" id="filterDiv">
    <x-input-field cols="col-md-4" divId="first_name" column="first_name" model="user"
    optional="text-danger" inputType="text" className="" columnId="first_name"
    columnValue="{{ old('first_name') }}" attribute="required" readonly="false" />
    <x-single-select cols="col-md-4" div-id="roles_name" column="roles_name" label="user_form_roles_name"
    optional="text-danger" id="roles_name" :options="roles()" :object=false />
    <x-single-select cols="col-md-4" div-id="isactive" column="isactive" label="user_form_isactive"
    optional="text-danger" id="isactive" :options="status()" :object=false />
</div>
