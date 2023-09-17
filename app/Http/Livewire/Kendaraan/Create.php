<?php

namespace App\Http\Livewire\Kendaraan;

use App\Models\Kendaraan;
use Livewire\Component;

class Create extends Component
{
    public $merk;
    public $jenis;
    public $nama;
    public $nopol;

    public function render()
    {
        return view('livewire.kendaraan.create');
    }

    public function store()
    {
        $this->validate([
            'merk' => 'required|string',
            'jenis' => 'required|string',
            'nama' => 'required|string',
            'nopol' => 'required|string|unique:m_kendaraan,nopol',
        ]);

        try {
            $this->insertVehicle();

            $this->emit('storeVehicle');
            $this->reset();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function insertVehicle()
    {
        $array = [
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'nama' => $this->nama,
            'nopol' => $this->nopol,
        ];

        Kendaraan::create($array);
    }
}
