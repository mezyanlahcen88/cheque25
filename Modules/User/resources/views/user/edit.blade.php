<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => 'Users',
            'listPermission' => 'user-list',
            'listRoute' => route('user.index'),
            'listText' => trans('translation.user_form_users_list'),
        ])
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        @include('user::user.edit.user_info')
                        @include('user::user.edit.details')
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @include('user::user.edit.overview')
                @include('user::user.edit.security')
            </div>
        </div>
    </div>
    @push('scripts')
         <script src="{{ URL::asset('assets/js/modules/user_module.js') }}"></script>
         <script src="{{ URL::asset('assets/custom_js/states_cities.js') }}"></script>
        {{-- {!! JsValidator::formRequest('Modules\User\App\Http\Requests\UpdateUserRequest'); !!} --}}
    @endpush
</x-default-layout>
