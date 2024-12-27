<div class="w-full">
    <label class="capitalize mb-2.5 block font-medium text-black">
        {{ $label }} {!! $required ? '<span class="text-danger font-bold text-lg">*</span>' : '' !!}
    </label>
    <input 
        type="{{ $type }}"
        wire:model.live="value"
        placeholder="{{ isset($placeholder) ? $placeholder : $label }}"
        maxlength="{{ $maxlength }}"
        class="{{ $class }}"
        {{ $required ? 'required' : '' }}
    />
    {{-- @dump($value) --}}
</div>