<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Payment;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYears;
use Livewire\WithPagination;

class ShowPayment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $matricule;
    public $student_id;
    public $montant;
    public $fullname;
    public $schoolyear;
    public $haveError = false;


    public function store()
    {
        $totalPaid = 0;
        //Recuperer l'anne en cours
        $activeschoolYear = SchoolYears::where('active', '1')->first();

        $getClasse = Inscription::where('student_id', '=', $this->student_id)->where('school_years_id', $activeschoolYear->id)->first();

        //Recuperer le montant de la scolarite en fonction du niveau de la classe

        $studentClasseId = $getClasse->classe_id;

        $classeData = Classe::with('level')->find($studentClasseId);

        $montantScolarite = $classeData->level->scolarite;

        //Faire cumul des paiements deja effectuer et le comparer au montant de la scolarite
        $studentPayment = Payment::where('student_id', $this->student_id)->where('school_year_id', $activeschoolYear->id)->get();

        foreach($studentPayment as $studentPayment)
        {
            $totalPaid = $totalPaid + $studentPayment->montant;
        }

        //Verifier si le montant total  de la scolarite n'est pas inferieur au montant deja paye + le montant du paiement en cours

        if(($totalPaid + $this->montant) > $montantScolarite)
        {
            toastr()->error("Le montant saisie depasse la scolarite. Il reste a paye". " " .$montantScolarite - $totalPaid. ' Fcfa');
            $this->haveError = true;

        }

        if(!$this->haveError)
        {
            $this->validate([
                'matricule' => 'string|required',
                'montant' => 'integer|required',
            ]);

            try {

                //Recuperer l'id de la classe
                $getClasse = Inscription::where('student_id', '=', $this->student_id)->where('school_years_id', $activeschoolYear->id)->first();

                $payments = new Payment();
                $payments->student_id = $this->student_id;
                $payments->classe_id = $getClasse->classe_id;
                $payments->school_year_id = $activeschoolYear->id;
                $payments->montant = $this->montant;
                $payments->save();

                // dd($payments);

                toastr()->success('Succes',"Paiement de scolarite successful");
                return redirect()->route("paiement");

             }catch (\Exception $e) {
                 toastr()->error($e);
                 return redirect()->route("paiement");

             }
        }

    }

    public function render()
    {

        $paiements = Payment::paginate(10);


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

        return view('livewire.show-payment', compact('paiements'));
    }
}
