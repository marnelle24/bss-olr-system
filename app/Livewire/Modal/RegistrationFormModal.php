<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\Programme;
use App\Models\Promocode;
use App\Livewire\Forms\RegForm;

class RegistrationFormModal extends Component
{
    public RegForm $form;

    public $programItem = [];
    public $promotion = [];
    public $showModal = false;
    public $showConfirmationModal = false;

    public $isInternational = false;
    public $contacNumberLabel;

    // public $dummyData = '{"programItem":{"id":13,"user_id":1,"partner_id":2,"program_id":9,"type":"event","programCode":"EYHY2022","title":"\u6069\u8a00\u6167\u8bed","startDate":"2020-01-01","endDate":"2029-10-01","startTime":"20:15:00","endTime":"21:45:00","activeUntil":"2030-01-01 00:00:00","customDate":null,"venue":"\u901a\u8fc7ZOOM\u5e73\u53f0\u8fdb\u884c\u3002Zoom\u94fe\u63a5\u5c06\u4e8e\u8bfe\u7a0b\u524d\u5f53\u5929\u53d1\u9001\u3002<br>\r\n(ZOOM\u4f1a\u8baeID\u548c\u5bc6\u7801\u4e0d\u53ef\u4e0e\u4eba\u5206\u4eab\u6216\u8f6c\u53d1\uff0c\u8bf7\u4e8e\u8bfe\u7a0b\u5f00\u59cb\u524d15\u5206\u949f\u767b\u5165)","latLong":"","price":"50.00","adminFee":"0.00","thumb":"https:\/\/biblesociety.sg\/wp-content\/uploads\/SIBD\/artworks\/EYHY2022-3-thumb.jpg","a3_poster":"https:\/\/www.biblesociety.sg\/wp-content\/uploads\/2024\/06\/Words-of-Grace-Wisdom-2024\u2014SG-with-updated-Barcode.jpeg","excerpt":"","description":"<p>\u4e0a\u5e1d\u7684\u8bdd\u5927\u6709\u5965\u79d8\uff0c\u4e0d\u5355\u5b89\u6170\u4eba\u7684\u5fc3\uff0c\u4e5f\u533b\u6cbb\u4eba\u7684\u8eab\u4f53\uff0c\u53eb\u6211\u4eec\u5f97\u7740\u5065\u5eb7\u7684\u8eab\u5fc3\u7075\uff0c\u4e0a\u5e1d\u7684\u8bdd\u8bed\u6bd4\u75ab\u82d7\u66f4\u52a0\u6709\u529f\u6548\uff0c\u66f4\u52a0\u6709\u80fd\u529b\uff1b\u4e0a\u5e1d\u7684\u8bdd\u53ef\u4ee5\u7167\u660e\u6211\u4eec\u5fc3\u4e2d\u7684\u773c\u775b\uff0c\u8d50\u7ed9\u6211\u4eec\u667a\u6167\u548c\u542f\u793a\u7684\u7075\uff0c\u8ba9\u6211\u4eec\u628a\u57fa\u7763\u7684\u9053\u7406\u4e30\u4e30\u5bcc\u5bcc\u7684\u5b58\u5728\u5fc3\u91cc\uff0c\u6210\u4e3a\u6211\u4eec\u811a\u524d\u7684\u706f\uff0c\u5e26\u9886\u6211\u4eec\u524d\u884c\u3002<br\/><br\/>\r\n\u9080\u8bf7\u60a8\uff0c\u548c\u6211\u4eec\u4e00\u8d77\u4ece\u5723\u7ecf\u4e2d\u9886\u53d7\u6069\u5178\uff0c\u202f\u4ece\u5723\u7ecf\u4e2d\u5b66\u4e60\u667a\u6167\uff01<br\/>\r\n\r\n\u6d2a\u7267\u4e0e\u4f60\u6709\u7ea6\u2014\u2014\u6069\u8a00\u6167\u8bed\uff0c\u6bcf\u6708\u4e00\u671f\uff0c\u589e\u5f3a\u4f60\u5c5e\u7075\u7684\u514d\u75ab\u529b\u3002<br\/>\r\n<br\/>\r\n\u6069\u8a00\u6167\u8bed\u8bb2\u5ea7\u7279\u8272\uff1a\u202f<\/br>\r\n\u201c\u4e94\u76f8\u6709\u8da3\u8bfb\u7ecf\u6cd5\u201d\u793a\u8303\u202f <\/br>\r\n\u201c\u7ebf\u4e0a\u6388\u8bfe\u201d\u793a\u8303\u202f <\/p>\r\n\r\n\u65e5\u671f\uff1a2024\u5e741\u6708\u81f312\u6708\r\n(\u6bcf\u6708\u7b2c\u4e00\u4e2a\u5468\u65e5)<br>\r\n\u65f6\u95f4\uff1a\u665a\u4e0a8:10 - 9:30<br>\r\n\u5730\u70b9\uff1aZOOM<br>\r\n\u8bfe\u7a0b\u8d39\u7528\uff1a\u7231\u5fc3\u4e50\u6350 <br><br>\r\n<b>PDPA * \u5728\u5411\u6211\u4eec\u63d0\u4f9b\u60a8\u4e2a\u4eba\u8d44\u6599\u7684\u540c\u65f6\uff0c\u5c31\u8868\u793a\u60a8\u5df2\u540c\u610f\u8ba9\u65b0\u52a0\u5761\u5723\u7ecf\u516c\u4f1a\u548c\u5c5e\u4e0b\u7684\u5404\u9879\u4e8b\u5de5\u6309\u7167\u672c\u4f1a\u7f51\u9875\u4e0a\u7684\u9690\u79c1\u653f\u7b56\u6765\u6536\u96c6\u3001\u4f7f\u7528\u60a8\u7684\u4e2a\u4eba\u4fe1\u606f\u6570\u636e\u3002\u6211\u4eec\u4f1a\u7aed\u529b\u53ea\u5728\u6240\u9700\u7684\u8303\u56f4\u5185\u4f7f\u7528\u6240\u6536\u96c6\u7684\u6570\u636e\u3002<\/b>","contactNumber":"","contactPerson":"Ms Elise","contactEmail":"chinese.min@biblesociety.sg","chequeCode":"CHK-EYHY2022","limit":0,"settings":"{\"chinese_ministry\":{\"zoom\":\"zzomurl\",\"topic\":\"https:\/\/chat.whatsapp.com\/LWAWccVbJGzLWz83F0XeKJ\",\"registration\":\"https:\/\/chat.whatsapp.com\/GQEvjb3NJelKinpDmplbkp\",\"group\":\"-\",\"links\":[]},\"speaker\":\"2\",\"language\":\"chinese\",\"customURL\":\"https:\/\/www.biblesociety.sg\/chineseministry\/ch-sibd\/courses\/?e=231&view=1\",\"unlockCertname\":\"true\",\"addRequired\":[\"title\",\"nric\",\"contactNumber\"],\"addHidden\":[\"address\"]}","extraFields":"[{\"key\":\"ChurchName\",\"label\":\"Church Name\",\"order\":10,\"placeholder\":\"Church Name\",\"type\":\"text\",\"required\":true},{\"key\":\"MinistryPosition\",\"label\":\"Ministry Position\",\"order\":2,\"placeholder\":\"Ministry Position\",\"type\":\"text\",\"required\":false},{\"key\":\"AgeBracket\",\"label\":\"Age Bracket\",\"type\":\"select\",\"order\":3,\"options\":{\"Below 18\":\"Below 18\",\"18-25\":\"18-25\",\"25-35\":\"25-35\",\"35-60\":\"35-60\",\"Above 60\":\"Above 60\"},\"required\":false},{\"key\":\"ShortComment\",\"label\":\"Short Comment\",\"order\":4,\"placeholder\":\"Short Comment\",\"type\":\"textarea\",\"required\":false},{\"key\":\"ReceiveNewsletter\",\"label\":\"Receive Newsletter\",\"type\":\"radio\",\"order\":5,\"options\":{\"yes\":\"Yes\",\"no\":\"No\"},\"required\":false},{\"key\":\"FavouriteBibleVerse\",\"label\":\"Favourite Bible Verse\",\"type\":\"checkbox\",\"order\":6,\"options\":{\"John 3:16\":\"John 3:16\",\"Philippians 4:13\":\"Philippians 4:13\",\"Romans 8:28\":\"Romans 8:28\"},\"required\":false},{\"key\":\"NoOfChildren\",\"label\":\"No. of Children\",\"type\":\"number\",\"order\":7,\"required\":false},{\"key\":\"DateOfBirth\",\"label\":\"Date of Birth\",\"type\":\"date\",\"order\":1,\"required\":false}]","searchable":1,"publishable":1,"private_only":0,"externalUrl":null,"soft_delete":0,"status":null,"created_at":"2024-11-15T06:49:05.000000Z","updated_at":"2024-11-15T06:49:05.000000Z"},"promoDetails":{"id":1,"programCode":"EYHY2022","promocode":"TEST110","startDate":"2024-11-29","endDate":"2024-12-31","price":"10.00","isActive":true,"usedCount":49,"maxUses":50,"createdBy":"Marnelle Apat","created_at":"2024-11-29T07:03:04.000000Z","updated_at":"2024-11-29T07:03:04.000000Z"},"registrationFields":{"nric":"1232","title":"Ms","firstName":"Amara Sage","lastName":"Apat","email":"marnelle24@gmail.com","contactNumber":"+63-5443 5342","address":"Arcenas St. Sta Ana","city":"Cebu","postalCode":"6000","MinistryPosition":"fesfsdff","DateOfBirth":"2024-12-26","ReceiveNewsletter":"no","FavouriteBibleVerse":["John 3:16","Romans 8:28"],"ChurchName":"test"},"extraFieldValues":"[{\"DateOfBirth\":\"2024-12-26\"},{\"MinistryPosition\":\"fesfsdff\"},{\"ReceiveNewsletter\":\"no\"},{\"FavouriteBibleVerse\":[\"John 3:16\",\"Romans 8:28\"]},{\"ChurchName\":\"test\"}]"}';
    
