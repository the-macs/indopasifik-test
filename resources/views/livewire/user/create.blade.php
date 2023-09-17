<div class="card-body">
    <form wire:submit.prevent="store">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="nameForm" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameForm"
                    placeholder="Name" wire:model="name">
                @error('name')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="emailForm" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailForm"
                    placeholder="name@example.com" wire:model="email">
                @error('email')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Sure to create?')">Submit</button>
    </form>
</div>
