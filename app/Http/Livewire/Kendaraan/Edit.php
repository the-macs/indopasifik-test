<?php

namespace App\Http\Livewire\Kendaraan;

use App\Models\Kendaraan;
use Livewire\Component;

class Edit extends Component
{
    public $vehicle;

    public $vehicleId;

    public $merk;
    public $jenis;
    public $nama;
    public $nopol;

    public $counter;

    public function mount()
    {
        $this->vehicle = Kendaraan::find($this->vehicleId);

        $this->merk = $this->vehicle->merk;
        $this->jenis = $this->vehicle->jenis;
        $this->nama = $this->vehicle->nama;
        $this->nopol = $this->vehicle->nopol;

        $this->counter++;
    }

    public function render()
    {
        return view('livewire.kendaraan.edit');
    }

    public function update()
    {
        $this->validate([
            'merk' => 'required|string',
            'jenis' => 'required|string',
            'nama' => 'required|string',
            'nopol' => 'required|string|unique:m_kendaraan,nopol,' . $this->vehicleId,
        ]);

        try {
            $this->updateVehicle();

            $this->emit('updateVehicle');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function updateVehicle()
    {
        $array = [
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'nama' => $this->nama,
            'nopol' => $this->nopol,
        ];

        Kendaraan::where('id', $this->vehicleId)->update($array);
    }

    public function backToCreate()
    {
        $this->emit('updateVehicle');
    }
}
