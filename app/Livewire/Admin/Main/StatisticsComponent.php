<?php

namespace App\Livewire\Admin\Main;

use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\Subscription;
use Livewire\Component;


class StatisticsComponent extends Component
{

    public $total;

    public function mount()
    {
        $this->totalIncome();
    }

    public function totalIncome()
    {
        return $this->total = Payment::sum('payment_amount');
    }

    public function render()
    {
        $total_subscribers = Subscriber::count();
        $active_subscribers = Subscriber::whereHas('subscriptions', function ($query) {
            $query->where('status', 'active');
        })->count();
        $expired_subscribers = Subscriber::whereHas('subscriptions', function ($query) {
            $query->where('created_at', function ($subQuery) {
                $subQuery->from('subscriptions')
                    ->selectRaw('MAX(created_at)')
                    ->whereColumn('subscriber_id', 'subscriptions.subscriber_id');
            })->where('status', 'expired');
        })->count();
        return view('admin.main.statistics-component',
            ['total_subscribers' => $total_subscribers,
                'active_subscribers' => $active_subscribers,
                'expired_subscribers' => $expired_subscribers
            ]);
    }

}
