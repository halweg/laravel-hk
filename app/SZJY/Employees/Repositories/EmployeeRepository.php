<?php

namespace App\SZJY\Employees\Repositories;

use App\SZJY\Base\BaseRepository\BaseRepository;
use App\SZJY\Employees\Employee;
use App\SZJY\Employees\Exceptions\EmployeeNotFoundException;
use App\SZJY\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    /**
     * EmployeeRepository constructor.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
        $this->model = $employee;
    }

    /**
     * List all the employees
     *
     * @param string $order
     * @param string $sort
     *
     * @return Collection
     */
    public function listEmployees(string $order = 'id', string $sort = 'desc'): Collection
    {
        return $this->all(['*'], $order, $sort);
    }

    public function listByPage($page = 1, $pageSize = 5)
    {
        return $this->model->orderBy('created_at','desc')->paginate($pageSize);
    }

    /**
     * Create the employee
     *
     * @param array $data
     *
     * @return Employee
     */
    public function createEmployee(array $data): Employee
    {
        $data['password'] = bcrypt($data['password']);
        $data['user_id'] = app('Kra8\Snowflake\Snowflake')->next();
        return $this->create($data);
    }

    /**
     * Find the employee by id
     *
     * @param int $id
     *
     * @return Employee
     */
    public function findEmployeeById(int $id): Employee
    {
        try {
            return $this->findOneOrFail($id);
        } catch (Exception $e) {
            throw new EmployeeNotFoundException;
        }
    }

    /**
     * Update employee
     *
     * @param array $params
     *
     * @return bool
     */
    public function updateEmployee(array $params): bool
    {
        if (isset($params['password'])) {
            $params['password'] = crypt($params['password']);
        }

        if (isset($params['user_id'])) {
            unset($params['user_id']); //uid 禁止修改
        }

        return $this->update($params);
    }

    /**
     * @param Employee $employee
     *
     * @return bool
     */
    public function isAuthUser(Employee $employee): bool
    {
        $isAuthUser = false;
        if (Auth::guard('employee')->user()->id == $employee->id) {
            $isAuthUser = true;
        }
        return $isAuthUser;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function deleteEmployee() : bool
    {
        return $this->delete();
    }

}
