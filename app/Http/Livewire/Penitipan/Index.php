<?php

namespace App\Http\Livewire\Penitipan;

use App\Models\TransSewa;
use App\Models\TransTitip;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'storeTitip' => 'render',
    ];

    public $search;

    public $titipId;

    public function render()
    {
        $titips = TransTitip::join('m_kendaraan', 'm_kendaraan.id', '=', 'trans_titip.id_kendaraan')
            ->leftJoin('trans_sewa', function ($join) {
                $join->on('trans_sewa.id_titip', '=', 'trans_titip.id');
                $join->whereNull('tgl_akhir');
            })
            ->where('merk', 'like', '%' . $this->search . '%')
            ->orWhere('jenis', 'like', '%' . $this->search . '%')
            ->orWhere('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nopol', 'like', '%' . $this->search . '%')
            ->orderBy('m_kendaraan.merk')
            ->orderBy('m_kendaraan.jenis')
            ->select(
                'trans_titip.id',
                'trans_titip.id_kendaraan',
                'trans_titip.tgl_titip',
                'trans_titip.harga_sewa',
                'trans_titip.tgl_berakhir',
                'm_kendaraan.merk',
                'm_kendaraan.jenis',
                'm_kendaraan.nama',
                'm_kendaraan.nopol',
                'trans_sewa.id as id_sewa',
            )
            ->paginate(10);

        $count_ready_vehicle = TransTitip::leftJoin('trans_sewa', function ($join) {
            $join->on('trans_sewa.id_titip', '=', 'trans_titip.id');
            $join->whereNull('tgl_akhir');
        })->whereNull('trans_sewa.id')->count();

        $count_rented_vehicle = TransTitip::leftJoin('trans_sewa', function ($join) {
            $join->on('trans_sewa.id_titip', '=', 'trans_titip.id');
            $join->whereNull('tgl_akhir');
        })->whereNotNull('trans_sewa.id')->count();

        return view('livewire.penitipan.index', compact('titips', 'count_ready_vehicle', 'count_rented_vehicle'));
    }

    public function returnVehicle($id)
    {
        TransTitip::where('id', $id)->update(['tgl_berakhir' => date('Y-m-d H:i:s')]);

        $this->emit('returnVehicle');
    }
}
