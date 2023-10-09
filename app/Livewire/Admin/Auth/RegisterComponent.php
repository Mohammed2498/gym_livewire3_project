<?php

namespace App\Livewire\Admin\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
class RegisterComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function register()
    {
        $this->validate();

        $admin = Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        Auth::guard('admin')->login($admin);
        return to_route('admin.main');
    }


    public function render()
    {
        return view('admin.auth.register-component');
    }
}
