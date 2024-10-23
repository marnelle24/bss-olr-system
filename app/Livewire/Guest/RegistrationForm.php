<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class RegistrationForm extends Component
{
    // form settings including the custom settings of each field
    public $formSettings;

    //  Convert custom input fields to HTML
    public function inputField($textFieldDetails)
    {
        $fieldName = preg_replace('/[^a-zA-Z0-9]/', '', $textFieldDetails['label']);
        $placeholder = isset($textFieldDetails['placeholder']) && $textFieldDetails['placeholder'] ? $textFieldDetails['placeholder'] : $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';
        $type = $textFieldDetails['type'] ?? 'text';

        $output = '';
        $output .='<div class="w-full mb-4">';
        $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
        $output .= '<input type="'.$type.'" name="'.$fieldName.'" placeholder="'.$placeholder.'" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' />';
        $output .= '</div>';

        return $output;
    }

    //  Convert custom select fields to HTML
    public function selectOptionField($textFieldDetails)
    {
        $fieldName = preg_replace('/[^a-zA-Z0-9]/', '', $textFieldDetails['label']);
        $placeholder = $textFieldDetails['placeholder'] ?? $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';

        $output = '';
        $output .='<div class="w-full mb-4">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            $output .= '<select name="'.$fieldName.'" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' >';
                $output .= '<option value="">Select '.$textFieldDetails['label'].'</option>';
                foreach($textFieldDetails['option'] as $optionKey => $optionValue) {
                    $output .= '<option value="'.$optionKey.'">'.$optionValue.'</option>';
                }
            $output .= '</select>';
        $output .= '</div>';

        return $output;
    }

    public function render()
    {
        return view('livewire.guest.registration-form');
    }
}
