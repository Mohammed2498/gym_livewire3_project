<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribersShow extends Component
{

    public $subscriber;
//    public $name, $phone, $image, $gender;
//    public $start_date, $end_date, $subscription_price, $status,
//        $subscriber_id, $plan_id, $sport_type, $subtype, $duration;
    protected $listeners = ['subscriberShow'];


    public function subscriberShow($id)
    {
        $this->subscriber = Subscriber::with('subscriptions')->findOrFail($id);
//        $this->name = $this->subscriber->name;
//        $this->image = $this->subscriber->image;
//        $this->phone = $this->subscriber->phone;
//        $this->gender = $this->subscriber->gender;
//        $this->start_date=$this->subscriber->subscriptions()->start_date;
        $this->dispatch('showModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }

    public function render()
    {

        return view('admin.subscribers.subscribers-show');
    }
}
