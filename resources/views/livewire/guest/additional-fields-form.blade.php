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
                {{-- @dump($field) --}}
                @switch($field['type'])
                    @case('select')
                        {!! $this->selectOptionField($field['key'], $field) !!}
                    @break
                    @case('radio')
                        {!! $this->radioField($field['key'], $field) !!}
                    @break
                    @case('checkbox')
                        {!! $this->checkboxField($field['key'], $field) !!}
                    @break
                    @case('textarea')
                        {!! $this->textareaField($field['key'], $field) !!}
                        @break
                    @default
                        {!! $this->inputField($field['key'], $field) !!}
                        @break
                @endswitch
            @endforeach
        </div>
    </div>
</div>
