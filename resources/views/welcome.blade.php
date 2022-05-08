@extends('layout.main',['title'=> 'Home'])


@section('content')
<div class="container-fluid">
  @include('Books.index')
</div>
@endsection
