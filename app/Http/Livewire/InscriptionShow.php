<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Level;
use Livewire\Component;
use App\Models\Inscription;
use App\Models\SchoolYears;
use App\Models\Student;
use Livewire\WithPagination;

class InscriptionShow extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    public $student_id;
    public $level_id;
    public $matricule;
    public $classe_id;
    public $fullname;
    public $inscription_id;

    public function editEleve(int $inscription_id)
    {
        $inscription = Inscription::find($inscription_id);
        if($inscription)
        {
            $this->inscription_id = $inscription_id;
            $this->matricule = $inscription->student->matricule;
            $this->fullname = $inscription->fullname;
            $this->level_id = $inscription->level_id;
            // $this->classe_id = $inscription->classe->libelle;

            // dd($inscription);
        }
    }

    public function updateInscri(){
        try {
            $inscription = Inscription::find($this->inscription_id);
            $inscription->student_id = $this->student_id;
            $inscription->classe_id = $this->classe_id;

            $inscription->save();

            toastr()->success("Modification successful");
        }catch(\Exception $e){
            toastr()->error($e);
        }return redirect()->route('inscriptions');
    }

     public function store()
     {
        $activeschoolYear = SchoolYears::where('active', '1' )->first();

        //Pour eviter d'inscrir un eleve dans une annee
        $query = Inscription::where('student_id', $this->student_id)->where('school_years_id', $activeschoolYear->id)->get();

        if($query->count() > 0)
        {
            //message
            toastr()->error("Cet eleve est deja inscrit. Modifier les informations si necessaire");
            return redirect()->route('inscriptions');
        }else{
            $this->validate([
                'matricule' => 'string|required',
                'level_id' => "string|required",
                'classe_id' => "string|required",
            ]);

            try {

                $inscriptions = new Inscription();
                $inscriptions->student_id = $this->student_id;
                $inscriptions->classe_id = $this->classe_id;
                $inscriptions->school_years_id = $activeschoolYear->id;
               //  $inscriptions->comments = $this->comments;
                $inscriptions->save();
                toastr()->success("Inscription saved successfully");

            }catch (\Exception $e) {
                 toastr()->error('Inscription failed to save');

            }
                return redirect()->route('inscriptions');
        }


     }

    public function render()
    {

        if(isset($this->classe_id)){


            if(!empty($this->search))
            {
                $inscriptions = Inscription::where('nom', 'like', '%' . $this->search . '%')->orWhere('prenom', 'like', '%' . $this->search . '%')->orWhere('matricule', 'like', '%' . $this->search . '%')->orWhere('comments', 'like', '%' . $this->search . '%')->paginate(5);
            }else{

                $activeschoolYear = SchoolYears::where('active', '1' )->first();

                $levels = Level::where('school_year_id', $activeschoolYear->id)->get();

                $inscriptions = Inscription::with(['student', 'classe', 'level'])->where("classe_id", $this->classe_id)->paginate(5);

            // dd($inscriptions);


                if(isset($this->matricule))
                {
                    $student = Student::where("matricule", $this->matricule)->first();

                    if($student)
                    {
                        //permet de recuperer nomcomplet
                        $this->fullname = $student->nom . ' ' . $student->prenom;
                        //sauvegarde l'id student
                        $this->student_id = $student->id;

                    }else{
                        $this->fullname = '';
                    }
                }

                if(isset($this->level_id))
                {
                    $activeLevelid = $this->level_id;

                    $classes = Classe::where('level_id', $activeLevelid)->get();
                }else{
                    $classes = [];
                }

            }
        }else{
            if(!empty($this->search))
            {
                $inscriptions = Inscription::where('nom', 'like', '%' . $this->search . '%')->orWhere('prenom', 'like', '%' . $this->search . '%')->orWhere('matricule', 'like', '%' . $this->search . '%')->orWhere('comments', 'like', '%' . $this->search . '%')->paginate(5);
            }else{

                $activeschoolYear = SchoolYears::where('active', '1' )->first();

                $levels = Level::where('school_year_id', $activeschoolYear->id)->get();

                $inscriptions = Inscription::with(['student', 'classe', 'level'])->where("classe_id", $this->classe_id)->paginate(5);

            // dd($inscriptions);


                if(isset($this->matricule))
                {
                    $student = Student::where("matricule", $this->matricule)->first();

                    if($student)
                    {
                        //permet de recuperer nomcomplet
                        $this->fullname = $student->nom . ' ' . $student->prenom;
                        //sauvegarde l'id student
                        $this->student_id = $student->id;

                    }else{
                        $this->fullname = '';
                    }
                }

                if(isset($this->level_id))
                {
                    $activeLevelid = $this->level_id;

                    $classes = Classe::where('level_id', $activeLevelid)->get();
                }else{
                    $classes = [];
                }

            }
        }

            $classelist = Classe::all();

        return view('livewire.inscription-show', compact('inscriptions', 'levels', 'classes', 'classelist'));
    }
}
