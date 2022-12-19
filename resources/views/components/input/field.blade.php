@props([
    'name',
    'label',
])

<div x-id="['field']">
    <label :for="$id('field')">{{ $label }}</label>
    <div>
        {{ $slot }}
        @error($name)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
