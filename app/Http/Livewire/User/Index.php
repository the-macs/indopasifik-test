<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'storeUser' => 'render',
        'updateUser' => 'render',
        'updateUser' => 'backToCreate',
    ];

    public $search;

    public $isEdit;

    public $userId;

    public function mount()
    {
        $this->isEdit = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.user.index', compact('users'));
    }

    public function edit($id)
    {
        $this->isEdit = true;

        $this->userId = $id;
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
    }

    public function backToCreate()
    {
        $this->isEdit = false;
        $this->resetPage();
    }
}
