<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\SchoolYears;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function toggleStatut(SchoolYears $schoolYear){
        //Mettre tout les lignes de la table acyive = 0

        $query = SchoolYears::where('active', '1')->update(['active' => '0']);

        //Mettre a jour le statut de l'entregistrement grace a son identifiant
        $schoolYear->active = '1';
        $schoolYear->save();

        $this->render();
    }

    public function render()
    {
        if(!empty($this->search))
        {
            $schoolYearList = SchoolYears::where('school_year', 'like', '%' . $this->search . '%')->orWhere('current_Year', 'like', '%' . $this->search . '%')->paginate(10);
        }else{
            $schoolYearList = SchoolYears::paginate(10);
        }

        return view('livewire.settings', ['schoolYearList' => $schoolYearList]);
    }
}
