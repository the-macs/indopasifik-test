@extends('_partials.main')

@push('styles')
    <style>
        .btn-color {
            background-color: #0e1c36;
            color: #fff;
        }

        .profile-image-pic {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }

        .cardbody-color {
            background-color: #ebf2fa;
        }

        a {
            text-decoration: none;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card my-5 mx-5">
                    <form class="card-body cardbody-color p-lg-5" action="{{ url('/login') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2023/08/18/01/32/cat-8197577_1280.jpg"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="admin@gmail.com">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password" value="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
