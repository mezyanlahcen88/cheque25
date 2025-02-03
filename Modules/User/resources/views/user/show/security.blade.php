<div class="row">
    <div class="col-md-12">
        <div class="card pt-4 mb-6 mb-xl-9">
            <div class="card-header">
                <div class="card-title">
                    <h2>Edit your password</h2>
                </div>
            </div>
            <div class="card-body pt-2 pb-5">
                <form action="#" method="post" id="user_security_form">
                    <div class="row">
                        <x-input-field cols="col-md-12" divId="old_password" column="old_password" model="user"
                            optional="text-danger" inputType="password" className="" columnId="old_password"
                            columnValue="{{ old('old_password') }}" attribute="" readonly="false" />

                        <x-input-field cols="col-md-6" divId="new_password" column="new_password" model="user"
                            optional="text-danger" inputType="password" className="" columnId="new_password"
                            columnValue="{{ old('new_password') }}" attribute="" readonly="false" />

                        <x-input-field cols="col-md-6" divId="new_password_confirmation"
                            column="new_password_confirmation" model="user" optional="text-danger" inputType="password"
                            className="" columnId="new_password_confirmation"
                            columnValue="{{ old('new_password_confirmation') }}" attribute=""
                            readonly="false" />

                        <div class="col-md-12 mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary " id="user_security_btn"
                                data-route-name="{{ route('user.updatePassword',$object->uuid) }}">
                                <i class="fa fa-save"></i>
                                {{ trans('translation.general_general_update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
