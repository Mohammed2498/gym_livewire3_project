<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;

class SettingsUpdate extends Component
{
    public $settings;

    public function mount()
    {
        $this->settings = Setting::find(1);
    }

    public function rules()
    {
        return [
            'settings.body_building_male_price' => 'required|numeric',
            'settings.body_building_female_price' => 'required|numeric',
            'settings.fitness_male_price' => 'required|numeric',
            'settings.fitness_female_price' => 'required|numeric',
        ];
    }

    public function update()
    {
        $this->validate();
        $this->settings->save();
        session()->flash('success', 'Settings Updated Successfully');
    }
    
    public function render()
    {
        return view('admin.settings.settings-update');
    }
}
