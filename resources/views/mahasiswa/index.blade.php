@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswa as $mhs)

        <tr>
            <td>{{$mhs->nim}}</td>
            <td>{{$mhs->nama}}</td>
            <td>{{$mhs->kelas}}</td>
            <td>{{$mhs->jurusan}}</td>
            <td>{{$mhs->email}}</td>
            <td>{{$mhs->alamat}}</td>
            <td>{{$mhs->tgl_lahir}}</td>


            <td>
                <form action="{{route('mahasiswa.destroy', ['mahasiswa' => $mhs->id])}}" method="POST">
                    <a class="btn btn-info" href="{{route('mahasiswa.show', $mhs->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('mahasiswa.edit', $mhs->id)}}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>
    <div class="">
        {{ $mahasiswa->links() }}
    </div>
@endsection
