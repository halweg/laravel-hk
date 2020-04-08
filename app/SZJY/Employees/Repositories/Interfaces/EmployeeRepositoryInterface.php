<?php

namespace App\SZJY\Employees\Repositories\Interfaces;

use App\SZJY\Base\BaseRepository\BaseRepositoryInterface;
use App\SZJY\Employees\Employee;
use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface extends BaseRepositoryInterface
{
    public function listEmployees(string $order = 'id', string $sort = 'desc'): Collection;

    public function createEmployee(array $params) : Employee;

    public function findEmployeeById(int $id) : Employee;

    public function updateEmployee(array $params): bool;

    public function isAuthUser(Employee $employee): bool;

    public function deleteEmployee() : bool;
}
