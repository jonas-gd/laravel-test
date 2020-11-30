<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Numbers;
use App\Models\Customers;
use App\Models\NumberPreferences;

class Number extends Component
{

    public $customer, $numbers, $customer_id, $number, $status, $selected_id;
    public $updateMode = false;
    protected $rules = ['number' => 'required|string|min:8|max:14', 'status' => 'required'];

    public function render()
    {
        $this->numbers = Numbers::where('customer_id',$this->customer->id)->orderBy('id')->get();
        return view('livewire.number');
    }

    public function mount($id)
    {
        $this->customer = Customers::findOrFail($id);
    }

    private function resetInputFields(){
        $this->number = '';
        $this->status = '';
    }

    public function store()
    {
        $number = Numbers::create(array_merge(['customer_id'=>$this->customer->id],$this->validate()));

        NumberPreferences::create(['number_id'=>$number->id,'name'=>'auto_attendant','value'=>1]);
        NumberPreferences::create(['number_id'=>$number->id,'name'=>'voicemail_enabled','value'=>1]);

        session()->flash('message', 'Number add Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $number = Numbers::findOrFail($id);
        $this->number = $number->number;
        $this->status = $number->status;
        $this->customer_id = $number->customer_id;
        $this->selected_id = $number->id;
    }

    public function showPreferences($id){
        $this->edit($id);
        $this->emit('showPreferencesNumber',$id);
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->emit('closePreferences');
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $number = Numbers::findOrFail($this->selected_id);
            
            $number->update([
                'number' => $this->number,
                'status' => $this->status
            ]);

            $this->updateMode = false;
            session()->flash('message', 'Number Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        if($id){
            Numbers::where('id',$id)->delete();
            session()->flash('message', 'Number Deleted Successfully.');
        }
    }
}
