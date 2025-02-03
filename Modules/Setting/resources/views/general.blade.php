<div class="tab-pane fade active show" id="General" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>General</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('setting.update', 'update-system-settings') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-225rem text-center d-flex justify-content-around">
                            <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture(getSettings()['logo'], 'settings')))" avatar-name="logo"
                                model="setting" />
                                <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture(getSettings()['auth_picture'], 'settings')))" avatar-name="auth_picture" model="setting" />
                                <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture(getSettings()['favicon'], 'settings')))" avatar-name="favicon" model="setting" />
                        </div>
                        <x-input-field cols="col-md-6" divId="system_name" column="system_name"
                            model="setting" optional="text-danger" inputType="text" className=""
                            columnId="system_name" columnValue="{{ getSettings()['system_name'] }}"
                            attribute="" readonly="false" />
                        <x-input-field cols="col-md-6" divId="title" column="title" model="setting"
                            optional="text-danger" inputType="text" className="" columnId="title"
                            columnValue="{{ getSettings()['title'] }}" attribute="required"
                            readonly="false" />

                        <x-input-field cols="col-md-6" divId="phone" column="phone" model="setting"
                            optional="text-danger" inputType="text" className="" columnId="phone"
                            columnValue="{{ getSettings()['phone'] }}" attribute="required"
                            readonly="false" />
                        <x-input-field cols="col-md-6" divId="email" column="email" model="setting"
                            optional="text-danger" inputType="text" className="" columnId="email"
                            columnValue="{{ getSettings()['email'] }}" attribute="required"
                            readonly="false" />

                          <x-input-field cols="col-md-12" divId="address" column="address" model="setting"
                            optional="text-danger" inputType="text" className="" columnId="address"
                            columnValue="{{ getSettings()['address'] }}" attribute="required"
                            readonly="false" />

                            <x-ckeditor-field cols="col-md-12" divID="copyrigth" column="copyrigth" model="setting"
                            optional="text-primary"  columnId="copyrigth"
                            columnValue="{!! getSettings()['copyrigth'] !!}"
                            readonly="false" />

                            <x-ckeditor-field cols="col-md-12" divID="auth_description" column="auth_description" model="setting"
                            optional="text-primary"  columnId="auth_description"
                            columnValue="{!! getSettings()['auth_description'] !!}"
                            readonly="false" />
                        <x-save-button />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
