@extends('layouts.master')
@push('plugin-styles')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="container p-5 bg-light" style="border-radius:2rem;">
    <div class="row">
        <div class="col-md-12 my-3 p-3" style="background-color:#1566BE; border-radius:1rem;">
            <img class="w-50 mx-auto text-center" src="{{ asset('public/images/data-box-preview.png') }}">
        </div>
    </div>
</div>
@endsection
