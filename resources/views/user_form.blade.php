<div class="card">
    <div class="card-header">
        <h3 class="card-title">User Form</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <x-input-field cols="col-md-6" divId="first_name" column="first_name" model="user"
                optional="text-danger" inputType="text" className="" columnId="first_name"
                columnValue="{{ old('first_name') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="last_name" column="last_name" model="user"
                optional="text-danger" inputType="text" className="" columnId="last_name"
                columnValue="{{ old('last_name') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="username" column="username" model="user"
                optional="text-danger" inputType="text" className="" columnId="username"
                columnValue="{{ old('username') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="occupation" column="occupation" model="user"
                optional="text-danger" inputType="text" className="" columnId="occupation"
                columnValue="{{ old('occupation') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="email" column="email" model="user"
                optional="text-danger" inputType="text" className="" columnId="email"
                columnValue="{{ old('email') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="email_verified_at" column="email_verified_at" model="user"
                optional="text-danger" inputType="text" className="" columnId="email_verified_at"
                columnValue="{{ old('email_verified_at') }}" attribute="required" readonly="false" />
            <x-single-select cols="col-md-6" div-id="language_id" column="language_id" model="user"
                label="user_form_language_id" optional="text-danger" id="language_id" :options="languages()" :object=false />
            <x-input-field cols="col-md-6" divId="password" column="password" model="user"
                optional="text-danger" inputType="text" className="" columnId="password"
                columnValue="{{ old('password') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="isactive" column="isactive" model="user"
                optional="text-danger" inputType="text" className="" columnId="isactive"
                columnValue="{{ old('isactive') }}" attribute="required" readonly="false" />
            <x-single-select cols="col-md-6" div-id="country_id" column="country_id" model="user"
                label="user_form_country_id" optional="text-danger" id="country_id" :options="countries()" :object=false />
            <x-input-field cols="col-md-6" divId="state" column="state" model="user"
                optional="text-danger" inputType="text" className="" columnId="state"
                columnValue="{{ old('state') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="city" column="city" model="user"
                optional="text-danger" inputType="text" className="" columnId="city"
                columnValue="{{ old('city') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="phone" column="phone" model="user"
                optional="text-danger" inputType="text" className="" columnId="phone"
                columnValue="{{ old('phone') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="picture" column="picture" model="user"
                optional="text-danger" inputType="text" className="" columnId="picture"
                columnValue="{{ old('picture') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="roles_name" column="roles_name" model="user"
                optional="text-danger" inputType="text" className="" columnId="roles_name"
                columnValue="{{ old('roles_name') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="address" column="address" model="user"
                optional="text-danger" inputType="text" className="" columnId="address"
                columnValue="{{ old('address') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="code_postale" column="code_postale" model="user"
                optional="text-danger" inputType="text" className="" columnId="code_postale"
                columnValue="{{ old('code_postale') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="gender" column="gender" model="user"
                optional="text-danger" inputType="text" className="" columnId="gender"
                columnValue="{{ old('gender') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="isSuperAdmin" column="isSuperAdmin" model="user"
                optional="text-danger" inputType="text" className="" columnId="isSuperAdmin"
                columnValue="{{ old('isSuperAdmin') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="last_login_at" column="last_login_at" model="user"
                optional="text-danger" inputType="text" className="" columnId="last_login_at"
                columnValue="{{ old('last_login_at') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="last_login_ip" column="last_login_ip" model="user"
                optional="text-danger" inputType="text" className="" columnId="last_login_ip"
                columnValue="{{ old('last_login_ip') }}" attribute="required" readonly="false" />
            <x-input-field cols="col-md-6" divId="remember_token" column="remember_token" model="user"
                optional="text-danger" inputType="text" className="" columnId="remember_token"
                columnValue="{{ old('remember_token') }}" attribute="required" readonly="false" />        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Picture</h3>
        </div>
        <div class="card-body text-center">
            <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" />
        </div>
    </div>
</div>