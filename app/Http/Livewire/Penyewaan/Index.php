<?php

namespace App\Http\Livewire\Penyewaan;

use App\Models\TransSewa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'storeSewa' => 'render',
    ];

    public $search;

    public $sewaId;

    public function render()
    {
        $sewas = TransSewa::join('trans_titip', 'trans_titip.id', '=', 'trans_sewa.id_titip')
            ->join('m_kendaraan', 'm_kendaraan.id', '=', 'trans_titip.id_kendaraan')
            ->where('merk', 'like', '%' . $this->search . '%')
            ->orWhere('jenis', 'like', '%' . $this->search . '%')
            ->orWhere('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nopol', 'like', '%' . $this->search . '%')
            ->orderBy('m_kendaraan.merk')
            ->orderBy('m_kendaraan.jenis')
            ->select(
                'trans_titip.harga_sewa',
                'm_kendaraan.merk',
                'm_kendaraan.jenis',
                'm_kendaraan.nama',
                'm_kendaraan.nopol',
                'trans_sewa.id AS id_sewa',
                'trans_sewa.tgl_awal AS tgl_awal_sewa',
                'trans_sewa.tgl_akhir AS tgl_akhir_sewa',
            )
            ->paginate(10);

        return view('livewire.penyewaan.index', compact('sewas'));
    }

    public function returnVehicle($id)
    {
        TransSewa::where('id', $id)->update(['tgl_akhir' => date('Y-m-d H:i:s')]);

        $this->emit('returnVehicle');
    }
}
