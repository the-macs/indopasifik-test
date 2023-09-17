<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;

    public function render()
    {
        return view('livewire.user.create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        try {
            $this->insertUser();

            $this->emit('storeUser');
            $this->reset();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function insertUser()
    {
        $array = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ];

        User::create($array);
    }
}
