<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestDemo;

class DemoController extends Controller
{
    public function index()
    {
        return view('request-demo.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Mail::to('info@ahlee.id')->send(new RequestDemo($request->email, $request->name, $request->phone));
        return view('request-demo.thank-you');
    }
}
