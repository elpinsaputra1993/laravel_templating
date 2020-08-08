@extends('layout.master')
@section('title','formPertanyaan')

@section('show')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Pertanyaan {{$get->judul}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="post" action="/pertanyaan/{{$get->serial}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputJudul">Judul</label>
                <input type="text" class="form-control" value="{{old('judul',$get->judul)}}" name="judul" id="inputJudul" placeholder="Judul">
            </div>
            @error('judul')
            <div class="alert alert-danger">{{$message}}</div> @enderror <div class=" form-group">
                <label for="inputIsi">Isi </label>
                <textarea class="form-control" name="isi" id="inputIsi" cols="35" rows="4" placeholder="Isi">{{old('isi',$get->isi)}}</textarea>

            </div>
            @error('isi')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="insertbutton">Proses</button>
    </div>
    </form>
</div>
<!-- /.card-body -->
</div>
@endsection