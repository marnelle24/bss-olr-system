<div>
    <div class="w-full">
        <label class="capitalize mb-2.5 block font-medium text-gray-900">
            {{ $label }} {!! $required ? '<span class="text-danger font-bold text-lg">*</span>' : '' !!}
        </label>
        @foreach ($options as $key => $option)
            <div class="flex items-center gap-2 mb-1">
                <input 
                    type="{{ isset($type) ? $type : 'checkbox' }}" 
                    wire:model.live="selectedOptions"
                    value="{{ $key }}" 
                    id="{{ $inputKey }}-{{ $loop->index }}"
                    {{ $required ? 'required' : '' }}
                    class="appearance-none focus:outline-none focus:ring-0"
                    {{ in_array($key, $selectedOptions) ? 'checked' : '' }}
                >
                <label 
                    for="{{ $inputKey }}-{{ $loop->index }}" 
                    class="capitalize block font-medium text-gray-900"
                >
                    {{ $option }}
                </label>
            </div>
        @endforeach
    </div>
    {{-- @dump($selectedOptions) --}}
</div>