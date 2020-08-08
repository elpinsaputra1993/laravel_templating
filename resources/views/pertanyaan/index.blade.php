@extends('layout.master')

@section('title','ListPertanyaan')

@section('show')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Pertanyaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <a href="/pertanyaan/create" class="btn btn-primary float-right">Tambah Data</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($list as $k=>$dt)
                <tr>
                    <td scope="row">{{$k+1}}</td>
                    <td>{{$dt->judul}}</td>
                    <td>{{$dt->isi}}</td>
                    <td scope="col" style="display: flex;">

                        <a href="/pertanyaan/{{$dt->serial}}" class="btn btn-info btn-sm">Show</a> |
                        <a href="/pertanyaan/{{$dt->serial}}/edit" class="btn btn-default btn-sm">Ubah</a> |
                        <form action="/pertanyaan/{{$dt->serial}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Data table empty</td>
                </tr>
                @endforelse



            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('CssDatatables')

@endpush
@push('JsDatatables')
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable();
    });
</script>
@endpush