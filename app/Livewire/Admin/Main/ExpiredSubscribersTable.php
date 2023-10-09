<?php

namespace App\Livewire\Admin\Main;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ExpiredSubscribersTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $expired_subscribers = Subscriber::with(['subscriptions' => function ($query) {
            $query->where('status', 'expired');
        }])
            ->whereHas('subscriptions', function ($query) {
                $query->where('status', 'expired')->where('end_date', '<', now());
            })
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(3);

        foreach ($expired_subscribers as $subscriber) {
                $subscriber->subscriptions = $subscriber->subscriptions->last();
        }
        return view('admin.main.expired-subscribers-table', ['expired_subscribers' => $expired_subscribers]);
    }
}
