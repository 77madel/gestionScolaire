<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Classe;
use Livewire\Component;
use App\Models\SchoolYears;
use Livewire\WithPagination;

class ClasseShow extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';
    public $libelle;
    public $level_id;
    public $classe_id;

    public function editclasse(int $classe_id)
    {
        $classe = Classe::find($classe_id);
        if($classe){
            $this->classe_id = $classe_id;
            $this->libelle = $classe->libelle;
            $this->level_id = $classe->level_id;
        }
    }

    public function updateClasse()
    {

        try{

               $classes = Classe::find($this->classe_id);
                $classes->libelle = $this->libelle;
                $classes->level_id = $this->level_id;

                $classes->save();
            toastr()->success("Classe mise a jour");
            return redirect()->route('classes');

         }catch (\Exception $e){
             toastr()->error($e);
             return redirect()->route('classes');
          }
    }

    public function deleteClasse($classe_id){

        Classe::where('id', $classe_id)->delete();
        toastr()->success("Classe supprimer");
            return redirect()->route('classes');
    }

    public function store()
    {
        $this->validate([
            'libelle' => 'string|required|unique:levels,code',
            'level_id' => 'string|required',
        ]);

        try{

                $classes = new Classe();
                $classes->libelle = $this->libelle;
                $classes->level_id = $this->level_id;

                $classes->save();
            toastr()->success("Classe ajouter");
            return redirect()->route('classes');

         }catch (\Exception $e){
             toastr()->error($e);
             return redirect()->route('classes');
          }
    }


    public function render()
    {
        if(!empty($this->search))
        {
            $classes = Classe::where('libelle', 'like', '%' . $this->search . '%')->paginate(5);
        }else{

              // recuperer l'annee dont l'active = '1'
            $activeschoolYear = SchoolYears::where('active', '1')->first();

            //Charger les niveaux qui appartinnent a l'annee  en cours
            $currentLevels = Level::where('school_year_id', $activeschoolYear->id)->get();

            $classes = Classe::with('level')->whereRelation('level', 'school_year_id', $activeschoolYear->id)->paginate(5);
        }


        return view('livewire.classe-show', ['classes' => $classes, 'currentLevels' => $currentLevels]);
    }
}
