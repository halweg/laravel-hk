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

    protected $employee_repo;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employee_repo = $employeeRepository;
    }

    public function showLoginForm(Request $request)
    {

        $arr = [];
        for ($i=0; $i <= 100000; $i++) {
            $id = app('Kra8\Snowflake\Snowflake')->next();
            if (in_array($id, $arr)) {
                dd($id);
            }
            array_push($arr, $id);
        }

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
        $details['status'] = 1;

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
