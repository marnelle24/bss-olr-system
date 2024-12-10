<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Livewire\Forms\RegForm;
use Illuminate\Support\Facades\Auth;

class RegistrationForm extends Component
{
    public RegForm $form;
    public $eventDetails; // props
    public $promotion;    // props
    public $programItem; // props

    // protected $listeners = ['setProgramCode' => 'getProgramCode'];

    // form settings including the custom settings of each field
    public $formSettings;
    public $isInternational = false;
    public $requiredFields = [];
    public $hiddenFields = [];
    // public $extraFields = [];

    public $extraFieldsValues = [];

    public $promoCode = null;
    public $discount = 0;


    public function mount()
    {
        $this->eventDetails = json_decode($this->programItem);
        
        $this->requiredFields = $this->getRequiredFields($this->eventDetails ? $this->eventDetails->settings : null);
        $this->hiddenFields = $this->getHiddenFields($this->eventDetails ? $this->eventDetails->settings : null);
        // $this->extraFields = $this->getCustomFields($this->eventDetails ? $this->eventDetails->extraFields : null);
        $this->isInternational = $this->eventDetails ? (isset($this->eventDetails->settings['internationalEvent']) && $this->eventDetails->settings['internationalEvent'] ? true : false) : false;
        
        // $this->form->programmeType = request()->segment(1);
        // $this->formSettings = $this->eventDetails['settings'];

        // populate the starter registration fields when there is Auth detected
        // Otherwise, set the default fields to null
        if(Auth::check())
        {
            $this->form->firstName = auth()->user()->firstname;
            $this->form->lastName = auth()->user()->lastname;
            $this->form->email = auth()->user()->email;
        }

    }

    // Get the required fields from the event settings
    private function getRequiredFields($eventSettings)
    {
        $setttings = json_decode($eventSettings, true);
        return isset($setttings['addRequired']) ? $setttings['addRequired'] : [];
    }

    // Get the hidden fields from the event settings
    private function getHiddenFields($eventSettings)
    {
        $setttings = json_decode($eventSettings, true);
        return isset($setttings['addHidden']) ? $setttings['addHidden'] : [];
    }

    // Get the custom fields from the event settings
    private function getCustomFields($extraFields)
    {
        // if there are no extra fields, return empty array
        if(empty($extraFields))
            return [];

        // decode the extra fields from JSON String to Array
        $xf = json_decode($extraFields, true);

        // sort the extra fields based on the order
        usort($xf, function($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        return $xf;
    }


    public function submit()
    {
        // Add validation rules
        // $this->validate([
        //     'form.firstName' => 'required',
        //     'form.lastName' => 'required',
        //     'form.email' => 'required|email',
        //     'form.contactNumber' => 'required',
        //     // Add other required fields validation
        // ]);

        try {
            // Debug the form data
            logger()->info('Form Submission Data:', [
                'form_data' => $this->form,
                'extra_fields' => $this->extraFieldsValues,
                'promo_code' => $this->promoCode,
                'discount' => $this->discount,
                'event_details' => $this->eventDetails
            ]);

            // Set the required fields in the RegForm object for validation
            // $this->form->setRequiredFields($this->requiredFields);
            
            // Set the hidden fields based on user define settings
            // $this->form->setHiddenFields($this->hiddenFields);

            // Convert the extrafields into JSON String ready to save in DB
            // $this->form->customFieldJsonValues = $this->convertExtraFieldsToJSON($this->extraFieldsValues);

            // Get the promo code inputted if any
            // $this->form->appliedPromoCode = $this->promoCode;

            // Get the equivalent amount value of the promo code
            // $this->form->discountValue = $this->discount;

            // Get the net amount - final amount for checkout
            // $this->form->netAmount = $this->eventDetails['price'] - $this->discount;

            // Store the registration and data in the DB and proceed to payment portal (hitpay)
            $result = $this->form->store($this->eventDetails);

            // Emit an event for successful submission
            // $this->dispatch('formSubmitted', [
            //     'message' => 'Registration submitted successfully!'
            // ]);

            // Redirect to payment or success page
            // return redirect()->to('/payment/' . $result->id);

        } catch (\Exception $e) {
            logger()->error('Registration Form Error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Emit an event for failed submission
            $this->dispatch('formError', [
                'message' => 'There was an error submitting your registration. Please try again.'
            ]);
        }
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
                    $output .= '<select wire:model.blur="form.countryCode" class="w-1/3 rounded-l-none border-r-0 border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none">';
                        $output .= '<option value="+65" data-flag="🇸🇬" selected>🇸🇬 +65</option>';
                        $output .= '<option value="+1" data-flag="🇺🇸">🇺🇸 +1</option>';
                        $output .= '<option value="+44" data-flag="🇬🇧">🇬🇧 +44</option>';
                        $output .= '<option value="+91" data-flag="🇮🇳">🇮🇳 +91</option>';
                        $output .= '<option value="+86" data-flag="🇨🇳">🇨🇳 +86</option>';
                        $output .= '<option value="+81" data-flag="🇯🇵">🇯🇵 +81</option>';
                    // Add more country codes as needed
                    $output .= '</select>';
                    $output .= '<input wire:model.blur="form.contactNumber" type="tel" name="contactNumber" placeholder="Contact Number" class="w-full rounded-r-none border-l-0 border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" />';
                $output .= '</div>';
            $output .= '</div>';
        } 
        else 
        {
            //  Singapore normal contact number input field
            $output .= '<div class="w-full mb-4">';
                $output .= '<label class="capitalize mb-2.5 block font-medium text-black">Contact Number</label>';
                $output .= '<input wire:model.blur="form.contactNumber" type="tel" name="contactNumber" placeholder="Contact Number" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none" />';
            $output .= '</div>';
        }

        return $output;
    }

    public function render()
    {
        return view('livewire.guest.registration-form');
    }
}
