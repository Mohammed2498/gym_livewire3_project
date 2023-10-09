<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubscribersCreate extends Component
{
    use WithFileUploads;

    public $name, $image, $phone, $gender;
    public $showModal = true;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|image',
            'phone' => 'required|numeric',
            'gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المشترك مطلوب',
            'phone.required' => 'رقم الجوال مطلوب',
            'gender.required' => 'يرجى اختيار جنس المشترك',
        ];
    }

    public function submit()
    {
        $data = $this->validate($this->rules(), $this->messages(), []);
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('subscribers', $imageName, 'public');
            $data['image'] = 'storage/subscribers/' . $imageName;
        } else {
            $data['image'] = 'storage/subscribers/user-image.png';
        }

        Subscriber::create($data);
        $this->resetInputFields();
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }


    public function render()
    {
        return view('admin.subscribers.subscribers-create');
    }

    public function resetInputFields()
    {
        return $this->reset(['name', 'image', 'phone', 'gender']);
    }

}
