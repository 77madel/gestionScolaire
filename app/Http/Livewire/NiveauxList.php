<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class NiveauxList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if(!empty($this->search))
        {
            $levels = Level::where('code', 'like', '%' . $this->search . '%')->orWhere('libelle', 'like', '%' . $this->search . '%')->orWhere('scolarite', 'like', '%' . $this->search . '%')->paginate(10);
        }else{
            $levels = Level::paginate(10);
        }

        return view('livewire.niveaux-list', ['levels' => $levels ]);
    }
}
