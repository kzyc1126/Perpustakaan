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
        <div class="card">
            <div class="card-header" id="headingOne">
                <h4 class="mb-0">
                    <button class="btn btn-link text-center" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Panduan
                    </button>
                    </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body d-flex flex-column">

                    <div class="d-flex flex-row my-2">
                        <div class="btn btn-primary mx-2"><i class="fas fa-edit"></i></div>
                        <p>Tombol untuk mengubah data buku</p>
                    </div>
                    <div class="d-flex flex-row my-2">
                        <div class="btn btn-info mx-2"><i class="fas fa-eye"></i></div>
                        <div>Tombol untuk melihat detail buku</div>
                    </div>
                    <div class="d-flex flex-row my-2">
                        <div class="btn btn-danger mx-2"><i class="fas fa-trash"></i></div>
                        <div>Tombol untuk menghapus buku</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div id="category_wrapper">
            <div class="row flex-row justify-content-between">
                <form class="form-inline" action="/">
                    <div class="input-group ml-2 mb-2">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            id="search_stock" name="search_stock" value={{ request('search_stock') }}>
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
                                Judul Buku
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1">
                                Sinopsis
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1">
                                Status
                            </th>

                            <th class=" text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending" aria-sort="descending">
                                Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($books) > 0)
                            @foreach($books as $book)
                                <tr>
                                    <td class="text-center" contenteditable='false'>{{ $book->title }}</td>
                                    <td class="text-center" contenteditable='false'>{{ $book->synopsis }}
                                    </td>
                                    @if($book->status == false)
                                        <td class="text-center text-green" contenteditable='false'> Tersedia </td>
                                    @else
                                        <td class="text-center text-green" contenteditable='false'> Dipinjam </td>
                                    @endif
                                    <td class="text-center">
                                        <a href="/{{ $book->id }}/edit" title="Ubah" type="button"
                                            class="btn btn-primary">
                                            <i class=" fas fa-edit"></i></a>

                                        <a href="/delete/{{ $book->id }}" title="See History" type="button"
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
            {{ $books->links() }}
        </div>

    </div>
</div>


</div>
@endsection
