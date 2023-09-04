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

        if(!empty($this->search))
        {
            $inscriptions = Inscription::where('matricule', 'like', '%' . $this->search . '%')->orWhere('classe_id', 'like', '%' . $this->search . '%')->orWhere('school_years_id', 'like', '%' . $this->search . '%')->orWhere('comments', 'like', '%' . $this->search . '%')->paginate(5);
        }else{

            $activeschoolYear = SchoolYears::where('active', '1' )->first();

            $levels = Level::where('school_year_id', $activeschoolYear->id)->get();

            $inscriptions = Inscription::with(['student', 'classe', 'level'])->paginate(5);

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

        return view('livewire.inscription-show', compact('inscriptions', 'levels', 'classes'));
    }
}
