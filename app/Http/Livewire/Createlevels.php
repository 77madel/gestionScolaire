<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\SchoolYears;
use Livewire\Component;

class Createlevels extends Component
{

    public $code;
    public $libelle;
    public $scolarite;

    public function store(Level $level)
    {
        $this->validate([
            'code' => 'string|required|unique:levels,code',
            'libelle' => 'string|required|unique:levels,code',
            'scolarite' => 'integer|required',
        ]);

        try{

            //Recuperer l'annee dont l'active = '1'
            $activeSchoolyear = SchoolYears::where('active', '1')->first();

            $level->code = $this->code;
            $level->libelle = $this->libelle;
            $level->scolarite = $this->scolarite;
            $level->school_year_id = $activeSchoolyear->id;

            $level->save();
            toastr()->success("Niveau ajouter");
            return redirect()->route('niveaux.list');

        }catch (\Exception $e){
            toastr()->error("Niveau n'a pas ete ajoute");
            return redirect()->route('niveaux.list');
         }
    }

    public function render()
    {
        return view('livewire.createlevels');
    }
}
