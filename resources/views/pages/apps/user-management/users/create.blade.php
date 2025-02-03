<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list',[
            'title' => 'Users',
            'listPermission' => 'user-list',
            'listRoute' => route('admin.users.index'),
            'listText' => trans('translation.user_form_users_list'),
        ])
    @endsection
    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">Personnel information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <x-single-select cols="col-md-6" div-id="gender" column="gender" model="user"
                                label="user_form_gender" optional="text-danger" id="gender" :options="genders()" :object=false />
                            <x-input-field cols="col-md-6" divId="first_name" column="first_name" model="user"
                                optional="text-danger" inputType="text" className="" columnId="first_name"
                                columnValue="{{ old('first_name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="last_name" column="last_name" model="user"
                                optional="text-danger" inputType="text" className="" columnId="last_name"
                                columnValue="{{ old('last_name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="username" column="username" model="user"
                                optional="text-danger" inputType="text" className="" columnId="username"
                                columnValue="{{ old('username') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="email" column="email" model="user"
                                optional="text-danger" inputType="text" className="" columnId="email"
                                columnValue="{{ old('email') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="phone" column="phone" model="user"
                                optional="text-danger" inputType="text" className="" columnId="phone"
                                columnValue="{{ old('phone') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="occupation" column="occupation" model="user"
                                optional="text-danger" inputType="text" className="" columnId="occupation"
                                columnValue="{{ old('occupation') }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="roles_name" column="roles_name" label="user_form_roles_name"
                                optional="text-danger" id="roles_name" :options="roles()" :object=false />
                            <x-single-select cols="col-md-6" div-id="language_id" column="language_id" label="user_form_language_id"
                                optional="text-danger" id="language_id" :options="dynamicLang()" :object=false />

                            <x-single-select cols="col-md-6" div-id="country_id" column="country_id" label="user_form_country_id"
                                optional="text-danger" id="country_id" :options="countries()" :object=false />

                            <x-input-field cols="col-md-6" divId="state" column="state" model="user"
                                optional="text-danger" inputType="text" className="" columnId="state"
                                columnValue="{{ old('state') }}" attribute="required" readonly="false" />

                            <x-input-field cols="col-md-6" divId="city" column="city" model="user"
                                optional="text-danger" inputType="text" className="" columnId="city"
                                columnValue="{{ old('city') }}" attribute="required" readonly="false" />

                            <x-input-field cols="col-md-6" divId="address" column="address" model="user"
                                optional="text-danger" inputType="text" className="" columnId="address"
                                columnValue="{{ old('address') }}" attribute="required" readonly="false" />

                            <x-input-field cols="col-md-6" divId="code_postale" column="code_postale" model="user"
                                optional="text-danger" inputType="text" className="" columnId="code_postale"
                                columnValue="{{ old('code_postale') }}" attribute="required" readonly="false" />

                            <x-input-field cols="col-md-6" divId="password" column="password" model="user"
                                optional="text-danger" inputType="text" className="" columnId="password"
                                columnValue="{{ old('password') }}" attribute="required" readonly="false" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">picture</h3>
                    </div>
                    <div class="card-body text-center">
                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" />
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary ">Save</button>
            </div>
        </div>
    </form>
</x-default-layout>
