<div class="app-container container-fluid my-2">
    <div id="kt_app_toolbar" class="card card-bordered py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    {{ $title }}</h1>

            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                @can($createPermission)
                    <a href="{{ $createRoute }}" class="btn btn-sm fw-bold btn-primary"><i class="fa fa-plus"></i> {{ $createText }}
                    </a>
                @endcan
                @if (request()->routeIs('language.translations'))

                <a href="#" class="btn btn-info btn-sm" id="addTranslationBtn">
                    <i class="fa fa-plus-circle"></i> {{ trans('translation.translation_action_add') }}
                </a>
                <a href="#" class="btn btn-warning btn-sm" id="synTranslationBtn">
                    <i class="fa fa-plus-circle"></i> {{ trans('translation.translation_action_syncronize') }}
                </a>
                @endif
                @can($deletedPermission)
                    <a href="{{ $deletedRoute }}" class="btn btn-sm fw-bold btn-danger"><i class="fa fa-trash"></i> {{ $deletedText }}</a>
                @endcan
            </div>
        </div>
    </div>
</div>
