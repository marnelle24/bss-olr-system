<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class AdditionalFieldsForm extends Component
{
    public $extraFields;






    //  Apply only when there are extraFields JSON in the $eventDetails - Convert custom input fields to HTML
    public function inputField($inputKey, $textFieldDetails)
    {
        $placeholder = isset($textFieldDetails['placeholder']) && $textFieldDetails['placeholder'] ? $textFieldDetails['placeholder'] : $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';
        $type = $textFieldDetails['type'];

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            $output .= '<input type="'.$type.'" wire:model.blur="extraFieldsValues.'.$inputKey.'" placeholder="'.$placeholder.'" class="w-full rounded-none border border-dark bg-white p-2focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' />';
        $output .= '</div>';

        return $output;
    }

    //  Apply only when there are extraFields JSON in the $eventDetails - Convert custom radio fields to HTML
    public function radioField($inputKey, $textFieldDetails)
    {
        $placeholder = isset($textFieldDetails['placeholder']) && $textFieldDetails['placeholder'] ? $textFieldDetails['placeholder'] : $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';
        $type = $textFieldDetails['type'];

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            foreach($textFieldDetails['options'] as $key => $optionValue)
            {
                $output .= '<div class="flex items-center gap-2 mb-1">';
                    $output .= '<input class="appearance-none focus:outline-none focus:ring-0" type="'.$type.'" wire:model.blur="extraFieldsValues.'.$inputKey.'" value="'.$key.'" '.$required.' />';
                    $output .= '<label class="capitalize block font-medium text-black">'.$optionValue.'</label>';
                $output .= '</div>';
            }
        $output .= '</div>';

        return $output;
    }

    //  Apply only when there are extraFields JSON in the $eventDetails - Convert custom checkbox fields to HTML
    public function checkboxField($inputKey, $textFieldDetails)
    {
        $placeholder = isset($textFieldDetails['placeholder']) && $textFieldDetails['placeholder'] ? $textFieldDetails['placeholder'] : $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';
        $type = $textFieldDetails['type'];

        $idx = 0;

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            
            foreach($textFieldDetails['options'] as $key => $optionValue)
            {
                $output .= '<div class="flex items-center gap-2 mb-1">';
                    $output .= '<input class="appearance-none focus:outline-none focus:ring-0" type="'.$type.'" wire:model.blur="extraFieldsValues.'.$inputKey.$idx.'" value="'.$key.'" id="'.$inputKey.'-'.$idx.'" '.$required.' />';
                    $output .= '<label class="capitalize block font-medium text-black">'.$optionValue.'</label>';
                $output .= '</div>';
                $idx++;
            }
        $output .= '</div>';

        return $output;
    }

    //  Apply only when there are extraFields JSON in the $eventDetails - Convert custom textarea fields to HTML
    public function textareaField($key, $textFieldDetails)
    {
        $placeholder = isset($textFieldDetails['placeholder']) && $textFieldDetails['placeholder'] ? $textFieldDetails['placeholder'] : $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';
        $type = $textFieldDetails['type'];

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            $output .= '<textarea rows="4" wire:model.blur="extraFieldsValues.'.$key.'" placeholder="'.$placeholder.'" class="w-full rounded-none border border-dark bg-white p-2focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' ></textarea>';
        $output .= '</div>';

        return $output;
    }   

    //  Apply only when there are extraFields JSON in the $eventDetails - Convert custom select fields to HTML
    public function selectOptionField($key, $textFieldDetails)
    {
        // Create dynamic wire:model binding using the extraFieldsValues array
        $placeholder = $textFieldDetails['placeholder'] ?? $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? 'required' : '';

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            $output .= '<select wire:model="extraFieldsValues.'.$key.'" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' >';
                $output .= '<option value="">Select '.$textFieldDetails['label'].'</option>';
                foreach($textFieldDetails['options'] as $optionKey => $optionValue) 
                {
                    $output .= '<option value="'.$optionKey.'">'.$optionValue.'</option>';
                }
            $output .= '</select>';
        $output .= '</div>';

        return $output;
    }

    
    public function render()
    {
        return view('livewire.guest.additional-fields-form');
    }
}
