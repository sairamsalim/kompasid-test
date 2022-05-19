<?php

namespace App\Http\Controllers;
use App\Http\Controllers\QuotaController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends GenericController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->username == 'admin') {
            $home = new AdminController;
            return $home->index();
        } else {
            $home = new QuotaController;
            return $home->index();
        }
    }
}
