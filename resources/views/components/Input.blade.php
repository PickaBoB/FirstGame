<div class="mb-3 {{ $class ?? '' }}">
    <label for="label_{{ $name }}" class="form-label">{{$label}}</label>
    <input type="{{ $type ?? 'text' }}"
           class="form-control @error($name) is-invalid @enderror"
           name="{{$name}}"
           id="label_{{ $name }}"
           value="{{ old($name, null) ?? ($value ?? '') }}"
           {{ isset($required) ? 'required' : '' }}
           {{ isset($min) ? 'min="' . $min . '"' : '' }}
           {{ isset($max) ? 'max="' . $max . '"' : '' }}
           {{ isset($step) ? 'step="' . $step . '"' : '' }}
           placeholder="{{ $placeholder ?? '' }}"
           aria-describedby="validation_{{$name}}">
    @error($name)
        <div id="validation_{{$name}}" class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
