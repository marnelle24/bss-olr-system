<div class="w-full">
    <label class="capitalize mb-2.5 block font-medium text-black">
        {{ $label }} {!! $required ? '<span class="text-danger font-bold text-lg">*</span>' : '' !!}
    </label>
    @foreach($options as $key => $optionValue)
        <div class="flex items-center gap-2 mb-1">
            <input 
                class="appearance-none focus:outline-none focus:ring-0" 
                type="{{ $type }}" 
                wire:model.live="value" 
                value="{{ $key }}"
                {{ $required ? 'required' : '' }}
            />
            <label class="capitalize block font-medium text-black">
                {{ $optionValue }}
            </label>
        </div>
    @endforeach

    {{-- @dump($value) --}}
</div>