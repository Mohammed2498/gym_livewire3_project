<?php

namespace App\Livewire\Admin\Subscriptions;

use App\Livewire\Admin\Subscribers\SubscribersData;
use App\Models\Subscriber;
use Livewire\Component;

class SubscriptionsUpdatePayment extends Component
{
    public $subscriber_id;
    public $updatedPayment;
    public $remainingPayment;
    public $listeners = ['completeRemainingPayment'];

    public function completeRemainingPayment($id)
    {
        $this->subscriber_id = $id;
        $this->dispatch('updateRemainingPaymentModalToggle');
    }

    public function submit()
    {
        $subscriber = Subscriber::findOrFail($this->subscriber_id);
        $subscription = $subscriber->subscriptions->last();

        $this->validate([
            'updatedPayment' => ['required', 'numeric', 'min:1', 'max:' . $subscription->payment->remaining_payment],
        ]);

        $remainingPayment = $subscription->payment->remaining_payment;

        $newRemainingPayment = $remainingPayment - $this->updatedPayment;

        $subscription->payment->payment_amount += $this->updatedPayment;


        if (abs($newRemainingPayment) < 0.01) {
            $subscription->payment->payment_status = 'full';
        } else {
            $subscription->payment->payment_status = 'partial';
        }

        $subscription->payment->remaining_payment = $newRemainingPayment;

        $subscription->payment->save();

        $this->remainingPayment = $newRemainingPayment;
        $this->reset(['updatedPayment']);
        $this->dispatch('updateRemainingPaymentModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }

    public function render()
    {
        return view('admin.subscriptions.subscriptions-update-payment');
    }
}
