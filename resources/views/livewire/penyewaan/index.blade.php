<div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-5">
                        <div class="card-header">
                            <strong>Form Input</strong>
                        </div>
                        @livewire('penyewaan.create')
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Sewa Table</strong>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="col-md-12 mr-auto">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model.debounce.500ms="search" placeholder="Search...">
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr class=" text-center">
                                            <th>Tgl. Sewa</th>
                                            <th>Nopol</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Merk</th>
                                            <th>Harga Sewa</th>
                                            <th>Status</th>
                                            <th>Act</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($sewas) > 0)
                                            @foreach ($sewas as $sewa)
                                                <tr>
                                                    <td>{{ $sewa->tgl_awal_sewa }}</td>
                                                    <td>{{ $sewa->nopol }}</td>
                                                    <td>{{ $sewa->nama }}</td>
                                                    <td>{{ $sewa->jenis }}</td>
                                                    <td>{{ $sewa->merk }}</td>
                                                    <td class="text-end">{{ number_format($sewa->harga_sewa, 0) }}
                                                    <td class="text-center">
                                                        @if (is_null($sewa->tgl_akhir_sewa))
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-secondary">Returned</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (is_null($sewa->tgl_akhir_sewa))
                                                            <form
                                                                wire:submit.prevent="returnVehicle({{ $sewa->id_sewa }})"
                                                                class="d-inline-block">
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning"
                                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                                                    onclick="return confirm('Sure to process ?')">Return</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="99" class="text-center"><em>No Data</em></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $sewas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
