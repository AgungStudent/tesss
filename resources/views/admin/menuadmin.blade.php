
@extends('admin.template')

@section('content')

<!-- -->
<div class="container">

    <table border="1" cellpadding="10" cellspacing="0" id="Table_ID" class="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>id</th>
            <th>Nama</th>
            <th>email</th>
        </tr>
        </thead>
        @foreach($users as $user)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>

    @endforeach

</div>

<script>
    $(document).ready(function () {
        $('#Table_ID').DataTable();
    });
</script>
</body>
</html>
@endsection
