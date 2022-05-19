@extends('layouts.master')
@push('plugin-styles')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="container p-5 bg-light" style="border-radius:2rem;">
    <div class="row">
        <div class="col-md-12 my-3 p-3" style="background-color:#1566BE; border-radius:1rem;">
            <h3 class="text-left mb-3">
                Remaining Text<br>Message Quota
            </h3>
            <h2 class="text-right">
                {{ $quota->text_quota-$bundle_text }}/{{ $quota->text_quota }}
            </h2>
        </div>
        <div class="col-md-12 my-3 p-3" style="background-color:#1566BE; border-radius:1rem;">
            <h3 class="text-left mb-3">
                Remaining Voice<br>Message Quota
            </h3>
            <h2 class="text-right">
                {{ $quota->voice_quota-$bundle_voice }}/{{ $quota->voice_quota }}
            </h2>
        </div>
        <div class="col-md-12 my-3 p-3" style="background-color:#1566BE; border-radius:1rem;">
            <h3 class="text-left mb-3">
                Remaining Video<br>Message Quota
            </h3>
            <h2 class="text-right">
                {{ $quota->video_quota-$bundle_video }}/{{ $quota->video_quota }}
            </h2>
        </div>
    </div>
</div>
@endsection
