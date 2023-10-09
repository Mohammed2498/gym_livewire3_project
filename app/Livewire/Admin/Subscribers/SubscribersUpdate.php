<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubscribersUpdate extends Component
{
    use WithFileUploads;
    public $name, $image, $phone, $gender, $subscriber;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|image',
            'phone' => 'required|numeric',
            'gender' => 'required',
        ];
    }

    public $listeners = ['subscriberUpdate'];

    public function subscriberUpdate($id)
    {
        $this->subscriber = Subscriber::findOrFail($id);
        $this->name = $this->subscriber->name;
        $this->phone = $this->subscriber->phone;
        $this->gender = $this->subscriber->gender;
        $this->resetValidation();
        $this->dispatch('updateModalToggle');
    }

    public function submit()
    {
        $data = $this->validate();
        if ($this->image) {
            if ($this->subscriber->image !== 'storage/subscribers/user-image.png') {
                unlink($this->subscriber->image);
            }
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('subscribers', $imageName, 'public');
            $data['image'] = 'storage/subscribers/' . $imageName;
        } else {
            // If no new image is selected, keep the existing image
            $data['image'] = $this->subscriber->image;
        }

        $this->subscriber->update($data);
        $this->resetInputFields();
        $this->dispatch('updateModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }
    public function render()
    {
        return view('admin.subscribers.subscribers-update');
    }

    public function resetInputFields()
    {
        return $this->reset(['name', 'image', 'phone', 'gender', 'subscriber']);
    }
}
