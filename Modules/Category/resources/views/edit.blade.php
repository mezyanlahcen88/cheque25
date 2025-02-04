<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.category_action_add'),
            'listPermission' => 'category-list',
            'listRoute' => route('category.index'),
            'listText' => trans('translation.category_form_categories_list'),
        ])
    @endsection
    <form action="{{ route('category.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.category_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-225rem">

                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture($object->picture,'categories')))" avatar-name="picture" model="category"/>
                            </div>

                            <x-input-field cols="col-md-6" divId="name" column="name" model="category"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="category_id" column="category_id" model="category"
                                label="category_form_category_id" optional="text-primary" id="category_id" :options="categories()" :object=$object />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Category\App\Http\Requests\UpdateCategoryRequest'); !!}
    @endpush
</x-default-layout>
