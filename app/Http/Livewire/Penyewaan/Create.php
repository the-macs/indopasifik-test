<?php

namespace App\Http\Livewire\Penyewaan;

use App\Models\TransSewa;
use App\Models\TransTitip;
use Livewire\Component;

class Create extends Component
{
    public $id_titip;
    public $tgl_sewa;

    protected $listeners = [
        'returnVehicle' => 'render',
    ];

    public function render()
    {
        $titips = TransTitip::join('m_kendaraan', 'm_kendaraan.id', '=', 'trans_titip.id_kendaraan')
            ->whereNotIn('trans_titip.id', function ($query) {
                $query->select('id_titip')
                    ->from(with(new TransSewa())->getTable())
                    ->whereNull('tgl_akhir');
            })
            ->select(
                'trans_titip.id',
                'm_kendaraan.nama',
                'm_kendaraan.nopol'
            )
            ->paginate(10);

        return view('livewire.penyewaan.create', compact('titips'));
    }

    public function store()
    {
        $this->validate([
            'id_titip' => 'required|integer',
            'tgl_sewa' => 'required|date',
        ]);

        try {
            $this->insertSewa();

            $this->emit('storeSewa');
            $this->reset();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    private function insertSewa()
    {
        $array = [
            'id_titip' => $this->id_titip,
            'tgl_awal' => $this->tgl_sewa,
        ];

        TransSewa::create($array);
    }
}
