@extends('layouts.app')
@push('css')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Articles Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Blog</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('danger'))
<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>
@endif
<table class="datatable table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Slug</th>
      <th>Image</th>
      <th>Author</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($blogs as $key => $blog)
    <tr>
      <td>{{ $blog->id }}</td>
      <td>{{ $blog->title }}</td>
      <td>{{ $blog->slug }}</td>
      <td><img src="{{ url('public/images/' . $blog->image) }}" class="img-fluid w-100" style="max-width:150px;"></td>
      <td>{{ $blog->username }}</td>
      <td>
        <a class="btn btn-info" data-toggle="tooltip_show" href="{{ route('blogs.show',$blog->id) }}" style="display:inline"><i class="fas fa-eye"></i></a>
        <a class="btn btn-primary" data-toggle="tooltip_edit" href="{{ route('blogs.edit',$blog->id) }}" style="display:inline"><i class="fas fa-edit"></i></a>
          {!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $blog->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip_delete" class="btn btn-danger"><i class="fas fa-trash"></i></button>
          {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Slug</th>
      <th>Image</th>
      <th>Author</th>
      <th>Action</th>
    </tr>
  </tfoot>
</table>
@endsection

@push('scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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