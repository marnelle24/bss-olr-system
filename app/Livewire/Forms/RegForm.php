<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegForm extends Form
{
    
    public $nirc;
    public $title;
    public $firstName;
    public $lastName;
    public $email;
    public $contactNumber;
    public $countryCode;
    public $address;
    public $city;
    public $postalCode;

    public $customFields = [];
    public $requiredFields = [];
    public $hiddenFields = [];

    // Get the required fields from the component & passed in the RegForm object for validation values
    public function setRequiredFields($requiredFields)
    {
        $this->requiredFields = $requiredFields;
    }

    public function setCustomFields($customFields)
    {
        $this->customFields = $customFields;
    }

    public function setHiddenFields($hiddenFields)
    {
        $this->hiddenFields = $hiddenFields;
    }

    public function store()
    {
        // Validate the form data
        $this->validate();

        dump($this->requiredFields);

        // Store the form data
        dd($this->all());
    }


    //  Rules for the form fields
    protected function rules()
    {
        $rules = [
            'nirc'          => in_array('nirc', $this->hiddenFields) ? '' : (in_array('nirc', $this->requiredFields) ? 'required' : ''),
            'title'         => in_array('title', $this->hiddenFields) ? '' : (in_array('title', $this->requiredFields) ? 'required' : ''),
            'firstName'     => in_array('firstName', $this->hiddenFields) ? '' : (in_array('firstName', $this->requiredFields) ? 'required|min:3|max:255|string' : 'min:3|max:255|string'),
            'lastName'      => in_array('lastName', $this->hiddenFields) ? '' : (in_array('lastName', $this->requiredFields) ? 'required|min:3|max:255|string' : 'min:3|max:255|string'),
            'email'         => in_array('email', $this->hiddenFields) ? '' : (in_array('email', $this->requiredFields) ? 'required|email' : 'email'),
            'contactNumber' => in_array('contactNumber', $this->hiddenFields) ? '' : (in_array('contactNumber', $this->requiredFields) ? 'required|string' : 'string'),
            'address'       => in_array('address', $this->hiddenFields) ? '' : (in_array('address', $this->requiredFields) ? 'required|string' : 'string'),
            'city'          => in_array('city', $this->hiddenFields) ? '' : (in_array('city', $this->requiredFields) ? 'required|string' : 'string'),
            'postalCode'    => in_array('postalCode', $this->hiddenFields) ? '' : (in_array('postalCode', $this->requiredFields) ? 'required|string' : 'string'),
        ];

        if(!empty($this->customFields)) 
        {
            foreach($this->customFields as $key => $field) 
            {
                if(isset($field['required']) && $field['required'] === true) 
                {
                    $rules[$key] = 'required';
                }
            }
        }


        return $rules;
    }

    protected function messages()
    {
        $messages = [
            'nirc.required' => 'NIRC is required.',
            'title.required' => 'Title is required.',
            'firstName.required' => 'First name is required.',
            'firstName.min'      => 'First name must be at least 3 characters.',
            'firstName.max'      => 'First name must be at most 255 characters.',
            'firstName.string'   => 'First name must be a string.',
            'lastName.required'  => 'Last name is required.',
            'lastName.min'       => 'Last name must be at least 3 characters.',
            'lastName.max'       => 'Last name must be at most 255 characters.',
            'lastName.string'    => 'Last name must be a string.',
            'email.required'     => 'Email is required.',
            'email.email'        => 'Email must be a valid email address.',
            'contactNumber.required' => 'Contact number is required.',
            'contactNumber.string'  => 'Contact number must be a string.',
            'countryCode.required'  => 'Country code is required.',
            'countryCode.string'   => 'Country code must be a string.',
            'address.required'     => 'Address is required.',
            'address.string'      => 'Address must be a string.',
            'city.required'        => 'City is required.',
            'city.string'         => 'City must be a string.',
            'postalCode.required'  => 'Postal code is required.',
            'postalCode.string'   => 'Postal code must be a string.',
        ];

        if(!empty($this->customFields))  
        {
            foreach($this->customFields as $key => $field) 
            {
                if(isset($field['required']) && $field['required'] === true)
                {
                    $messages[$key . '.required'] = $field['label'] . ' is required.';
                }
            }
        }

        return $messages;
    }

}
