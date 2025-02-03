<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.secteur_action_add'),
            'listPermission' => 'secteur-list',
            'listRoute' => route('secteur.index'),
            'listText' => trans('translation.secteur_form_secteurs_list'),
        ])
    @endsection
    <form action="{{ route('secteur.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('components.dispaly_errors')

                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.secteur_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="secteur"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ old('name') }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="city_id" column="city_id" model="secteur"
                                label="secteur_form_city_id" optional="text-danger" id="city_id" :options="cities()" :object=false />
                        </div>
                    </div>
                </div>
            </div>
                <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Secteur\App\Http\Requests\StoreSecteurRequest'); !!}
    @endpush
</x-default-layout>
