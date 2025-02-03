<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.bank_action_add'),
            'listPermission' => 'bank-list',
            'listRoute' => route('bank.index'),
            'listText' => trans('translation.bank_form_banks_list'),
        ])
    @endsection

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.bank_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bank.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                             <div class="row">
                                <div class="col-md-12 text-center d-flex justify-content-around mb-5">

                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="logo" />
                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" />
                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="effet" />
                                </div>

                            <x-input-field cols="col-md-6" divId="name" column="name" model="bank"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="tel" column="tel" model="bank"
                                optional="text-danger" inputType="text" className="" columnId="tel"
                                columnValue="{{ old('tel') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-12" divId="address" column="address" model="bank"
                                optional="text-danger" inputType="text" className="" columnId="address"
                                columnValue="{{ old('address') }}" attribute="required" readonly="false" />
                                 <x-save-button />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    @push('scripts')
    {!! JsValidator::formRequest('Modules\Bank\App\Http\Requests\StoreBankRequest'); !!}
    @endpush
</x-default-layout>
