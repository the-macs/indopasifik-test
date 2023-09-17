<div class="card-body">
    <form wire:submit.prevent="store">
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Kendaraan</label>
                <select class="form-select mb-3 @error('id_titip') is-invalid @enderror" aria-label="Large select example"
                    wire:model="id_titip" required>
                    <option hidden>--- Kendaraan ---</option>
                    @foreach ($titips as $titip)
                        <option value="{{ $titip->id }}">{{ $titip->nama . ' (' . $titip->nopol . ')' }}</option>
                    @endforeach
                </select>
                @error('id_titip')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="tglSewaForm" class="form-label">Tgl. Sewa</label>
                <input type="date" class="form-control @error('tgl_sewa') is-invalid @enderror" id="tglSewaForm"
                    wire:model="tgl_sewa" required>
                @error('tgl_sewa')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Sure to create?')">Submit</button>
    </form>
</div>
