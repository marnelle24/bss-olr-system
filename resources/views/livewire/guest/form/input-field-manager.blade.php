<div>
    <x-forms.input-field
        :inputKey="$inputKey"
        :label="$label"
        :type="$type"
        :required="$required"
        :value="$value"
    />

    @dump($value)
</div>