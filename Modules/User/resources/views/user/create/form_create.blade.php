<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-md-12 text-center mb-225rem">
        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" model="user"/>
    </div>
    <x-single-select cols="col-md-4" div-id="gender" column="gender" model="user"
        label="user_form_gender" optional="text-danger" id="gender" :options="genders()"
        :object=false />
    <x-input-field cols="col-md-4" divId="first_name" column="first_name" model="user"
        optional="text-danger" inputType="text" className="" columnId="first_name"
        columnValue="{{ old('first_name') }}" attribute="" readonly="false" />
    <x-input-field cols="col-md-4" divId="last_name" column="last_name" model="user"
        optional="text-danger" inputType="text" className="" columnId="last_name"
        columnValue="{{ old('last_name') }}" attribute="" readonly="false" />

    <x-input-field cols="col-md-4" divId="email" column="email" model="user"
        optional="text-danger" inputType="text" className="" columnId="email"
        columnValue="{{ old('email') }}" attribute="" readonly="false" />


    <x-input-field cols="col-md-4" divId="phone" column="phone" model="user"
        optional="text-primary" inputType="number" className="" columnId="phone"
        columnValue="{{ old('phone') }}" attribute="" readonly="false" />
    <x-input-field cols="col-md-4" divId="occupation" column="occupation" model="user"
        optional="text-primary" inputType="text" className="" columnId="occupation"
        columnValue="{{ old('occupation') }}" attribute="" readonly="false" />
    <x-single-select cols="col-md-6" div-id="language_id" column="language_id"
        label="user_form_language_id" optional="text-primary" id="language_id" :options="dynamicLang()"
        :object=false />
        <x-single-select cols="col-md-6" div-id="roles_name" column="roles_name"
            label="user_form_roles_name" optional="text-danger" id="roles_name"
            :options="roles()" :object=false />


    <x-single-select cols="col-md-4" div-id="state_id" column="state_id"
        label="user_form_state_id" optional="text-primary" id="state_id" :options="states()"
        :object=false />

    <x-single-select cols="col-md-4" div-id="city_id" column="city_id" label="user_form_city_id"
        optional="text-primary" id="city_id" :options="cities()" :object=false />

    <x-input-field cols="col-md-4" divId="code_postale" column="code_postale" model="user"
        optional="text-primary" inputType="text" className="" columnId="code_postale"
        columnValue="{{ old('code_postale') }}" attribute="" readonly="false" />
    <x-input-field cols="col-md-12"
        divId="address" column="address" model="user" optional="text-primary"
        inputType="text" className="" columnId="address"
        columnValue="{{ old('address') }}" attribute="" readonly="false" />
    <x-input-field cols="col-md-6" divId="password" column="password" model="user"
        optional="text-danger" inputType="password" className="" columnId="password"
        columnValue="{{ old('password') }}" attribute="" readonly="false" />
    <x-input-field cols="col-md-6" divId="password_confirmation"
        column="password_confirmation" model="user" optional="text-danger"
        inputType="password" className="" columnId="password_confirmation"
        columnValue="{{ old('password_confirmation') }}" attribute=""
        readonly="false" />
    <x-save-button />
</div>
</form>
