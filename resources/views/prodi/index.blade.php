{{-- @include("layout.header", ['title' => "Halaman Program Studi"]) --}}

@extends("layout.master")
@section("title", "Halaman Program Studi")

@section("content")
<div class="row pt-4">
    <div class="col">
        <h2>Prodi</h2>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('prodi.create') }}" class="btn ntn-primary">Tambah</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th><th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
    <h1>Program Studi</h1>
    @if(count($prodi) > 0 )
        @foreach($prodi as $item)
            <li>{{ $item->nama }} {{ $item->fakultas->nama }}</li>
        @endforeach
    @else
        Program Studi tidak ditemukan
    @endif
@endsection

{{-- @include("layout.footer") --}}