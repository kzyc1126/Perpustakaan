@extends('layout.main')

@section('content')

<div class="d-flex  justify-content-between">
    <h1>Daftar Buku</h1>
    <div style="width:40%" id="accordion">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div id="category_wrapper">
            <div class="row flex-row justify-content-between">
                <form class="form-inline" action="/">
                    <div class="input-group ml-2 mb-2">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            id="search_title" name="search_title" value={{ request('search_title') }}>
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row flex-row-reverse mb-2 mr-2">

                    <a class="btn btn-success" href="/tambahbuku">
                        Tambah buku </a>
                </div>

            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">
                <table id="table" class="table table-bordered table-hover dataTable dtr-inline"
                    aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1">
                                ID Peminjaman
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1">
                                Peminjam
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1">
                                Tanggal Peminjaman
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1">
                            Tanggal Peminjaman Berakhir
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1">
                            Tanggal Kembali
                            </th>

                            <th class=" text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending" aria-sort="descending">
                                Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($reservations) > 0)
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td class="text-center" contenteditable='false'>{{ $reservation->id_pinjam}}</td>
                                    <td class="text-center" contenteditable='false'>{{ $reservation->user->name}}</td>
                                    <td class="text-center" contenteditable='false'>{{ $reservation->borrow_date }}
                                    <td class="text-center" contenteditable='false'>{{ $reservation->must_return }}
                                    </td>
                                    @if($reservation->return_date == null)
                                        <td class="text-center text-red" contenteditable='false'> Belum Dikembalikan </td>
                                    @else
                                        <td class="text-center text-red" contenteditable='false'> {{ $reservation->return_date }} </td>
                                    @endif
                                    <td class="text-center">
                                        <a href="/{{ $reservation->id }}/edit" title="Ubah" type="button"
                                            class="btn btn-primary">
                                            <i class=" fas fa-edit"></i></a>

                                        <a href="/delete/{{ $reservation->id }}" title="See History" type="button"
                                            class="btn btn-danger">
                                            <i class=" fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center text-bold text-danger" colspan="6">Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $reservations->links() }}
        </div>

    </div>
</div>


</div>
@endsection
