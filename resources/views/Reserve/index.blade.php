@extends('layout.main')
@push('script')
    <script src="{{ asset('js/pinjam.js') }}"></script>
@endpush
@section('content')
<form method="post" action="/pinjambuku">
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h2>Pinjam Buku</h2>
            @csrf
            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="penanggungjawab">ID Peminjaman</label>
                        <input class="form-control w-100 " name="id_pinjam" value="{{ $id_pinjam }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pengerja">Peminjam</label>
                        <select class="form-control w-100 select2" name="borrower_id">
                            @foreach($users as $user)
                                @if($user->id != Auth::user()->id)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal </label>
                        <input type="productid" class="form-control w-100 " id="exampleInputEmail1" value="{{ $date }}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Kembali </label>
                        <input type="productid" class="form-control w-100 " id="exampleInputEmail1"
                            value="{{ $return_date }}" readonly>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if(count($books) > 0)
                <div class="d-flex flex-row ">
                    <div class="flex-col col-md-4">
                        <div class="form-inline d-block ">

                        </div>
                        <select name="kode" size="20" id="pinjamList" class="w-100">
                            @foreach($books as $book)
                                <option data-title="{{ $book->title }}" data-synopsis="{{ $book->synopsis }}"
                                    value={{ $book->id }}>
                                    {{ $book->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="float-left w-100 col-md-8">

                        <table id="pinjamTable" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th hidden>ID</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1">
                                        Judul
                                    </th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1">
                                        Sinopsis
                                    </th>
                                    <th class=" text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        aria-sort="descending">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody id="pinjamTableBody">

                            </tbody>
                        </table>
                        <div class="float-right">
                            <button type="button" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center text-red text-bold text-lg">
                    Saat Ini Belum Ada Produk yang Perlu Di isi Kembali
                </div>
            @endif
        </div>

    </div>
</form>
@endsection
