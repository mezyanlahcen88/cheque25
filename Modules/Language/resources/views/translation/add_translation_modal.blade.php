<div class="modal fade" tabindex="-1" id="addTranslationModal">
    <form action="#" method="post" enctype="multipart/form-data" id="translationFormStore">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{ trans('translation.translation_action_add') }}</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                    <x-single-select cols="col-md-12 my-2" div-id="groupe" column="groupe"
                                        model="translation" label="translation_form_groupe" optional="text-danger"
                                        id="groupe" :options="groupes()" :object=false />
                                        <x-single-select cols="col-md-12 my-2" div-id="type" column="type"
                                        model="translation" label="translation_form_type" optional="text-danger"
                                        id="type" :options="translationTypes()" :object=false />

                                <x-input-field cols="col-md-12 my-2" divID="label" column="label" model="translation"
                                    optional="text-danger" inputType="text" className="" columnId="label"
                                    columnValue="{{ old('label') }}" attribute=""  readonly="false" />
                                    <x-input-field cols="col-md-12 my-2" divID="translation" column="translation" model="translation"
                                    optional="text-danger" inputType="text" className="" columnId="translation"
                                    columnValue="{{ old('translation') }}" attribute=""  readonly="false" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary saveTranslationBtn">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
