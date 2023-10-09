<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Subscriber;
use Livewire\Component;


class SubscribersDelete extends Component
{
    public $subscriber;
    public $listeners = ['subscriberDelete'];

    public function subscriberDelete($id)
    {
        $this->subscriber = Subscriber::findOrFail($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        if ($this->subscriber->image) {
            if ($this->subscriber->image !== 'storage/subscribers/user-image.png') {
                unlink($this->subscriber->image);
            }
        }
        $this->subscriber->delete();
        $this->reset('subscriber');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }

    public function render()
    {
        return view('admin.subscribers.subscribers-delete');
    }
}
