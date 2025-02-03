<x-default-layout>
    @section('breadcrumb')
        @include('components.breadcrumb-list', [
            'title' => trans('translation.state_action_add'),
            'listPermission' => 'state-list',
            'listRoute' => route('state.index'),
            'listText' => trans('translation.state_form_states_list'),
        ])
    @endsection
    <form action="{{ route('state.update', $object->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @include('components.dispaly_errors')
                        <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('translation.state_action_edit')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <x-input-field cols="col-md-6" divId="name" column="name" model="state"
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
    {!! JsValidator::formRequest('Modules\State\App\Http\Requests\UpdateStateRequest'); !!}
    @endpush
</x-default-layout>
