<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class HomeController 后台主页控制器
 * @package App\Http\Controllers\Admin
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('admin/home');
    }

}
