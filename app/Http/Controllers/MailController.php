<?php

namespace App\Http\Controllers;

use App\SZJY\Employees\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\SZJY\Users\User;

use Auth;

class MailController extends BaseController
{
    public function list()
    {
        return view('admin.mail.list');
    }
}
