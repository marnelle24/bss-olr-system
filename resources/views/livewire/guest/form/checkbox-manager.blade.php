<div>
    <x-forms.checkbox-field
        type="checkbox"
        :label="$label"
        :options="$options"
        :inputKey="$inputKey"
        :required="$required"
        :selectedOptions="$selectedOptions"
    />

    @dump($selectedOptions)
</div>