<div>
    <x-forms.textarea-field
        :inputKey="$inputKey"
        :label="$label"
        :rows="$rows"
        :placeholder="$placeholder"
        :required="$required"
        :value="$value"
    />

    @dump($value)
</div>
