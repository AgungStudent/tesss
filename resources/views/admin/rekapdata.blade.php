@extends('admin.template')

@section('content')
    <!-- masuk desain ( masukan data baru )-->
    <div class="container">
        <h1>Masukan Data Baru</h1>
    </div>

    <form action="{{route('insert-pegawai')}}" method="post">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>

                </tr>
                </thead>
                <tbody>
                @csrf
                <tr>
                    <th scope="row"></th>
                    <td><input type="nama" name="name" class="@error('name') is-invalid @enderror"></td>
                    <td><input type="email" name="email" class="@error('email') is-invalid @enderror"></td>
                    <td><input type="password" name="password" class="@error('password') is-invalid @enderror"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <input type="submit" value="Tambah" class="btn btn-primary">
        </div>
    </form>
    {{--<!-- masuk desain ( update data )-->--}}
    {{--<div class="container">--}}
    {{--    <h1>Update Data Pekerja</h1>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
    {{--    <table class="table">--}}
    {{--        <thead>--}}
    {{--        <tr>--}}

    {{--            <th scope="col">id</th>--}}
    {{--            <th scope="col">Nama</th>--}}
    {{--            <th scope="col">Email</th>--}}
    {{--            <th scope="col">Password</th>--}}

    {{--        </tr>--}}
    {{--        </thead>--}}
    {{--        <tbody>--}}
    {{--        <form action="#" method="post" enctype="multipart/form-data">--}}
    {{--            <tr>--}}

    {{--                <td><input type="text" name="add-id"></td>--}}
    {{--                <td><input type="nama" name="add-nama"></td>--}}
    {{--                <td><input type="email" name="add-email"></td>--}}
    {{--                <td><input type="password" name="add-password"></td>--}}

    {{--            </tr>--}}
    {{--        </tbody>--}}
    {{--    </table>--}}
    {{--</div>--}}

    {{--<div class="container">--}}
    {{--    <a class="btn btn-primary" href="#" role="button">Update</a>--}}
    {{--</div>--}}

    {{--
    <!-- masuk desain ( delete data )-->
    <div class="container">
        <h1>Hapus Data Pekerja</h1>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
            </tr>
            </thead>
            <tbody>
            <form action="#" method="post" enctype="multipart/form-data">
                <tr>
                    <td><input type="text" name="add-id"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container">
        <a class="btn btn-primary" href="#" role="button">Delete Data</a>
    div</div>
    --}}

    </body>
    </html>

@endsection
