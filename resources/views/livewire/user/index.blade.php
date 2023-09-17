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
                            @livewire('user.edit', ['userId' => $userId], key($userId))
                        @else
                            @livewire('user.create')
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>User Table</strong>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Act.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($users) > 0)
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary d-inline-block"
                                                            wire:click='edit({{ $user->id }})'
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button>
                                                        <form wire:submit.prevent="delete({{ $user->id }})"
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
                                {{ $users->links() }}

                                <p class="text-muted"><em>* Default password is 'password'</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
