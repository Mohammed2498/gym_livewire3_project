<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;

class PlansDelete extends Component
{
    public $plan;
    public $listeners = ['planDelete'];

    public function planDelete($id)
    {
        $this->plan = Plan::findOrFail($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {

        $this->plan->delete();
        $this->reset('plan');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(PlansData::class);
    }

    public function render()
    {
        return view('admin.plans.plans-delete');
    }
}
