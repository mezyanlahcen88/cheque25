<div class="d-flex flex-center flex-column py-5">
    <div class="symbol symbol-100px symbol-circle mb-7 avatarDiv">
        <form action="#" method="post" id="user_picture_form" enctype="multipart/form-data">
            <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture($object->picture, 'users')))" avatar-name="picture"
                route-name="{{ route('user.deletePicture', $object->uuid) }}" model="user"/>
            <div class="col-md-12 mt-3 d-flex justify-content-center alig-items-center">
                <button type="submit" class="btn btn-primary btn-sm d-none changePictureBtn" id="user_picture_btn"
                    data-route-name="{{ route('user.updatePicture', $object->uuid) }}">
                    {{ trans('translation.general_general_update') }}
                </button>
            </div>
        </form>
    </div>
    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $object->first_name }}</a>
    <div class="mb-9">
        <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($object->occupation) }} ==>
            {{ ucwords($object->getRoleNames()[0]) }}
            {{-- ROLE --}}
        </div>
    </div>
</div>
