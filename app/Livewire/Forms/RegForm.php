<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Registrant;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class RegForm extends Form
{
    public $fields = [
        'nric' => '',
        'title' => 'Mr',
        'firstName' => '',
        'lastName' => '',
        'email' => '',
        'contactNumber' => '',
        'address' => '',
        'city' => '',
        'postalCode' => '',
    ];

    public $requiredFields = [];
    public $hiddenFields = [];
    public $extraFields = [];

    public $finalRegistrationData = [];
    public $promoCode = '';
    public $promoCodeDetails = [];    

    // Get the required fields from the component & passed in the RegForm object for validation values
    public function setRequiredFields($requiredFields)
    {
        $this->requiredFields = $requiredFields;
    }

    // Get the custom fields from the component & passed in the RegForm object for validation values
    public function setExtraFields($extraFields)
    {
        $this->extraFields = $extraFields;
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

    /***
     * Store the registration data to the database
     * @param $amountToPay -> it is the net total amount to pay
     */
    public function storeRegistrationData( $amountToPay)
    {
        $regData = $this->finalRegistrationData['registrationFields'];
        $programItem = $this->finalRegistrationData['programItem'];
        $promoData = $this->finalRegistrationData['promoDetails'] ?? null;
        $extraData = $this->finalRegistrationData['extraFieldValues'] ?? null;

        $registrantData =  [
            'regCode' => $this->generateRegistrationCode($programItem['programCode']),
            'programCode' => $programItem['programCode'],
            'type' => $programItem['type'],
            'user_id' => auth()->check() ?  auth()->user()->id : null,
            'nric' => $regData['nric'],
            'title' => $regData['title'],
            'firstName' => $regData['firstName'],
            'lastName' => $regData['lastName'],
            'email' => $regData['email'],
            'contactNumber' => $regData['contactNumber'],
            'address' => $regData['address'],
            'city' => $regData['city'],
            'postalCode' => $regData['postalCode'],
            'extraFields' => $extraData,
            'price' => $amountToPay,
            'regStatus' => 'pending',
            'promotion_id' => 1,
        ];

        if($promoData)
        {
            $registrantData['promocode_id'] = $promoData['id'];
            $registrantData['appliedPromoCode'] = $promoData['promocode'];
            $registrantData['discountValue'] = $promoData['price'];
        }

        dd($registrantData);
        
        // $registrant = Registrant::create($registrantData);
        
        
    }

    public function updated($propertyName)
    {
        $this->validateOnly('fields.'.$propertyName);
    }

    public function confirmRegistration($event_details)
    {
        try 
        {
            $this->validate();

            $this->finalRegistrationData = [
                'programItem' => $event_details,
                'promoDetails' => $this->promoCodeDetails,
                'registrationFields' => $this->fields,
                'extraFieldValues' => $this->convertExtraFieldValuesToJson(),
            ];

        } 
        catch (\Exception $e) 
        {
            throw $e;
        }
    }


    public function convertExtraFieldValuesToJson()
    {
        $extraFieldValues = [];
        
        foreach($this->extraFields as $field)
        {
            if(isset($this->fields[$field->key]))
            {
                array_push($extraFieldValues, [
                    $field->key => $this->fields[$field->key],
                ]);
            }
        }

        return json_encode($extraFieldValues);
    }

    public function rules()
    {
        $rules = [];
        
        foreach($this->fields as $field => $value)
        {
            if(!in_array($field, $this->hiddenFields))
            {
                $rules["fields.$field"] = $this->getFieldRules($field);
            }
        }

        foreach($this->extraFields as $value)
        {
            if($value->required)
            {
                $rules["fields.$value->key"] = 'required';
            }
        }

        return $rules;
    }

    protected function getFieldRules($field)
    {
        $isRequired = in_array($field, $this->requiredFields);
        
        switch($field) {
            case 'email':
                return $isRequired ? 'required|email' : 'email';
            case 'nric':
                return $isRequired ? 'required|max:4' : 'max:4';
            case 'contactNumber':
                return $isRequired ? 'required|max:15' : 'max:15';
            case 'postalCode':
                return $isRequired ? 'required|max:9' : 'max:9';
            default:
                return $isRequired ? 'required|max:255' : 'max:255';
        }
    }

    protected function messages()
    {
        $messages = [
            'fields.nric.required' => 'NRIC is required.',
            'fields.nric.max' => 'Last 4 digits of NRIC only.',
            'fields.title.required' => 'Title is required.',
            'fields.title.max' => 'Title must be at most 255 characters.',
            'fields.firstName.required' => 'First name is required.',
            'fields.firstName.max' => 'First name must be at most 255 characters.',
            'fields.lastName.required' => 'Last name is required.',
            'fields.lastName.max' => 'Last name must be at most 255 characters.',
            'fields.email.required' => 'Email is required.',
            'fields.email.email' => 'Email must be a valid email address.',
            'fields.contactNumber.required' => 'Phone number is required.',
            'fields.address.required' => 'Address is required.',
            'fields.city.required' => 'City is required.',
            'fields.postalCode.required' => 'Postal is required.',
        ];

        foreach($this->extraFields as $value)
        {
            if($value->required)
            {
                $messages["fields.$value->key.required"] = $value->label.' is required.';
            }
        }

        return $messages;
    }

}
