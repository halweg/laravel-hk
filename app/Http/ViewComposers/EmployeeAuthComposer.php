<?php
namespace App\Http\ViewComposers;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use MongoDB\BSON\UTCDateTime;

class EmployeeAuthComposer
{
    public function compose(View $view) {
        if (Auth::guard('employee')->check()) {
            $employee = Auth::guard('employee');
            $employee->last_activity = new UTCDateTime(time() * 1000);
            $view->with('employee', $employee);
        }
    }

}
