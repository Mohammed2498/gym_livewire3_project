<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Plan;
use App\Models\Subscriber;
use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersData extends Component
{
    use WithPagination;

    public $search;
    public $status_filter = 'all';
    public $gender_filter = 'all';

    protected $listeners = ['refreshData' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
//        $subscribers = Subscriber::with('subscriptions')->where('name', 'like', '%' . $this->search . '%')
//            ->paginate(10);

        $subscribers = Subscriber::with('subscriptions')
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->gender_filter !== 'all', function ($query) {
                $query->where('gender', $this->gender_filter);
            })->when($this->status_filter !== 'all', function ($query) {
                $query->whereHas('subscriptions', function ($query) {
                    $query->where('status', $this->status_filter);
                });
            })
            ->paginate(10);

        foreach ($subscribers as $subscriber) {
            $subscriber->subscriptions = $subscriber->subscriptions->last();
        }

        return view('admin.subscribers.subscribers-data', [
            'subscribers' => $subscribers,
        ]);
    }
}
