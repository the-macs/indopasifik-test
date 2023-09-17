<div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-5">
                        <div class="card-header">
                            <strong>Form Input</strong>
                        </div>
                        @if ($isEdit)
                            @livewire('kendaraan.edit', ['vehicleId' => $vehicleId], key($vehicleId))
                        @else
                            @livewire('kendaraan.create')
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Kendaraan Table</strong>
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
                                        <tr>
                                            <th>Merk</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>Nopol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($vehicles) > 0)
                                            @foreach ($vehicles as $vehicle)
                                                <tr>
                                                    <td>{{ $vehicle->merk }}</td>
                                                    <td>{{ $vehicle->jenis }}</td>
                                                    <td>{{ $vehicle->nama }}</td>
                                                    <td>{{ $vehicle->nopol }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary"
                                                            wire:click='edit({{ $vehicle->id }})'
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button>
                                                        <form wire:submit.prevent="delete({{ $vehicle->id }})"
                                                            class="d-inline-block">
                                                            <button type="submit" class="btn btn-warning"
                                                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                                                onclick="return confirm('Sure to delete ?')">Delete</button>
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
                                {{ $vehicles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
