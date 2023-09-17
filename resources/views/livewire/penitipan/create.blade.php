<div class="card-body">
    <form wire:submit.prevent="store">
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Kendaraan</label>
                <select class="form-select mb-3 @error('id_kendaraan') is-invalid @enderror"
                    aria-label="Large select example" wire:model="id_kendaraan" required>
                    <option hidden>--- Kendaraan ---</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->nama . ' (' . $vehicle->nopol . ')' }}</option>
                    @endforeach
                </select>
                @error('id_kendaraan')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="tglTitipForm" class="form-label">Tgl. Titip</label>
                <input type="date" class="form-control @error('tgl_titip') is-invalid @enderror" id="tglTitipForm"
                    wire:model="tgl_titip" required>
                @error('tgl_titip')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="hargaForm" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror" id="hargaForm"
                    placeholder="Harga Sewa" wire:model="harga_sewa"
                    onkeypress="return restrictCharacters(this, event, integerOnly);" required>
                @error('harga_sewa')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Sure to create?')">Submit</button>
    </form>
</div>
