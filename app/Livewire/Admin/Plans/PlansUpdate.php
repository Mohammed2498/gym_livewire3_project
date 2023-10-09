<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;

class PlansUpdate extends Component
{

    public $name, $price, $sport_type, $gender, $plan;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'sport_type' => 'required',
            'gender' => 'required ',
        ];
    }

    public $listeners = ['planUpdate'];
    public function planUpdate($id)
    {

        $this->plan = Plan::findOrFail($id);
        $this->name = $this->plan->name;
        $this->sport_type = $this->plan->sport_type;
        $this->gender = $this->plan->gender;
        $this->price = $this->plan->price;

        $this->resetValidation();
        $this->dispatch('updateModalToggle');
    }

    public function submit()
    {
        $data = $this->validate();
        $this->plan->update($data);
        $this->resetInputFields();
        $this->dispatch('updateModalToggle');
        $this->dispatch('refreshData')->to(PlansData::class);
    }

    public function render()
    {
        return view('admin.plans.plans-update');
    }

    public function resetInputFields()
    {
        return $this->reset(['name', 'gender', 'plan', 'sport_type', 'price']);
    }
}
