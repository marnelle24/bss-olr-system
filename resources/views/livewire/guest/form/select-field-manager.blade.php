<div class="w-full">
    <label class="capitalize mb-2.5 block font-medium text-black">
        {{ $label }} {!! $required ? '<span class="text-danger font-bold text-lg">*</span>' : '' !!}
    </label>
    <select 
        wire:model.live="value"
        class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none"
        {{ $required ? 'required' : '' }}
    >
        <option value="">Select {{ $label }}</option>
        @foreach($options as $optionKey => $optionValue)
            <option value="{{ $optionKey }}">{{ $optionValue }}</option>
        @endforeach
    </select>
    {{-- @dump($value) --}}
</div>