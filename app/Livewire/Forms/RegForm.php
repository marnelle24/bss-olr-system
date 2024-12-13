<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Registrant;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class RegForm extends Form
{
    public $nric;
    public $title = 'Mr';
    public $firstName;
    public $lastName;
    public $email;
    public $contactNumber;
    public $countryCode;
    public $address;
    public $city;
    public $postalCode;

    public $requiredFields = [];
    public $hiddenFields = [];

    // Get the required fields from the component & passed in the RegForm object for validation values
    public function setRequiredFields($requiredFields)
    {
        $this->requiredFields = $requiredFields;
    }

    // Get the custom fields from the component & passed in the RegForm object for validation values
    public function setCustomFields($customFields)
    {
        $this->customFields = $customFields;
    }

    // Get the hidden fields from the component & passed in the RegForm object for validation values
    public function setHiddenFields($hiddenFields)
    {
        $this->hiddenFields = $hiddenFields;
    }

    public function generateRegistrationCode($programCode)
    {
        $countRegistration = Registrant::where('programCode', $programCode)->count();
        return $programCode . '_' . str_pad($countRegistration + 1, 3, '0', STR_PAD_LEFT);
    }

    public function store( $event_details )
    {
        // Validate the form data
        $validatedData = $this->validate();
        
        // assign user to this registration
        $validatedData['user_id'] = Auth::check() ? auth()->user()->id : NULL;
    
        $registrant = [
            'regCode'            => $this->generateRegistrationCode($event_details->programCode),
            'programCode'        => $event_details->programCode,
            'type'               => $event_details->type,
            'user_id'            => $validatedData['user_id'],
            'nric'               => $validatedData['nric'],
            'title'              => $validatedData['title'],
            'firstName'          => $validatedData['firstName'],
            'lastName'           => $validatedData['lastName'],
            'address'            => $validatedData['address'],
            'city'               => $validatedData['city'],
            'postalCode'         => $validatedData['postalCode'],
            'email'              => $validatedData['email'],
            'contactNumber'      => $this->countryCode .' '. $validatedData['contactNumber'],
            'paymentStatus'      => 'pending',
            'paymentGateway'     => NULL,
            'price'              => $event_details->price,
            'paymentReferenceNo' => NULL,
        ];

        dd($registrant, $this->all());

        // Store the form data
        // $register = Registrant::create($registrant);

        // After storing registration to the DB, call the Payment Service with HitPay API to process the payment
        // if($register)
        // {
        //     // go to payment page of hitpay
        //     return redirect()->route('registration.create-payment', ['registrant' => $registrant]);
        // }
        // // handle error registration
        // return back()->withErrors(['msg' => 'Registration Failed. Contact Administrator.']);
    }

    //  Rules for the form fields
    protected function rules()
    {
        $rules = [
            'nric'          => in_array('nric', $this->hiddenFields) ? '' : (in_array('nric', $this->requiredFields) ? 'required' : ''),
            'title'         => in_array('title', $this->hiddenFields) ? '' : (in_array('title', $this->requiredFields) ? 'required' : ''),
            'firstName'     => in_array('firstName', $this->hiddenFields) ? '' : (in_array('firstName', $this->requiredFields) ? 'required|min:3|max:255' : 'min:3|max:255|string'),
            'lastName'      => in_array('lastName', $this->hiddenFields) ? '' : (in_array('lastName', $this->requiredFields) ? 'required|min:3|max:255' : 'min:3|max:255|string'),
            'email'         => in_array('email', $this->hiddenFields) ? '' : (in_array('email', $this->requiredFields) ? 'required|email' : 'email'),
            'contactNumber' => in_array('contactNumber', $this->hiddenFields) ? '' : (in_array('contactNumber', $this->requiredFields) ? 'required' : ''),
            'address'       => in_array('address', $this->hiddenFields) ? '' : (in_array('address', $this->requiredFields) ? 'required' : ''),
            'city'          => in_array('city', $this->hiddenFields) ? '' : (in_array('city', $this->requiredFields) ? 'required' : ''),
            'postalCode'    => in_array('postalCode', $this->hiddenFields) ? '' : (in_array('postalCode', $this->requiredFields) ? 'required' : ''),
        ];

        return $rules;
    }

    protected function messages()
    {
        $messages = [
            'nric.required' => 'NRIC is required.',
            'title.required' => 'Title is required.',
            'firstName.required' => 'First name is required.',
            'firstName.min'      => 'First name must be at least 3 characters.',
            'firstName.max'      => 'First name must be at most 255 characters.',
            'lastName.required'  => 'Last name is required.',
            'lastName.min'       => 'Last name must be at least 3 characters.',
            'lastName.max'       => 'Last name must be at most 255 characters.',
            'email.required'     => 'Email is required.',
            'email.email'        => 'Email must be a valid email address.',
            'contactNumber.required' => 'Contact number is required.',
            'address.required'     => 'Address is required.',
            'city.required'        => 'City is required.',
            'postalCode.required'  => 'Postal is required.',
        ];

        return $messages;
    }

}
