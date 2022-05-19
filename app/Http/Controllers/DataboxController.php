<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\UserHasBundle;
use App\InstitutionHasQuota;
use Illuminate\Support\Arr;
class DataboxController extends GenericController
{
    //list institutions
    public function index()
    {
        $title = 'Data Box';

        return view('databox.index', compact('title'));
    }
}
