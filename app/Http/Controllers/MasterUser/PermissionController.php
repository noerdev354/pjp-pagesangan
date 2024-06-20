<?php

namespace App\Http\Controllers\MasterUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.master_user.data_permission.index');
    }
}
