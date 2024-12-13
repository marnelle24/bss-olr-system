<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Livewire\Forms\RegForm;
use Illuminate\Support\Facades\Auth;

class RegistrationForm extends Component
{
    public RegForm $form;
    public $eventDetails; // props
    public $programItem; // props
    // form settings including the custom settings of each field
    public $formSettings;
    public $isInternational = false;
    public $requiredFields = [];
    public $hiddenFields = [];

    public function mount()
    {
        $this->eventDetails = json_decode($this->programItem);
        
        $this->requiredFields = $this->getRequiredFields($this->eventDetails ? $this->eventDetails->settings : null);
        $this->hiddenFields = $this->getHiddenFields($this->eventDetails ? $this->eventDetails->settings : null);

        if($this->eventDetails)
        {
            if(isset($this->eventDetails->settings['internationalEvent']) && $this->eventDetails->settings['internationalEvent'])
                $this->isInternational = true;
            else
                $this->isInternational = false;
        }

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
    // private function getCustomFields($extraFields)
    // {
    //     // if there are no extra fields, return empty array
    //     if(empty($extraFields))
    //         return [];

    //     // decode the extra fields from JSON String to Array
    //     $xf = json_decode($extraFields, true);

    //     // sort the extra fields based on the order
    //     usort($xf, function($a, $b) {
    //         return $a['order'] <=> $b['order'];
    //     });

    //     return $xf;
    // }


    public function submit()
    {
        // Set the required fields in the RegForm object for validation
        $this->form->setRequiredFields($this->requiredFields);
        
        // Set the hidden fields based on user define settings
        $this->form->setHiddenFields($this->hiddenFields);

        // Emit an event to trigger the step change
        $this->dispatch('triggerStepChange', 2);
        
        // return $this->form->store($this->eventDetails);

        try {


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
            $output .= '<div class="w-full">';
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
