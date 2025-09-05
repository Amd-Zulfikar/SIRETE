<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees =Employee::paginate(5);
        
        return view ('admin.employee.index',[
            'title' =>'Data Employees',
            'employees'=>$employees,
        ]);
    }

    public function employee_add() {
        return view('admin.employee.add_employee');
    }

    
}
