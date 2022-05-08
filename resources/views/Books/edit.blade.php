@extends('layout.main')

@section('content')
<div class="d-flex  justify-content-between">
    <h1>Edit Buku</h1>
 
</div>
<form method="post" action="{{ route('book.update') }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card">
        <div class="card-body">
                    <div class="form-group ">
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <label for="title">Judul </label>
                        <input class="form-control w-100 @error ('title') is-invalid @enderror "
                            id="title" name="title" placeholder="Masukkan Judul"
                            value="{{$book->title }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="synopsis"> Sinopsis </label>
                        <textarea  class="form-control w-100 "
                            id="synopsis" name="synopsis">{{$book->synopsis }} </textarea>
                       
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $book->image }}">
                        @if($book->image)
                        <img src="{{ asset('storage/'.$book->image) }}" class="img-preview img-fluid">
                        @else
                        <img class="img-preview img-fluid">
                        @endif
                        
                        <input class="form-control btn @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="float-right">
                        <a a href="/" class="btn btn-dark">Batal</a>
                        <button class="btn btn-primary" type="submit"> Simpan Data</button>
                    </div>
        </div>
    </div>

</form>

<script>
  
    function previewImage(){
        const image = document.querySelector('#image')
       const imagePreview = document.querySelector('.img-preview')
       imagePreview.style.display='block';
       const oFReader = new FileReader();
       oFReader.readAsDataURL(image.files[0]);
       oFReader.onload = function(oFREvent){
           imagePreview.src = oFREvent.target.result;
       }
    }
</script>
@endsection