    // fields in json
    public $hiddenFields = [];
    public $requiredFields = [];
    public $extraFields = [];


    protected $listeners = [
        // 'setProgramCode' => 'openModal',
        'updateFormValue' => 'updateFormValue',
        'openRegistrationFormModal' => 'openRegistrationForm'
    ];

    // update the form value and dispatch to the parent component
    public function updateFormValue($value)
    {   
        $key = $value['key'];
        $this->form->fields[$key] = $value['value'];
    }

    public function mount()
    {
        // $this->openRegistrationForm('EYHY2022', 'event');
        if($this->isInternational)
            $this->contacNumberLabel = 'International Contact Number';
        else
            $this->contacNumberLabel = 'Contact Number';

        // $this->openModal();
        
    }

    public function openRegistrationForm($data)
    {
        $programCode = $data['programCode'] ?? null;
        $programType = $data['programType'];
        $this->promotion = $data['promotion'];

        // $model = 'App\Models\Program_' . $programType;
        // $program_item = $model::where('programCode', $programCode)->first();
        // $this->programItem = collect($program_item)->toArray();

        $programme = Programme::where('programmeCode', $programCode)->first();
        $this->programItem = $programme;

        $settings = json_decode($this->programItem->settings);

        // $this->hiddenFields = $settings->addHidden; // FOR LIVE
        // $this->requiredFields = $settings->addRequired; // FOR LIVE
        // $this->requiredFields = ['nric', 'title', 'firstName', 'lastName', 'email', 'contactNumber']; // FOR TESTING

        $this->hiddenFields = []; // FOR TESTING
        $this->requiredFields = []; // FOR TESTING

        // Get the extra fields in the order of the order field
        $xFields = $this->programItem->extraFields ? json_decode($this->programItem->extraFields) : null;
        $xFields = collect($xFields)->sortBy('order');
        $this->extraFields = $xFields;

        $this->showModal = true;
    }

