<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\InstitutionHasQuota;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
class AdminController extends GenericController
{
    //list institutions
    public function index()
    {
        $title = 'Institutions';

        $data = Admin::select('institutions.id as id', 'institutions.name as name', 'institutions.email as email')
            ->orderBy('institutions.name', 'asc')->get();
        return view('institutions.index', compact('title', 'data'))->with('i');
    }
    //create institution
    public function create()
    {
        $title = 'Create Institution Admin';

        return view('institutions.create', compact('title'));
    }
    //store to database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:institutions.institutions,email',
            'username' => 'required|unique:institutions.institutions,username',
            'password' => 'required|same:confirm-password',
            'text_quota' => 'required',
            'voice_quota' => 'required',
            'video_quota' => 'required',
            'avatar' => 'required|max:1000',
            'division' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $path_image = Storage::disk('s3')->put('institution-profpic', $input['avatar']);
        $admin['avatar'] = 'https://ahleeapp.s3.ap-southeast-1.amazonaws.com/' . $path_image;

        $institution_id = Admin::insertGetId([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => $input['username'],
            'division' => $input['division'],
            'avatar' => $admin['avatar'],
            'password' => $input['password'],
        ]);

        InstitutionHasQuota::insert([
            'text_quota' => $input['text_quota'],
            'voice_quota' => $input['voice_quota'],
            'video_quota' => $input['video_quota'],
            'institution_id' => $institution_id,
            'type' => $input['type'],
        ]);

        return redirect()->route('institutions.index')
                        ->with('success','Admin created successfully');
    }
    //show specified institution
    public function show($id)
    {
        $title = 'Institution Admin';

        $institution = Admin::find($id);
        return view('institutions.show',compact('title', 'institution'));
    }
    //edit specified institution
    public function edit($id)
    {
        $title = 'Edit Institution Admin';

        $institution = Admin::find($id);
        $quota = InstitutionHasQuota::where('institution_id', $id)
            ->first();

        return view('institutions.edit',compact('title', 'institution', 'quota'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:institutions.institutions,email,'.$id,
            'username' => 'required|unique:institutions.institutions,username,'.$id,
            'password' => 'same:confirm-password',
            'text_quota' => 'required',
            'voice_quota' => 'required',
            'video_quota' => 'required',
            'avatar' => 'required|max:1000',
            'division' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        $path_image = Storage::disk('s3')->put('institution-profpic', $input['avatar']);
        $admin = array();
        $admin['avatar'] = 'https://ahleeapp.s3.ap-southeast-1.amazonaws.com/' . $path_image;

        $institution = Admin::find($id);
        if(!empty($input['password'])){
            $institution->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
                'division' => $input['division'],
                'avatar' => $admin['avatar'],
                'password' => $input['password'],
            ]);
        }else{
            $institution->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
                'division' => $input['division'],
                'avatar' => $admin['avatar'],
            ]);
        }

        InstitutionHasQuota::where('institution_id', $id)
            ->update([
                'text_quota' => $input['text_quota'],
                'voice_quota' => $input['voice_quota'],
                'video_quota' => $input['video_quota'],
                'type' => $input['type'],
            ]);

        return redirect()->route('institutions.index')
                        ->with('success','Admin updated successfully');
    }
    //delete specified institution
    public function destroy($id)
    {
        Admin::find($id)->delete();
        InstitutionHasQuota::where('institution_id', $id)->delete();
        return redirect()->back()
                        ->with('success','Admin deleted successfully');
    }
}
