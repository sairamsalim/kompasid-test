<?php
namespace App\Http\Controllers;
use App\Chat;
use App\InstitutionHasQuota;
use Illuminate\Http\Request;
class ChatController extends GenericController
{
    public function index()
    {
        $title = 'Chat History Dashboard';

        $institution = InstitutionHasQuota::where('institution_id', auth()->user()->id)
            ->first();
        if($institution->type == 'username'){
            $chats = Chat::join('transactions.incomes', 'incomes.chat_id', '=', 'chats.id')
                ->leftJoin('experts.experts', 'experts.id', '=', 'incomes.expert_id')
                ->leftJoin('users.users', 'users.id', '=', 'incomes.user_id')
                ->select('incomes.id as income_id', 'chats.chatroom_id', 'chats.id as chat_id', 'chats.user_id', 'chats.status as chat_status', 'chats.url', 'chats.text', 'chats.voice', 'incomes.updated_at as income_date', 'incomes.status as income_status', 'experts.name as expert_name', 'users.name as user_name', 'users.username as username')
                ->where('incomes.status', 2)
                ->where('experts.name', '<>', 'devtestingmawar')
                ->where('users.username', 'ilike', auth()->user()->username . '%')
                ->orderBy('incomes.updated_at', 'desc')->get();
        } elseif($institution->type == 'email') {
            $domain = array_pop(explode('@', auth()->user()->email));
            $chats = Chat::join('transactions.incomes', 'incomes.chat_id', '=', 'chats.id')
                ->leftJoin('experts.experts', 'experts.id', '=', 'incomes.expert_id')
                ->leftJoin('users.users', 'users.id', '=', 'incomes.user_id')
                ->select('incomes.id as income_id', 'chats.chatroom_id', 'chats.id as chat_id', 'chats.user_id', 'chats.status as chat_status', 'chats.url', 'chats.text', 'chats.voice', 'incomes.updated_at as income_date', 'incomes.status as income_status', 'experts.name as expert_name', 'users.name as user_name', 'users.username as username')
                ->where('incomes.status', 2)
                ->where('experts.name', '<>', 'devtestingmawar')
                ->where('users.email', 'ilike', '%' . $domain)
                ->orderBy('incomes.updated_at', 'desc')->get();
        }
        foreach($chats as $chat){
            $chat_expert = Chat::select('expert_id', 'url', 'text', 'voice')
                ->where('chatroom_id', $chat->chatroom_id)
                ->where('id', '>', $chat->chat_id)
                ->where('status', 1)
                ->whereNotNull('expert_id')
                ->orderBy('created_at', 'asc')
                ->first();
            if($chat_expert){
                if($chat_expert->url){
                    $chat->expert_url = $chat_expert->url;
                }elseif($chat_expert->voice){
                    $chat->expert_voice = $chat_expert->voice;
                }elseif($chat_expert->text){
                    $chat->expert_text = $chat_expert->text;
                }
            }
        }

        return view('chats.index',compact('title', 'chats'))->with('i');
    }
}
