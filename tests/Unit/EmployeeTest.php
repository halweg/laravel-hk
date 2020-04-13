<?php

namespace Tests\Unit;

use App\SZJY\Employees\Employee;
use PHPUnit\Framework\TestCase;
use App\SZJY\Employees\Repositories\EmployeeRepository;
use Faker\Factory as Faker;

class EmployeeTest extends TestCase
{

    public function test_it_can_create()
    {
        $faker = Faker::create();
        $employeeRepo = new EmployeeRepository(new Employee());
        $data = [
            'username'=> $faker->userName,
            'name'=> $faker->name,
            'password'=>bcrypt('12345678'),
            'status'=>1,
            'user_id'=> app('Kra8\Snowflake\Snowflake')->next()
        ];

        $created = $employeeRepo->createEmployee($data);

        $found = $employeeRepo->findByUserId($created->user_id);

        $this->assertInstanceOf(Employee::class, $found);
        $this->assertEquals($data['username'], $found->username);
        $this->assertEquals($data['name'], $found->name);

    }

    public function test_it_can_update()
    {
        $faker = Faker::create();

        $employee = factory(Employee::class)->create();

        $update['name'] = $faker->name;

        $employeeRepo = new EmployeeRepository($employee);
        $employee = $employeeRepo->updateEmployee($update['name']);


        $this->assertEquals($update['name'], $employee->name);

    }
}
