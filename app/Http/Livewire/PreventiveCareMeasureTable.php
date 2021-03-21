<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CareMeasure;
use Illuminate\Support\Str;

class PreventiveCareMeasureTable extends Component
{
    use WithPagination;

    public $search = '';
    public $name, $preventiveCareMeasureId;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|unique:care_measures'
    ];

    public function render()
    {
        return view('livewire.preventive-care-measure-table', [
            'preventiveCareMeasures' => CareMeasure::search($this->search)
            ->latest()
            ->simplePaginate(10),
        ])
        ->extends('layouts.app');
    }

    private function resetInputFields(){
        $this->name = '';
    }

    public function store()
    {
        $this->validate();

        CareMeasure::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->resetInputFields();

        session()->flash('success', 'New preventive care measure was added');
    }

    public function edit($id)
    {
        $preventiveCareMeasure = CareMeasure::findOrFail($id);
        $this->preventiveCareMeasureId = $id;
        $this->name = $preventiveCareMeasure->name;
  
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
  
        $post = CareMeasure::find($this->preventiveCareMeasureId);
        $post->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);
  
        $this->resetInputFields();
        $this->updateMode = false;
  
        session()->flash('message', 'Preventive care measure was successfully.');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
}
