<div class="tab-pane fade show" id="email_settings" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>Email Settings</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('setting.update', 'update-system-settings') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <x-input-field cols="col-md-6" divId="protocol" column="protocol"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="protocol" columnValue="{{ getSettings()['protocol'] }}"
                            attribute="" readonly="false" />
                        <x-input-field cols="col-md-6" divId="encryption" column="encryption" model="setting"
                            optional="text-primary" inputType="text" className="" columnId="encryption"
                            columnValue="{{ getSettings()['encryption'] }}" attribute=""
                            readonly="false" />
                        <x-input-field cols="col-md-6" divId="host" column="host" model="setting"
                            optional="text-primary" inputType="text" className="" columnId="host"
                            columnValue="{{ getSettings()['host'] }}" attribute=""
                            readonly="false" />
                        <x-input-field cols="col-md-6" divId="port" column="port"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="port" columnValue="{{ getSettings()['port'] }}"
                             attribute="" readonly="false" />
                        <x-input-field cols="col-md-6" divId="username" column="username"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="username" columnValue="{{ getSettings()['username'] }}"
                            attribute="" readonly="false" />

                            <x-input-field cols="col-md-6" divId="password" column="password"
                            model="setting" optional="text-primary" inputType="password" className=""
                            columnId="password" columnValue="{{ getSettings()['password'] }}"
                            attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="sender_default_name" column="sender_default_name"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="sender_default_name" columnValue="{{ getSettings()['sender_default_name'] }}"
                            attribute="" readonly="false" />
                            <x-input-field cols="col-md-6" divId="sender_default_email" column="sender_default_email"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="sender_default_email" columnValue="{{ getSettings()['sender_default_email'] }}"
                            attribute="" readonly="false" />

                        <x-save-button />
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>