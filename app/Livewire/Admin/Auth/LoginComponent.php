<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class LoginComponent extends Component
{
    public $email;
    public $password;
    public $remember;

    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required',
            'remember' => 'nullable',
        ];
    }

    public function login()
    {
        $this->validate();

        if (!Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        return to_route('admin.main');
    }
    public function render()
    {
        return view('admin.auth.login-component');
    }
}
