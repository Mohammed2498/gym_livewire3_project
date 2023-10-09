<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;

class PlansCreate extends Component
{

    public $name, $price, $sport_type, $gender;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'sport_type' => 'required',
            'gender' => 'required ',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        Plan::create($data);
        $this->resetInputFields();
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(PlansData::class);
    }

    public function render()
    {
        return view('admin.plans.plans-create');
    }

    public function resetInputFields()
    {
        return $this->reset([
            'name',
            'price',
            'sport_type',
            'gender',
        ]);
    }
}
