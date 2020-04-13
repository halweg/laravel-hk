<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Auth;

class MailController extends BaseController
{
    public function list()
    {
        return view('admin.mail.list');
    }

}
