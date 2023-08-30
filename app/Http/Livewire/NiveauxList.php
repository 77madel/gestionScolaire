<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYears;
use Livewire\WithPagination;

class NiveauxList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function delete(Level $level)
    {
        $level->delete();
        toastr()->success("Niveau supprimer");
        return redirect()->route('niveaux.list');
    }

    public function render()
    {
        if(!empty($this->search))
        {
            $levels = Level::where('code', 'like', '%' . $this->search . '%')->orWhere('libelle', 'like', '%' . $this->search . '%')->orWhere('scolarite', 'like', '%' . $this->search . '%')->paginate(10);
        }else{
            $activeSchoolyear = SchoolYears::where('active', '1')->first();
            $levels = Level::where('school_year_id', $activeSchoolyear->id)->paginate(10);
        }

        return view('livewire.niveaux-list', ['levels' => $levels ]);
    }
}
