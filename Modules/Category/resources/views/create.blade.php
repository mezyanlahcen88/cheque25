<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.category_action_add'),
            'listPermission' => 'category-list',
            'listRoute' => route('category.index'),
            'listText' => trans('translation.category_form_categories_list'),
        ])
    @endsection
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('components.dispaly_errors')

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.category_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-225rem">

                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url('/assets/media/avatars/300-1.jpg')" avatar-name="picture" model="category"/>
                            </div>

                            <x-input-field cols="col-md-6" divId="name" column="name" model="category"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="category_id" column="category_id" model="category"
                                label="category_form_category_id" optional="text-primary" id="category_id" :options="categories()" :object=false />
                        </div>
                    </div>
                </div>
            </div>
                <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Category\App\Http\Requests\StoreCategoryRequest'); !!}
    @endpush
</x-default-layout>
