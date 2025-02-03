<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.secteur_action_add'),
            'listPermission' => 'secteur-list',
            'listRoute' => route('secteur.index'),
            'listText' => trans('translation.secteur_form_secteurs_list'),
        ])
    @endsection
    <form action="{{ route('secteur.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.secteur_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="secteur"
                                optional="text-danger" inputType="text" className="" columnId="name"
                                columnValue="{{ $object->name }}" attribute="required" readonly="false" />
                            <x-single-select cols="col-md-6" div-id="city_id" column="city_id" model="secteur"
                                label="secteur_form_city_id" optional="text-danger" id="city_id" :options="cities()" :object=$object />
                        </div>
                    </div>
                </div>
            </div>
            <x-update-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Secteur\App\Http\Requests\UpdateSecteurRequest'); !!}
    @endpush
</x-default-layout>
