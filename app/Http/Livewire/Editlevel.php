<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class Editlevel extends Component
{
    public $level;
    public $code;
    public $libelle;
    public $scolarite;

    //Etape ou composant est montee
    public function mount()
    {
        $this->code = $this->level->code;
        $this->libelle = $this->level->libelle;
        $this->scolarite = $this->level->scolarite;
    }

    public function store()
    {
        $level = Level::find($this->level->id);

        $this->validate([
            'code' => 'string|required',
            'libelle' => 'string|required',
            'scolarite' => 'integer|required',
        ]);

        try{

            $level->code = $this->code;
            $level->libelle = $this->libelle;
            $level->scolarite = $this->scolarite;

            $level->save();

            toastr()->success("Niveau mise a jour");
            return redirect()->route('niveaux.list');

        }catch (\Exception $e){
            toastr()->error("Niveau n'a pas ete mise a jour");
            return redirect()->route('niveaux.list');
         }
    }


    public function render()
    {
        return view('livewire.editlevel');
    }
}
