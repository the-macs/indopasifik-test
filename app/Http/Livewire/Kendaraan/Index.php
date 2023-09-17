<?php

namespace App\Http\Livewire\Kendaraan;

use App\Models\Kendaraan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'storeVehicle' => 'render',
        'updateVehicle' => 'render',
        'updateVehicle' => 'backToCreate',
    ];

    public $search;

    public $isEdit;

    public $vehicleId;

    public function render()
    {
        $vehicles = Kendaraan::where('merk', 'like', '%' . $this->search . '%')
            ->orWhere('jenis', 'like', '%' . $this->search . '%')
            ->orWhere('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nopol', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.kendaraan.index', compact('vehicles'));
    }

    public function edit($id)
    {
        $this->isEdit = true;

        $this->vehicleId = $id;
    }

    public function delete($id)
    {
        Kendaraan::where('id', $id)->delete();
    }

    public function backToCreate()
    {
        $this->isEdit = false;
        $this->resetPage();
    }
}
