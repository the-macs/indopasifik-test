<?php

namespace App\Http\Livewire\Penitipan;

use App\Models\Kendaraan;
use App\Models\TransTitip;
use Livewire\Component;

class Create extends Component
{
    public $id_kendaraan;
    public $tgl_titip;
    public $harga_sewa;

    protected $listeners = [
        'returnVehicle' => 'render',
    ];

    public function render()
    {
        $vehicles = Kendaraan::whereNotIn('id', function ($query) {
            $query->select('id_kendaraan')
                ->from(with(new TransTitip())->getTable())
                ->whereNull('tgl_berakhir');
        })->get();

        return view('livewire.penitipan.create', compact('vehicles'));
    }

    public function store()
    {
        $this->validate([
            'id_kendaraan' => 'required|integer',
            'tgl_titip' => 'required|date',
            'harga_sewa' => 'required|integer',
        ]);

        try {
            $this->insertTitip();

            $this->emit('storeTitip');
            $this->reset();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    private function insertTitip()
    {
        $array = [
            'id_kendaraan' => $this->id_kendaraan,
            'tgl_titip' => $this->tgl_titip,
            'harga_sewa' => $this->harga_sewa,
        ];

        TransTitip::create($array);
    }
}
