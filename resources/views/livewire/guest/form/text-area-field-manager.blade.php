<div class="w-full">
    <label class="capitalize mb-2.5 block font-medium text-black">
        {{ $label }}
    </label>
    <textarea 
        rows="{{ $rows }}"
        wire:model.live="value"
        placeholder="{{ $placeholder }}"
        class="w-full rounded-none border border-dark bg-white p-2 focus:border-default focus:ring-0 focus-visible:shadow-none"
        {{ $required ? 'required' : '' }}
    ></textarea>
    {{-- @dump($value) --}}
</div>