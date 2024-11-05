<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Livewire\Forms\RegForm;
use Illuminate\Support\Facades\Auth;

class RegistrationForm extends Component
{
    public RegForm $form;
    public $eventDetails; // props

    // form settings including the custom settings of each field
    public $formSettings;
    public $isInternational = false;
    public $requiredFields = [];
    public $hiddenFields = [];
    public $extraFieldsValues = [];

    public $promoCode = null;
    public $discount = 0;

    public function mount()
    {
        $this->formSettings = $this->eventDetails['settings'];
        $this->isInternational = isset($this->formSettings['internationalEvents']) && $this->formSettings['internationalEvents'] ? true : false;
        $this->requiredFields = [ 
            'nric',
            'title',
            'firstName',
            'lastName',
            'email',
            'contactNumber',
            'address',
            'city',
            'postalCode'
        ];
        $this->hiddenFields = [];

        // populate the starter registration fields when there is Auth detected
        // Otherwise, set the default fields to null
        if(Auth::check())
        {
            $this->form->firstName = auth()->user()->firstname;
            $this->form->lastName = auth()->user()->lastname;
        }

    }


    public function submit()
    {
        // Set the required fields in the RegForm object for validation
        $this->form->setRequiredFields($this->requiredFields);
        
        // set the hidden fields based on user define settings
        $this->form->setHiddenFields($this->hiddenFields);

        // convert the extrafields into JSON String ready to save in DB
        $this->form->customFieldJsonValues = $this->convertExtraFieldsToJSON($this->extraFieldsValues);

        // get the promo code inpuuted if any
        $this->form->appliedPromoCode = $this->promoCode;

        // get the equivalent amount value of the promo code
        $this->form->discountValue = $this->discount;

        // get the net amount - final amount for checkout
        $this->form->netAmount = $this->eventDetails['price'] - $this->discount;

        // store the registration and data in the DB and procced to payment portal (hitpay)
        $this->form->store( $this->eventDetails);
    }

    public function validatePromoCode()
    {
        $testdata = array(
            'pr1' => 100,
            'pr2' => 200,
            'pr3' => 10,
            'pr4' => 50,
        );

        foreach ($testdata as $key => $value) 
        {
            if($this->promoCode === $key)
                $this->discount = $value;
        }
    }

    public function convertExtraFieldsToJSON($extraFields)
    {
        // Convert the extra fields to JSON
        return json_encode($extraFields);
    }

    //  Apply only when there are extraInfo JSON in the $formSettings - Convert custom input fields to HTML
    public function inputField($key, $textFieldDetails)
    {
        $fieldName = preg_replace('/[^a-zA-Z0-9]/', '', $textFieldDetails['label']);
        $placeholder = isset($textFieldDetails['placeholder']) && $textFieldDetails['placeholder'] ? $textFieldDetails['placeholder'] : $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? '' : '';
        $type = $textFieldDetails['type'] ?? 'text';

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            $output .= '<input type="'.$type.'" wire:model.blur="extraFieldsValues.'.$key.'" placeholder="'.$placeholder.'" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' />';
        $output .= '</div>';

        return $output;
    }

    //  Apply only when there are extraInfo JSON in the $formSettings - Convert custom select fields to HTML
    public function selectOptionField($key, $textFieldDetails)
    {
        $fieldName = preg_replace('/[^a-zA-Z0-9]/', '', $textFieldDetails['label']);
        $placeholder = $textFieldDetails['placeholder'] ?? $textFieldDetails['label'];
        $required = isset($textFieldDetails['required']) && $textFieldDetails['required'] ? '' : '';

        $output = '';
        $output .='<div class="w-full">';
            $output .= '<label class="capitalize mb-2.5 block font-medium text-black">'.$textFieldDetails['label'].'</label>';
            $output .= '<select wire:model.blur="extraFieldsValues.'.$fieldName.'" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" '.$required.' >';
                $output .= '<option value="">Select '.$textFieldDetails['label'].'</option>';
                foreach($textFieldDetails['option'] as $optionKey => $optionValue) 
                {
                    $output .= '<option value="'.$optionKey.'">'.$optionValue.'</option>';
                }
            $output .= '</select>';
        $output .= '</div>';

        return $output;
    }

    // Render the contact number input field - 
    // switch from Singapore normal contact number input field 
    // to international country code input field
    public function renderContactNumberField( $isInternational = false )
    {
        $output = '';

        if( $this->isInternational ) 
        {
            //  International country code input field
            $output .= '<div class="w-full">';
                $output .= '<label class="capitalize mb-2.5 block font-medium text-black">Contact Number</label>';
                $output .= '<div class="flex gap-1">';
                    $output .= '<select wire:model.blur="form.countryCode" class="w-1/4 rounded-l-none border-r-0 border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none">';
                        $output .= '<option value="+65" data-flag="🇸🇬" selected>🇸🇬 +65</option>';
                        $output .= '<option value="+1" data-flag="🇺🇸">🇺🇸 +1</option>';
                        $output .= '<option value="+44" data-flag="🇬🇧">🇬🇧 +44</option>';
                        $output .= '<option value="+91" data-flag="🇮🇳">🇮🇳 +91</option>';
                        $output .= '<option value="+86" data-flag="🇨🇳">🇨🇳 +86</option>';
                        $output .= '<option value="+81" data-flag="🇯🇵">🇯🇵 +81</option>';
                    // Add more country codes as needed
                    $output .= '</select>';
                    $output .= '<input wire:model.blur="form.contactNumber" type="tel" name="contactNumber" placeholder="Contact Number" class="w-3/4 rounded-r-none border-l-0 border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" />';
                $output .= '</div>';
            $output .= '</div>';
        } 
        else 
        {
            //  Singapore normal contact number input field
            $output .= '<div class="w-full mb-4">';
                $output .= '<label class="capitalize mb-2.5 block font-medium text-black">Contact Number</label>';
                $output .= '<input wire:model.blur="form.contactNumber" type="tel" name="contactNumber" placeholder="Contact Number" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" />';
            $output .= '</div>';
        }

        return $output;
    }

    public function render()
    {
        return view('livewire.guest.registration-form');
    }
}
