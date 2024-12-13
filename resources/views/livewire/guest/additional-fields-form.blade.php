<div>
    <div class="mb-4">
        <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-2">
            Additional Information
        </h1>
        <p class="text-slate-500 lg:text-left text-center">
            Please provide additional information.
        </p>
    </div>
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @foreach($extraFields as $field)
                @switch($field['type'])
                    @case('text')
                        <livewire:guest.form.input-field-manager
                            :inputKey="$field['key']" 
                            :label="$field['label']" 
                            :type="$field['type']" 
                            :placeholder="$field['placeholder']" 
                            :required="isset($field['required']) ? $field['required'] : false"
                        />
                    @break
                    @case('radio')
                        <livewire:guest.form.radio-field-manager
                            :inputKey="$field['key']" 
                            :label="$field['label']" 
                            :type="$field['type']" 
                            :options="$field['options']" 
                            :required="isset($field['required']) ? $field['required'] : false"
                        />
                    @break
                    @case('checkbox')

                        <livewire:guest.form.checkbox-manager
                            :inputKey="$field['key']" 
                            :label="$field['label']" 
                            :type="$field['type']" 
                            :options="$field['options']" 
                            :required="isset($field['required']) ? $field['required'] : false"
                        />
                    @break
                    @case('textarea')
                        <livewire:guest.form.text-area-field-manager
                            :inputKey="$field['key']" 
                            :label="$field['label']" 
                            :placeholder="$field['placeholder']" 
                            :required="isset($field['required']) ? $field['required'] : false"
                            :rows="isset($field['rows']) ? $field['rows'] : 3"
                        />
                    @break
                    @case('select')
                        <livewire:guest.form.select-field-manager
                            :inputKey="$field['key']" 
                            :label="$field['label']" 
                            :options="$field['options']" 
                            :required="isset($field['required']) ? $field['required'] : false"
                        />
                    @break
                @endswitch
            @endforeach
        </div>
        
        <div class="flex justify-end">
            <button type="button" wire:click="checkAdditionalFieldsForm" class="bg-teal-600 hover:bg-teal-700 duration-300 hover:-translate-y-0.5 text-white py-2.5 px-3.5 rounded-none flex gap-1 items-center justify-center">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</div>
