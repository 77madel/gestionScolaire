<?php

namespace App\Http\Livewire;

use toastr;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\SchoolYears;

class CreateSchoolYear extends Component
{
    public $libelle;

    public function store(SchoolYears $schoolYear)
    {
        $this->validate([
            'libelle' => 'string|required|unique:school_years,school_year',
        ]);

        // try {
            //Pour  recuperer la l'annee en cours
        $currentYear = Carbon::now()->format('Y');

        //Verification si l'annee existe
        $check = SchoolYears::where("current_Year", $currentYear)->get();

        $alreadyExist = $check->count();

        if($alreadyExist >= 1)
        {
            return redirect()->back()->with('error', 'L\' annee en cours a ete ajouter !!!!!!!');
        }else{
            $schoolYear->school_year = $this->libelle;
            $schoolYear->current_Year = $currentYear;

            $schoolYear->save();

            if($schoolYear)
            {
                $schoolYear = "";
            }
            toastr()->success("L\'annee  a ete ajouter");
            return redirect()->route("settings");
        }

        // }catch (\Exception $e) {

        // }

    }

    public function render()
    {
        return view('livewire.create-school-year');
    }
}
