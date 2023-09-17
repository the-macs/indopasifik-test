<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public $userId;

    public $name;
    public $email;

    public $counter;

    public function mount()
    {
        $this->user = User::find($this->userId);

        $this->name = $this->user->name;
        $this->email = $this->user->email;

        $this->counter++;
    }

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        try {
            $this->updateUser();

            $this->emit('updateUser');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function updateUser()
    {
        $array = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        User::where('id', $this->userId)->update($array);
    }

    public function backToCreate()
    {
        $this->emit('updateUser');
    }
}
