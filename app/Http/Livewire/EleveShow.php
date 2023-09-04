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
    public $student_id;

    public function editStudent(int $student_id)
    {
        $student = Student::find($student_id);
        if($student)
        {
        $this->student_id = $student_id;
        $this->matricule = $student->matricule;
        $this->nom = $student->nom;
        $this->prenom = $student->prenom;
        $this->naissance = $student->naissance;
        $this->contact_parent = $student->contact_parent;
        }

    }

    public function updateStudent()
    {
        try{
            $student = Student::find($this->student_id);
            $student->matricule = $this->matricule;
            $student->nom = $this->nom;
            $student->prenom = $this->prenom;
            $student->naissance = $this->naissance;
            $student->contact_parent = $this->contact_parent;
            $student->save();

            toastr()->success("Modification successful");

        }catch(\Exception $e)
        {
            toastr()->error("Modification failed");
        }
        return redirect()->route('students');


    }

    public function deleteStudent($student_id)
    {
        try {
            Student::find($student_id)->delete();
            toastr()->success("Supprimer successful");
        }catch(\Exception $e)
        {
            toastr()->error("Supprimer failed");
        }

        return redirect()->route('students');
    }

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


       }catch(\Exception $e){
            toastr()->error("Eleve n'est pas ajouter");

       }
       return redirect()->route('students');

    }



    public function render()
    {
        if(!empty($this->search))
        {
            $eleves = Student::where('matricule', 'like', '%' . $this->search . '%')->orWhere('nom', 'like', '%' . $this->search . '%')->orWhere('prenom', 'like', '%' . $this->search . '%')->orWhere('naissance', 'like', '%' . $this->search . '%')->paginate(5);
        }else{

            $eleves = Student::latest()->paginate(5);
        }

        return view('livewire.eleve-show', compact('eleves'));
    }
}
