<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CareMeasure;
use App\Models\UserCareMeasure;
use App\Models\Reason;
use App\Models\Status;
use App\Models\ReasonStatus;
use App\Models\User;

class PreventiveCareMeasureForm extends Component
{
    public $preventiveCareMeasures, $activePreventiveCareMeasure, $clickedPreventiveCareMeasure;
    public $patients, $activePatient;
    public $statuses, $status, $activeStatus;
    public $reasons, $reason;
    public $date, $location, $transportation, $other;

    protected $rules = [
        'activePatient' => 'required',
        'activePreventiveCareMeasure' => 'required',
        'status' => 'required',
    ];

    private function resetInputFields(){
        $this->status = '';
        $this->reason = '';
        $this->activeStatus = '';
    }

    public function render()
    {
        $this->preventiveCareMeasures = CareMeasure::latest()->get();
        $this->activePreventiveCareMeasure = $this->clickedPreventiveCareMeasure ? $this->clickedPreventiveCareMeasure : CareMeasure::first();

        $this->statuses = Status::latest()->get();
        $this->reasons = $this->status ? Status::find($this->status)->reasons : $this->statuses->first()->reasons;
        $this->patients = User::patient()->latest()->get();
        $this->activePatient = $this->activePatient ? User::find($this->activePatient) : User::patient()->first();

        return view('livewire.preventive-care-measure-form')
            ->extends('layouts.app');
    }

    public function clickPreventiveCareMeasure($preventiveCareMeasureId)
    {
        $this->resetInputFields();
        $this->clickedPreventiveCareMeasure = $this->activePreventiveCareMeasure ? CareMeasure::find($preventiveCareMeasureId) : CareMeasure::first();
        $this->activePatient = User::find($this->activePatient->id)->id;
        $currentPatientPreventiveCareRecord = User::find($this->activePatient)->preventiveCareMeasures()
            ->where('care_measure_id', $this->clickedPreventiveCareMeasure->id)
            ->first();
        if ($currentPatientPreventiveCareRecord) {
            $this->activeStatus = ReasonStatus::find($currentPatientPreventiveCareRecord->pivot->reason_status_id)->status_id;
        }
    }

    public function saveNote()
    {
        $this->validate();
        $this->resetInputFields();
        //TODO
    }

    public function cancel()
    {
        $this->resetInputFields();
    }
}
