<!--begin::Card-->
<div class="card card-bordered mb-6 mb-xl-9">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!--begin::Card title-->
        <div class="card-title d-flex justify-content-between align-items-center">
            <h2>Edit Personal Informations</h2>
        </div>

    </div>
    <!--begin::Card body-->
    <div class="card-body p-9 pt-4">
        <form action="{{}}" method="post" id="user_overview_form">
            <div class="row">
                <x-single-select cols="col-md-4" div-id="gender" column="gender" model="user" label="user_form_gender"
                    optional="text-danger" id="gender" :options="genders()" :object=$object />
                <x-input-field cols="col-md-4" divId="first_name" column="first_name" model="user"
                    optional="text-danger" inputType="text" className="" columnId="first_name"
                    columnValue="{{ $object->first_name }}" attribute="" readonly="false" />
                <x-input-field cols="col-md-4" divId="last_name" column="last_name" model="user"
                    optional="text-danger" inputType="text" className="" columnId="last_name"
                    columnValue="{{ $object->last_name }}" attribute="" readonly="false" />
                <x-input-field cols="{{ !Auth::user()->isSuperAdmin ? 'col-md-6' : 'col-md-4' }}" divId="phone"
                    column="phone" model="user" optional="text-primary" inputType="text" className=""
                    columnId="phone" columnValue="{{ $object->phone }}" attribute="" readonly="false" />
                <x-input-field cols="{{ !Auth::user()->isSuperAdmin ? 'col-md-6' : 'col-md-4' }}" divId="email"
                    column="email" model="user" optional="text-danger" inputType="text" className=""
                    columnId="email" columnValue="{{ $object->email }}" attribute="" readonly="false" />
                @if (Auth::user()->isSuperAdmin)
                    <x-single-select cols="col-md-4" div-id="roles_name" column="roles_name"
                        label="user_form_roles_name" optional="text-danger" id="roles_name" :options="roles()"
                        :object=$object />
                @endif

                <x-input-field cols="col-md-6" divId="occupation" column="occupation" model="user"
                    optional="text-primary" inputType="text" className="" columnId="occupation"
                    columnValue="{{ $object->occupation }}" attribute="" readonly="false" />
                <x-single-select cols="col-md-6" div-id="language_id" column="language_id" label="user_form_language_id"
                    optional="text-primary" id="language_id" :options="dynamicLang()" :object=$object />
                <x-single-select cols="col-md-4" div-id="state_id" column="state_id" label="user_form_state_id"
                    optional="text-primary" id="state_id" :options="states()" :object=$object />
                <x-single-select cols="col-md-4" div-id="city_id" column="city_id" label="user_form_city_id"
                    optional="text-primary" id="city_id" :options="cities()" :object=$object />
                <x-input-field cols="col-md-4" divId="code_postale" column="code_postale" model="user"
                    optional="text-primary" inputType="text" className="" columnId="code_postale"
                    columnValue="{{ $object->code_postale }}" attribute="" readonly="false" />
                <x-input-field cols="col-md-12" divId="address" column="address" model="user"
                    optional="text-primary" inputType="text" className="" columnId="address"
                    columnValue="{{ $object->address }}" attribute="" readonly="false" />
                <div class="col-md-12 mt-4  d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary " id="user_overview_btn"
                        data-route-name="{{ route('user.updateOverview', $object->uuid) }}">
                        <i class="fa fa-save"></i> {{ trans('translation.general_general_update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
