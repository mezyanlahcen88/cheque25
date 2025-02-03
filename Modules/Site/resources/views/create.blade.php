<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.site_action_add'),
            'listPermission' => 'site-list',
            'listRoute' => route('site.index'),
            'listText' => trans('translation.site_form_sites_list'),
        ])
    @endsection
    <form action="{{ route('site.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.site_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="site"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="longitude" column="longitude" model="site"
                                optional="text-danger" inputType="text" className="" columnId="longitude"
                                columnValue="{{ old('longitude') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="latitude" column="latitude" model="site"
                                optional="text-danger" inputType="text" className="" columnId="latitude"
                                columnValue="{{ old('latitude') }}" attribute="required" readonly="false" />
                        </div>
                    </div>
                </div>
            </div>
  <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Site\App\Http\Requests\StoreSiteRequest'); !!}
    @endpush
</x-default-layout>
