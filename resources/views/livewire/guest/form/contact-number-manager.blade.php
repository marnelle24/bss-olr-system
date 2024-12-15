<div>
    @if( $this->isInternational ) 
        <div class="w-full">
            <label class="capitalize mb-2.5 block font-medium text-black">
                {{ $label }} {!! $required ? '<span class="text-danger font-bold text-lg">*</span>' : '' !!}
            </label>
            <div class="flex">
                <select wire:model.live="countryCode" class="w-1/3 rounded-l-none border-r-0 border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none">
                    <option value="+65" data-flag="🇸🇬" selected>🇸🇬 +65</option>
                    <option value="+1" data-flag="🇺🇸">🇺🇸 +1</option>
                    <option value="+44" data-flag="🇬🇧">🇬🇧 +44</option>
                    <option value="+91" data-flag="🇮🇳">🇮🇳 +91</option>
                    <option value="+86" data-flag="🇨🇳">🇨🇳 +86</option>
                    <option value="+81" data-flag="🇯🇵">🇯🇵 +81</option>
                </select>
                <input 
                    wire:model.live="contactNumber" 
                    type="{{ $type }}" 
                    placeholder="{{ $placeholder }}" 
                    class="{{ $class }}" 
                    {{ $required ? 'required' : '' }}
                />
            </div>
        </div>
    @else 
        <div class="w-full">
            <label class="capitalize mb-2.5 block font-medium text-black">
                {{ $label }} {!! $required ? '<span class="text-danger font-bold text-lg">*</span>' : '' !!}
            </label>
            <input 
                wire:model.live="contactNumber" 
                type="{{ $type }}" 
                maxlength="{{ $maxlength }}"
                placeholder="{{ $placeholder }}" 
                class="{{ $class }}" 
                {{ $required ? 'required' : '' }}
            />
        </div>
    @endif
    {{-- @dump($value) --}}
</div>
