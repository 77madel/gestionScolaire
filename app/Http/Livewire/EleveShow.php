<?php

namespace App\Http\Livewire;

use toastr;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class EleveShow extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    public $matricule;
    public $nom;
    public $prenom;
    public $naissance;
    public $contact_parent;

    public function store()
    {
        $this->validate([
            'matricule' => 'string|required|unique:students,matricule',
            'nom' => 'string|required',
            'prenom' => 'string|required',
            'naissance' => 'date|required',
            'contact_parent' => 'string|required',

        ]);

        try
        {

            $student = new Student();
            $student->matricule = $this->matricule;
            $student->nom = $this->nom;
            $student->prenom = $this->prenom;
            $student->naissance = $this->naissance;
            $student->contact_parent = $this->contact_parent;
            $student->save();

            toastr()->success("Eleve ajouter");
            return redirect()->route('students');

       }catch(\Exception $e){
            toastr()->error("Eleve n'est pas ajouter");
             return redirect()->route('students');
       }

    }

    public function render()
    {
        if(!empty($this->search))
        {
            $eleves = Student::where('matricule', 'like', '%' . $this->search . '%')->orWhere('nom', 'like', '%' . $this->search . '%')->orWhere('prenom', 'like', '%' . $this->search . '%')->orWhere('naissance', 'like', '%' . $this->search . '%')->paginate(5);
        }else{

              // recuperer l'annee dont l'active = '1'
            // $activeschoolYear = SchoolYears::where('active', '1')->first();

            //Charger les niveaux qui appartinnent a l'annee  en cours
            // $currentLevels = Level::where('school_year_id', $activeschoolYear->id)->get();

            $eleves = Student::latest()->paginate(5);
        }

        return view('livewire.eleve-show', compact('eleves'));
    }
}
