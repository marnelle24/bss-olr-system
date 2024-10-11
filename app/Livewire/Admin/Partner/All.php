<?php

namespace App\Livewire\Admin\Partner;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class All extends Component
{
    use WithPagination;

    public $search;

    #[Computed]
    public function partners()
    {
        return Partner::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(8);
    }

    public function getFirstLetter($string)
    {
        $_name = explode(" ", $string);
        $firstLetters = '';
        $cnt = 0;

        foreach ($_name as $key => $n) {
            if($cnt < 2) {
                $firstLetters .= substr($n, 0, 1);
            }
            $cnt++;
        }
        
        return $firstLetters;
    }


    // for 2 word string only. Ex: Marnelle Apat => 'MA'
    protected function createDefaultPhotoUrl($name)
    {
        $_name = trim(collect(explode(' ', $name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($_name).'&color=7F9CF5&background=EBF4FF';
    }

}
