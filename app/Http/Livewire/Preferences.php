<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NumberPreferences;

class Preferences extends Component
{

    public $name, $value, $selected_id, $number_id;
    public $updateMode = false;
    public $showPreferences = false;
    public $preferences = [];
    
    protected $rules = ['name' => 'required', 'value' => 'required'];

    protected $listeners = ['showPreferencesNumber','closePreferences'];

    public function render()
    {        
        return view('livewire.preferences');        
    }

    public function mount()
    {
        $this->showPreferences = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->value = '';
    }

    public function store()
    {
        NumberPreferences::create(array_merge(['number_id'=>$this->number_id],$this->validate()));

        session()->flash('message', 'Number add Successfully.');

        $this->resetInputFields();
        $this->showPreferencesNumber($this->number_id);
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function closePreferences()
    {
        $this->showPreferences = false;
        $this->resetInputFields();
    }

    public function showPreferencesNumber($id)
    {
        $this->preferences = NumberPreferences::where('number_id',$id)->orderBy('name')->get();
        $this->number_id = $id;
        $this->showPreferences = true;
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $preference = NumberPreferences::findOrFail($id);
        $this->name = $preference->name;
        $this->value = $preference->value;
        $this->selected_id = $preference->id;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $preference = NumberPreferences::findOrFail($this->selected_id);
            
            $preference->update([
                'name' => $this->name,
                'value' => $this->value
            ]);

            $this->updateMode = false;
            session()->flash('message', 'Number Updated Successfully.');
            $this->resetInputFields();
            $this->showPreferencesNumber($this->number_id);
        }
    }

    public function delete($id)
    {
        if($id){
            NumberPreferences::where('id',$id)->delete();
            $this->showPreferencesNumber($this->number_id);
            session()->flash('message', 'Number Preference Deleted Successfully.');
        }
    }
}
