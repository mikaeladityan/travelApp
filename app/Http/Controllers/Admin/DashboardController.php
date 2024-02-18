<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::user()->role_id <= 2) {
            // Check condition if users is member
            LogActivity::create([
                "users" => Auth::user()->username,
                "ip_address" => $request->ip(),
                "url" => $request->url(),
                "status" => "warning",
                "message" => "Try to access admin dashboard"
            ]);
            return redirect('/')->with("warning", "Ouch.. akses terlarang!");
        } else {
            dd(Auth::user());
            return "hai";
        }
    }
}
