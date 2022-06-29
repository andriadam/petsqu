<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return redirect(route('admin.dashboard'));
                break;
            default:
                return redirect(route('beranda'));
                break;
        }
    }
}
