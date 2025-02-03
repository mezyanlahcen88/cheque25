<div class="tab-pane fade show" id="Social" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>Social links</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('setting.update', 'update-system-settings') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <x-input-field cols="col-md-6" divId="facebook" column="facebook"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="facebook" columnValue="{{ getSettings()['facebook'] }}"
                            attribute="" readonly="false" />
                        <x-input-field cols="col-md-6" divId="twitter" column="twitter" model="setting"
                            optional="text-primary" inputType="text" className="" columnId="twitter"
                            columnValue="{{ getSettings()['twitter'] }}" attribute=""
                            readonly="false" />
                        <x-input-field cols="col-md-6" divId="youtube" column="youtube" model="setting"
                            optional="text-primary" inputType="text" className="" columnId="youtube"
                            columnValue="{{ getSettings()['youtube'] }}" attribute=""
                            readonly="false" />
                        <x-input-field cols="col-md-6" divId="instagram" column="instagram"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="instagram" columnValue="{{ getSettings()['instagram'] }}"
                            attribute="" readonly="false" />
                        <x-input-field cols="col-md-6" divId="linkedin" column="linkedin"
                            model="setting" optional="text-primary" inputType="text" className=""
                            columnId="linkedin" columnValue="{{ getSettings()['linkedin'] }}"
                            attribute="" readonly="false" />

                        <x-save-button />
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>