<div class="card-body">
    <form wire:submit.prevent="store">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="merkForm" class="form-label">Merk</label>
                <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merkForm"
                    placeholder="Merk" wire:model="merk">
                @error('merk')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="jenisForm" class="form-label">Jenis</label>
                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenisForm"
                    placeholder="Jenis" wire:model="jenis">
                @error('jenis')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="namaForm" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaForm"
                    placeholder="Nama" wire:model="nama">
                @error('nama')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="nopolForm" class="form-label">Nopol</label>
                <input type="text" class="form-control @error('nopol') is-invalid @enderror" id="nopolForm"
                    placeholder="Nopol" wire:model="nopol">
                @error('nopol')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Sure to create?')">Submit</button>
    </form>
</div>
