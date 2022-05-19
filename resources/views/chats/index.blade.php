@extends('layouts.master')
@push('plugin-styles')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="container p-5 bg-light" style="border-radius:2rem;">
    <table class="datatable text-dark" style="border:5px solid #aaa">
        <thead style="border:5px solid #aaa">
            <tr>
                <th class="p-2" style="border:5px solid #aaa">Username</th>
                <th class="p-2" style="border:5px solid #aaa">Name</th>
                <th class="p-2" style="border:5px solid #aaa">Chat</th>
                <th class="p-2" style="border:5px solid #aaa">Expert Name</th>
                <th class="p-2" style="border:5px solid #aaa">Expert Reply</th>
            </tr>
        </thead>
        <tbody style="border:5px solid #aaa">
            @foreach ($chats as $key => $chat)
            <tr>
                <td class="p-2" style="border:5px solid #aaa">{{ $chat->username }}</th>
                <td class="p-2" style="border:5px solid #aaa">{{ $chat->user_name }}</th>
                <td class="p-2" style="border:5px solid #aaa">
                    @if($chat->url)
                    <a target="_blank" href="{{ $chat->url }}">VIDEO LINK</a>
                    @elseif($chat->voice)
                    <a target="_blank" href="{{ $chat->voice }}">VOICE LINK</a>
                    @elseif($chat->text)
                    {{ $chat->text }}
                    @endif
                </td>
                <td class="p-2" style="border:5px solid #aaa">{{ $chat->expert_name }}</th>
                <td class="p-2" style="border:5px solid #aaa">
                    @isset($chat->expert_url)
                    <a target="_blank" href="{{ $chat->expert_url }}">VIDEO LINK</a>
                    @endisset
                    @isset($chat->expert_voice)
                    <a target="_blank" href="{{ $chat->expert_voice }}">VOICE LINK</a>
                    @endisset
                    @isset($chat->expert_text)
                    {{ $chat->expert_text }}
                    @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
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
    },
    "scrollX": true
    });
  });
</script>
@endpush
