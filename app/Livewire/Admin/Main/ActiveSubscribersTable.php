<?php

namespace App\Livewire\Admin\Main;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class ActiveSubscribersTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $active_subscribers = Subscriber::with(['subscriptions' => function ($query) {
            $query->where('status', 'active')->latest();
        }])->whereHas('subscriptions', function ($query) {
            $query->where('status', 'active');
        })->where('name', 'like', '%' . $this->search . '%')->paginate(3);
        foreach ($active_subscribers as $subscriber) {
            $subscriber->subscriptions = $subscriber->subscriptions->last();
        }
        return view('admin.main.active-subscribers-table', ['active_subscribers' => $active_subscribers,]);
    }
}
