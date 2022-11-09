@extends('auth.template-auth')

@section('title','login pegawai')

@section('content')

    <!-- REGISTRASI -->
    <div class="row center-vertical">
        <div class="col-md-4"></div>
        <div class="bg-white col-md-4 shadow align-middle p-4">

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="" action="{{route('login-admin')}}" method="post">
                @csrf

                <h2 class="text-center">Login Admin</h2>
                <!-- USERNAME -->
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror "
                        id="username"
                        name="email"
                        aria-describedby="emailHelp"
                        placeholder="isi emailmu"
                        required/>
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <!-- PASSWORD -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror "
                        aria-describedby="passwordHelpBlock"
                        placeholder="isi passwordmu"
                        required/>
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    {{--                    <div class="invalid-feedback">--}}
                    {{--                    </div>--}}

                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <!-- REGISTRASI -->
                <div class="d-grid">
                    <button type="submit" id="registrasi" class="btn btn-dark text-center">
                        login
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: {{session('error')}}
            })
        </script>
    @endif
@endsection
