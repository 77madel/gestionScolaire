<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\SchoolYears;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $schoolYearList = SchoolYears::paginate(1);
        return view('livewire.settings', ['schoolYearList' => $schoolYearList]);
    }
}
