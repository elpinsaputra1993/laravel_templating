@extends('layout.master')
@section('title','formPertanyaan')

@section('show')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Pertanyaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="post" action="/pertanyaan/store">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" id="id">
                <label for="inputJudul">Judul</label>
                <input type="text" class="form-control" value="{{old('judul','')}}" name="judul" id="inputJudul" placeholder="Judul">
            </div>
            @error('judul')
            <div class="alert alert-danger">{{$message}}</div> @enderror <div class=" form-group">
                <label for="inputIsi">Isi </label>
                <textarea class="form-control" name="isi" id="inputIsi" cols="35" rows="4" placeholder="Isi">{{old('isi','')}}</textarea>

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