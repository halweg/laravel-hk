<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Faker\Generator as Faker;

use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;

class IndexController extends Controller
{

    public function index(Request $request, Faker $faker)
    {

        /*$employeeRepo = new EmployeeRepository(new Employee());

        $data = [
            'username'=>$faker->userName,
            'name'=>$faker->name,
            'password'=>bcrypt('12345678'),
            'status'=>1,
            'user_id'=> app('Kra8\Snowflake\Snowflake')->next()
        ];

        dd($created = $employeeRepo->createEmployee($data));*/

        $employee = Employee::where('username','haowei')->first();

        dd($employee->permissions);


    }

}
