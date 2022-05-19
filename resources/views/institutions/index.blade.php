@extends('layouts.master')
@push('plugin-styles')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="container p-5 bg-light text-dark" style="border-radius:2rem;">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('institutions.create') }}"> Create New Admin</a>
            </div>
        </div>
    </div>
    <table class="datatable table-bordered">
    <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $user)
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('institutions.show',$user->id) }}"><i class="fas fa-eye"></i></a>
            <a class="btn btn-primary" href="{{ route('institutions.edit',$user->id) }}"><i class="fas fa-edit"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['institutions.destroy', $user->id],'style'=>'display:inline']) !!}
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            {!! Form::close() !!}
        </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
    </theatfootd>
    </table>
</div>
@endsection
@push('plugin-scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@endpush
@push('custom-scripts')
<script>
  $(function () {
    $('.datatable').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
                }
            } );
            } );
        },
      "bStateSave": true,
      "fnStateSave": function (oSettings, oData) {
          localStorage.setItem('offersDataTables', JSON.stringify(oData));
      },
      "fnStateLoad": function (oSettings) {
          return JSON.parse(localStorage.getItem('offersDataTables'));
      }
    });
  });
</script>
@endpush
