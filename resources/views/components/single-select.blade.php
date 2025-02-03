<div class="{{ $cols }} my-1 form-group" id="{{ $divID ?? '' }}">

        <label for="{{ $column }}" class="form-label"> {{ trans('translation.' . $label) }} &nbsp;
            <span class="{{ $optional }}">*</span></label>
        <select class="form-select @error($column) is-invalid  @enderror form-select2" data-control="select2"
             name="{{ $column }}" data-placeholder="{{ trans('translation.general_general_select') }}"
            id="{{ $id ?? '' }}">
            <option value="">{{ trans('translation.general_general_select') }}</option>
            @foreach ($options as $key => $value)
                @if ($object)
                    <option value="{{ $key }}" {{ $key == $object->$column ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @else
                    <option value="{{ $key }}" {{ $key == old($column) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endif
            @endforeach
        </select>
        @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <span class="invalid-feedback" role="alert" id="{{ $column }}_error">
            <strong></strong>
        </span>
  
</div>
