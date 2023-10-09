<?php

namespace App\Livewire\Admin\Subscriptions;

use App\Livewire\Admin\Subscribers\SubscribersData;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Subscriber;
use App\Models\Subscription;
use Carbon\Carbon;
use Livewire\Component;

class SubscriptionsCreate extends Component
{

    public $plan_id, $subtype, $sport_type, $start_date, $end_date,
        $duration = 1, $subscriber_id, $status, $subscription_price = 0, $plans;

    public $custom_subscription_price;
    public $custom_start_date, $custom_end_date;

    public $payment_amount, $payment_status, $subscription_id, $remaining_payment, $manual_payment_amount;

    protected $listeners = [
        'subscriptionCreate',
    ];

    public function mount()
    {
        $this->updateSubscriptionStatus();
    }

    public function updatedSuptype()
    {
        if ($this->subtype === "specified") {
            $this->resetValidation([
                'duration',
                'plan_id',
            ]);
        } elseif ($this->subtype === "custom") {
            $this->resetValidation([
                'custom_subscription_price',
            ]);
        }

        $this->reset([
            'start_date',
            'end_date',
            'subtype',
            'duration',
            'sport_type',
            'plan_id',
            'subscription_price',
            'custom_subscription_price',
        ]);
    }

    public function rules()
    {
        return [
            'subtype' => 'required|in:specified,custom',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'custom_start_date' => 'nullable|required_if:subtype,custom|date',
            'custom_end_date' => 'nullable|required_if:subtype,custom|date',
            'custom_subscription_price' => 'nullable|required_if:subtype,custom|numeric|min:0',
            'plan_id' => 'nullable|required_if:subtype,specified',
            'duration' => 'nullable|required_if:subtype,specified|integer',
            'sport_type' => 'required_if:subtype,custom|nullable|',
            'status' => 'required',
            'payment_status' => 'required|in:full,partial,not_paid',
            'payment_amount' => 'min:0',
        ];
    }

    public function subscriptionCreate($id)
    {
        $this->subscriber_id = Subscriber::findOrFail($id);
        $this->plans = Plan::where('gender', $this->subscriber_id->gender)->get();
        $this->dispatch('createSubscriptionModalToggle');
    }

    public function submit()
    {

        if ($this->subtype === "specified") {
            $this->validate([
                'plan_id' => 'required',
            ], [
                'plan_id.required' => 'يجب اختيار خطة الاشتراك'
            ]);
            $plan = Plan::findOrFail($this->plan_id);
            $planPrice = $plan->price;
            $this->start_date = Carbon::now();
            $this->end_date = $this->start_date->copy()->addMonths($this->duration);
            $this->subscription_price = $this->duration * $planPrice;
        } elseif ($this->subtype === "custom") {
            $this->start_date = $this->custom_start_date;
            $this->end_date = $this->custom_end_date;
            $this->subscription_price = $this->custom_subscription_price;
            $this->plan_id = null;
            $this->duration = 0;
        }

        $this->status = now()->greaterThanOrEqualTo($this->end_date) ? 'expired' : 'active';
        $data = $this->validate();

        $data = [
            'subscription_price' => $this->subscription_price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'duration' => $this->duration,
            'subtype' => $this->subtype,
            'subscriber_id' => $this->subscriber_id->id,
            'sport_type' => $this->sport_type,
            'plan_id' => $this->plan_id,
            'status' => $this->status,
        ];

        $subscription = Subscription::create($data);

        if ($this->payment_status === "full") {
            $this->remaining_payment = 0;
            $this->payment_amount = $this->subscription_price;
        } elseif ($this->payment_status === "partial") {
            $this->payment_amount = $this->manual_payment_amount;
            $this->remaining_payment = $this->subscription_price - $this->payment_amount;
            $this->validate([
                'manual_payment_amount' => ['required', 'numeric', 'min:1', 'max:' . $this->subscription_price],
            ]);
        } else {
            $this->payment_amount = 0;
            $this->remaining_payment = $this->subscription_price;
        }

        Payment::create([
            'subscription_id' => $subscription->id,
            'payment_amount' => $this->payment_amount,
            'remaining_payment' => $this->remaining_payment,
            'payment_status' => $this->payment_status,
        ]);

        $this->dispatch('createSubscriptionModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
        $this->resetInputFields();
    }


    public function render()
    {
        return view('admin.subscriptions.subscriptions-create');
    }

    public function calculateTotalPrice()
    {
        $this->validate([
            'duration' => 'required',
            'plan_id' => 'required',
        ], [
            'duration.required' => 'يرجى تحديد مدة الاشتراك',
            'plan_id.required' => 'يجب اختيار خطة الاشتراك'
        ]);
        $plan = Plan::findOrFail($this->plan_id);
        $planPrice = $plan->price;
        $this->subscription_price = $planPrice * $this->duration;
    }

    public function updateSubscriptionStatus()
    {
        $subscriptions = Subscription::all();
        foreach ($subscriptions as $subscription) {
            $subscription->status = now()->greaterThanOrEqualTo($subscription->end_date) ? 'expired' : 'active';
            $subscription->save();
        }
    }

    public function resetInputFields()
    {
        $this->reset([
            'start_date',
            'end_date',
            'subtype',
            'duration',
            'sport_type',
            'plan_id',
            'subscription_price',
            'custom_subscription_price',
        ]);
    }
}
