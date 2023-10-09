<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;
use Livewire\WithPagination;

class PlansData extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = ['refreshData' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('admin.plans.plans-data', [
            'data' => Plan::where('name', 'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }
}