    public function validatePromoCode()
    {
        $this->validate(
            ['form.promoCode' => 'required'],
            ['form.promoCode.required' => 'Promo code is required']
        );

        $promo = Promocode::where('promocode', $this->form->promoCode)->first();

        if(!$promo)
            return $this->addError('form.promoCode', 'Promo code is not valid');

        if($promo->isActive != 'active')
            $this->addError('form.promoCode', 'Promo code is not active');
        elseif($promo->usedCount >= $promo->maxUses)
            $this->addError('form.promoCode', 'Promo code is used up');
        elseif($promo->startDate > now() || $promo->endDate < now())
            $this->addError('form.promoCode', 'Promo code is expired');
        else
        {
            session()->flash('form.promoCode', 'Promo code applied.');
            $this->form->promoCodeDetails = $promo;
        }

    }

    public function submit()
    {
        try 
        {
            $this->form->setHiddenFields($this->hiddenFields);
            $this->form->setRequiredFields($this->requiredFields);
            $this->form->setExtraFields($this->extraFields);
            $this->form->confirmRegistration($this->programItem);

            // $this->form->finalRegistrationData = $this->dummyData; // testing only
            // dump($this->form->finalRegistrationData);
            $this->openConfirmationModal();
        } 
        catch (\Illuminate\Validation\ValidationException $e) 
        {
            $this->dispatch('validation-error');
            throw $e;
        }
    }

    public function confirmAndProceedToPayment()
    {
        $this->form->storeRegistrationData($this->computeNetTotal());
    }

    public function computeNetTotal()
    {
        if($this->form->finalRegistrationData)
        {
            $finalPrice = $this->promotion ? $this->promotion['price'] : $this->form->finalRegistrationData['programItem']['price'];

            if($this->form->finalRegistrationData['promoDetails'])
                return $finalPrice - $this->form->finalRegistrationData['promoDetails']['price'];
            else
                return $finalPrice;
        }
    }

    public function openConfirmationModal()
    {
        $this->showConfirmationModal = true;
    }

    public function closeConfirmationModal()
    {
        $this->showConfirmationModal = false;
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal.registration-form-modal');
    }
}
