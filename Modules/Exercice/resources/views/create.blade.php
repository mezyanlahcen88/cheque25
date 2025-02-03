<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.exercice_action_add'),
            'listPermission' => 'exercice-list',
            'listRoute' => route('exercice.index'),
            'listText' => trans('translation.exercice_form_exercices_list'),
        ])
    @endsection
    <form action="{{ route('exercice.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.exercice_action_add')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="exercice" column="exercice" model="exercice"
                                optional="text-danger" inputType="text" className="" columnId="exercice"
                                columnValue="{{ old('exercice') }}" attribute="required" readonly="false" />
                            <x-input-field cols="col-md-6" divId="etat" column="etat" model="exercice"
                                optional="text-danger" inputType="text" className="" columnId="etat"
                                columnValue="{{ old('etat') }}" attribute="required" readonly="false" />
                            <x-ckeditor-field
                                cols="col-md-12"
                                column="comment"
                                model="exercice"
                                optional="text-primary"
                                columnValue="{{ old('comment') }}"
                                divID="comment"
                            />
                        </div>
                    </div>
                </div>
            </div>
  <x-save-button />
        </div>
    </form>
    @push('scripts')
    {!! JsValidator::formRequest('Modules\Exercice\App\Http\Requests\StoreExerciceRequest'); !!}
    @endpush
</x-default-layout>
