<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\UserHasBundle;
use App\InstitutionHasQuota;
use Illuminate\Support\Arr;
class QuotaController extends GenericController
{
    //list institutions
    public function index()
    {
        $title = 'Usage Report Dashboard';

        $quota = InstitutionHasQuota::where('institution_id', auth()->user()->id)
            ->first();
        if($quota->type == 'username'){
            $bundle_text = UserHasBundle::join('users.users', 'users.id', '=', 'user_has_bundles.user_id')
                ->where('users.username', 'ilike', auth()->user()->username . '%')
                ->where('user_has_bundles.status', 1)
                ->sum('text_quota');
            $bundle_voice = UserHasBundle::join('users.users', 'users.id', '=', 'user_has_bundles.user_id')
                ->where('users.username', 'ilike', auth()->user()->username . '%')
                ->where('user_has_bundles.status', 1)
                ->sum('voice_quota');
            $bundle_video = UserHasBundle::join('users.users', 'users.id', '=', 'user_has_bundles.user_id')
                ->where('users.username', 'ilike', auth()->user()->username . '%')
                ->where('user_has_bundles.status', 1)
                ->sum('video_quota');
        } elseif($quota->type == 'email') {
            $domain = array_pop(explode('@', auth()->user()->email));
            $bundle_text = UserHasBundle::join('users.users', 'users.id', '=', 'user_has_bundles.user_id')
                ->where('users.email', 'ilike', '%' . $domain)
                ->where('user_has_bundles.status', 1)
                ->sum('text_quota');
            $bundle_voice = UserHasBundle::join('users.users', 'users.id', '=', 'user_has_bundles.user_id')
                ->where('users.email', 'ilike', '%' . $domain)
                ->where('user_has_bundles.status', 1)
                ->sum('voice_quota');
            $bundle_video = UserHasBundle::join('users.users', 'users.id', '=', 'user_has_bundles.user_id')
                ->where('users.email', 'ilike', '%' . $domain)
                ->where('user_has_bundles.status', 1)
                ->sum('video_quota');
        }

        return view('quotas.index', compact('title', 'quota', 'bundle_text', 'bundle_voice', 'bundle_video'));
    }
}
