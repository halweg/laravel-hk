<?php

namespace App\SZJY\Employees\Exceptions;

class EmployeeNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('你的賬戶未找到.');
    }
}
