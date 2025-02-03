<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => 'Users',
            'listPermission' => 'user-list',
            'listRoute' => route('user.index'),
            'listText' => trans('translation.user_form_users_list'),
        ])
    @endsection
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">Personnel information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('user::user.create.form_create')
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script src="{{ URL::asset('assets/custom_js/states_cities.js') }}"></script>
        {!! JsValidator::formRequest('Modules\User\App\Http\Requests\StoreUserRequest') !!}
    @endpush
</x-default-layout>
