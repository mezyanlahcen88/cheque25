<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.brand_action_add'),
            'listPermission' => 'brand-list',
            'listRoute' => route('brand.index'),
            'listText' => trans('translation.brand_form_brands_list'),
        ])
    @endsection
    <form action="{{ route('brand.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.brand_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-225rem">
                                
                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture($object->picture,'brands')))" avatar-name="picture" model="brand"/>
                            </div>
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="brand"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Brand\App\Http\Requests\UpdateBrandRequest'); !!}
    @endpush
</x-default-layout>
