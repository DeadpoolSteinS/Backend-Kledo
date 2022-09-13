<?php

namespace App\Http\Services;

use App\Models\Employee;

class EmployeeServices{
  public function createEmployee($request){
    $employee = Employee::create([
        'name'   => $request->name,
        'salary' => $request->salary
      ]);

    return Employee::where('id', '=', $employee->id)->get();
  }
}