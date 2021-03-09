@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" type="text/css"/>
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Article</h2>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'blogs.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slug:</strong>
            {!! Form::text('slug', null, array('placeholder' => 'Slug','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {!! Form::textarea('content', null, array('id' => 'summernote')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            {!! Form::file('image', null, array('placeholder' => 'Choose an image','class' => 'form-control', 'files' => true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            {!! Form::select('categories[]', $categories,[], array('class' => 'form-control select2','multiple')) !!}
        </div>
    </div>
    {!! Form::hidden('user_id', $user_id) !!}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-2 ml-0 mr-auto">
                <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2 mr-0 ml-auto text-right">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
    $(function(){
        $('#summernote').summernote();
        $('textarea[name="content"]').html($('#summernote').code());
    });
</script>
@endpush