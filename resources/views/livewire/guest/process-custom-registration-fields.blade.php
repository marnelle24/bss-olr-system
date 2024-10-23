<div class="pt-3">
    <p class="font-semibold border-b-2 border-slate-400/20 text-lg mt-4 mb-4">Additional Information</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($extraFields as $field)
            <div>
                @if($field['type'] === 'text')
                    {!! $this->inputField($field) !!}
                @elseif($field['type'] === 'select')
                    {!! $this->selectOptionField($field) !!}
                @endif
            </div>
        @endforeach
    </div>
</div>
