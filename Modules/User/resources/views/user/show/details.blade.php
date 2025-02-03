<div class="d-flex flex-stack fs-4 py-3">
    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
        <span class="ms-2 rotate-180">
            <i class="ki-duotone ki-down fs-3"></i>
        </span>
    </div>
</div>
<!--end::Details toggle-->
<div class="separator"></div>
<!--begin::Details content-->
<div id="kt_user_view_details" class="collapse show">
    <div class="pb-5 fs-6">
        <!--begin::Details item-->
        <div class="fw-bold mt-5">{{ trans('translation.user_form_gender') }}</div>
        <div class="text-gray-600">{{ $object->gender }}</div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bold mt-5">Name</div>
        <div class="text-gray-600">
            <a href="#"
                class="text-gray-600 text-hover-primary">{{ $object->getFullName() }}</a>
        </div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bold mt-5">{{ trans('translation.user_form_email') }}</div>
        <div class="text-gray-600">
            <a href="#" class="text-gray-600 text-hover-primary">{{ $object->email }}</a>
        </div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bold mt-5">{{ trans('translation.user_form_phone') }}</div>
        <div class="text-gray-600">
            <a href="#" class="text-gray-600 text-hover-primary">{{ $object->phone }}</a>
        </div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bold mt-5">{{ trans('translation.user_form_address') }}</div>
        <div class="text-gray-600">{{ $object->address }},
            <br />{{ $object->country_id }}
            <br />{{ $object->code_postale }}
        </div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bold mt-5">Language</div>
        <div class="text-gray-600">English</div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bold mt-5">Last Login</div>
        <div class="text-gray-600">05 May 2023, 9:23 pm</div>
        <!--begin::Details item-->
    </div>
</div>
