
{{-- <div class="d-flex">
    <span for={{ $avatarName }} class="form-label d-block my-2 image-label">{{ trans('translation.'.$model.'_form_'.$avatarName) }} &nbsp;<span class="text-primary">*</span></span> --}}


<div class="image-input image-input-outline d-inline-block " data-kt-image-input="true" style="background-image: url('{{ $backgroundUrl }}')" id="imageDIv">
{{-- <span > {{ $model.'_form_title'.$avatarName }}</span> --}}
    <!--begin::Image preview wrapper-->
    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $imageUrl }}')"></div>
    <!--end::Image preview wrapper-->

    <!--begin::Edit button-->
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body changePicture"
        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change {{ $avatarName }}">
        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

        <!--begin::Inputs-->
        <input type="file" name="{{ $avatarName }}" accept=".png, .jpg, .jpeg" id="imageProfile" />
        {{-- <input type="hidden" name="avatar_remove" /> --}}
        {{-- <input type="hidden" name="picture" value=""/> --}}
        <!--end::Inputs-->

    </label>
    <!--end::Edit button-->

    <!--begin::Cancel button-->
    @if (isset($routeName))
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow removePicture"
        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar" data-route-name="{{ $routeName }}">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
    @endif
    <!--end::Cancel button-->
    <span for={{ $avatarName }} class="form-label d-block my-2 image-label">{{ trans('translation.'.$model.'_form_'.$avatarName) }} &nbsp;<span class="text-primary">*</span></span>
    <!--begin::Remove button-->
    @if (isset($routeName))
        <span
            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow removePicture"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove {{ $avatarName }}"
            data-route-name="{{ $routeName }}">
            <i class="ki-outline ki-cross fs-3"></i>
        </span>
    @else
        <span
            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow removePicture"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove {{ $avatarName }}">
            <i class="ki-outline ki-cross fs-3"></i>
        </span>
    @endif

    <!--end::Remove button-->
</div>
{{--  --}}
{{-- </div> --}}
