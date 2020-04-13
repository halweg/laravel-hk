<?php

namespace App\Http\Controllers;

use App\SZJY\Employees\Repositories\EmployeeRepository;
use Auth;
use App\SZJY\Employees\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\ValidationException;

class LoginController extends BaseController
{

    protected $redirectTo = '/admin/login';

    public function showLoginForm(Request $request)
    {
        return view('auth.admin.login');
    }

    protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages([
            'password or username' => [trans('auth.failed')],
        ]);
    }

    public function login(LoginRequest $request)
    {
        $details = $request->only('username', 'password');

        if (Auth::guard('employee')->attempt($details)) {
            return redirect('admin/mail-list');
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('employee')->logout();
        return redirect('admin/login');
    }
}
