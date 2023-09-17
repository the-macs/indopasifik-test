<div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-1">
                        <div class="card-header">
                            <strong>Status Kendaraan</strong>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-success text-white">
                                    Vehicle Ready
                                    <span class="badge bg-secondary rounded-pill">{{ $count_ready_vehicle }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-primary text-white">
                                    Rented Vehicle
                                    <span class="badge bg-secondary rounded-pill">{{ $count_rented_vehicle }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-header">
                            <strong>Form Input</strong>
                        </div>
                        @livewire('penitipan.create')
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Titip Table</strong>
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
                                            <th>Tgl. Titip</th>
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
                                        @if (count($titips) > 0)
                                            @foreach ($titips as $titip)
                                                <tr>
                                                    <td>{{ $titip->tgl_titip }}</td>
                                                    <td>{{ $titip->nopol }}</td>
                                                    <td>{{ $titip->nama }}</td>
                                                    <td>{{ $titip->jenis }}</td>
                                                    <td>{{ $titip->merk }}</td>
                                                    <td class="text-end">{{ number_format($titip->harga_sewa, 0) }}
                                                    <td class="text-center">
                                                        @if (is_null($titip->tgl_berakhir))
                                                            @if (is_null($titip->id_sewa))
                                                                <span class="badge bg-success">Ready</span>
                                                            @else
                                                                <span class="badge bg-primary">On Rent</span>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-secondary">Returned</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <button type="button" class="btn btn-secondary"
                                                            wire:click='edit({{ $titip->id }})'
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button> --}}
                                                        @if (is_null($titip->tgl_berakhir) && is_null($titip->id_sewa))
                                                            <form
                                                                wire:submit.prevent="returnVehicle({{ $titip->id }})"
                                                                class="d-inline-block">
                                                                <button type="submit" class="btn btn-warning"
                                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                                                    onclick="return confirm('Sure to process ?')">Return</button>
                                                        @endif
                                                        </form>
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
                                {{ $titips->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
