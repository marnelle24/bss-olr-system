<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Partner;
use Livewire\Attributes\Validate;

class PartnerForm extends Form
{
    public ?Partner $partner;

    public $id;
    public $slug;
    public $name;
    public $bio;
    public $contactPerson;
    public $contactNumber;
    public $pstatus = false;
    public $contactEmail;
    public $websiteUrl;
    public $publishabled = false;
    public $searcheable = false;
    public $requestedBy;
    public $isApproved = 'draft';

    public $_isApproved = [ 'review', 'draft', 'approved' ];

    public function setPartner(Partner $partner)
    {
        $this->id               = $partner->id;
        $this->name             = $partner->name;
        $this->slug             = $partner->slug;
        $this->bio              = $partner->bio;
        $this->contactPerson    = $partner->contactPerson;
        $this->contactNumber    = $partner->contactNumber;
        $this->contactEmail     = $partner->contactEmail;
        $this->websiteUrl       = $partner->websiteUrl;
        $this->pstatus          = $partner->status;
        $this->publishabled     = $partner->publishabled;
        $this->searcheable      = $partner->searcheable;
        $this->requestedBy      = $partner->requestedBy;
        $this->isApproved       = $partner->approvedBy;
    }

    protected $rules = [
        'name'              => 'required|min:5',
        'slug'              => 'nullable',
        'bio'               => 'nullable',
        'contactPerson'     => 'nullable',
        'contactNumber'     => 'nullable',
        'contactEmail'      => 'nullable',
        'websiteUrl'        => 'nullable',
        'publishabled'      => 'nullable',
        'searcheable'       => 'nullable',
        'isApproved'        => 'nullable',
        'pstatus'           => 'nullable',
    ];

    protected $messages = [
        'name.required'     => 'Name must not be empty.',
        'name.min'          => 'Name too short.',
    ];

    // Create new partner
    public function store()
    {
        $this->validate();

        Partner::create([
            'name'              => $this->name,
            'slug'              => $this->slug,
            'bio'               => $this->bio,
            'contactPerson'     => $this->contactPerson,
            'contactNumber'     => $this->contactNumber,
            'contactEmail'      => $this->contactEmail,
            'websiteUrl'        => $this->websiteUrl,
            'publishabled'      => $this->publishabled,
            'searcheable'       => $this->searcheable,
            'approvedBy'        => $this->isApproved,
            'status'            => $this->pstatus ? 1 : 0,
            'requestedBy'       => auth()->user()->name
        ]);

        $this->reset();

        session()->flash('success', 'New partners added successfully'); // success message

        return redirect()->route('admin.partners.list');

    }

    // Update partner
    public function update( $partner )
    {
        $this->validate();

        $_partner = Partner::find($this->id);

        $_partner->update([
            'name'              => $partner->name,
            'slug'              => $partner->slug,
            'bio'               => $partner->bio,
            'contactPerson'     => $partner->contactPerson,
            'contactNumber'     => $partner->contactNumber,
            'contactEmail'      => $partner->contactEmail,
            'websiteUrl'        => $partner->websiteUrl,
            'publishabled'      => $partner->publishabled,
            'searcheable'       => $partner->searcheable,
            'approvedBy'        => $partner->isApproved,
            'status'            => $partner->pstatus,
        ]);
    }

    public function resetForm()
    {
        $this->reset();
    }

}
