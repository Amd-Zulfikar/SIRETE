<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function employee_edit($id) {
         $tbemployee = Employee::find($id);

        if (!$tbemployee) {
            return redirect()->route('index.employee')->with('error', 'employee tidak ditemukan!');
        }
        
        $data = ['title'=>'Edit Data employee',
               'employee'=>$tbemployee,
               'employees'=> Employee::all(),
        ];
        return view('admin.employee.edit_employee',$data);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'contact'=> 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput()
        ->with('error', 'Data gagal disimpan! Periksa input Anda.');
        $input = $request->all();

        try{
        // dd($request->all()); //  cek isi request masuk atau enggak
        Employee::create([
            'name'=>$input['name'],
            'contact'=>$input['contact'],
        ]);
        return redirect()->route('index.employee')->with('success', 'emmployee berhasil ditambahkan!');
        }
        catch(Exception $e)
        {
          return redirect()->back()->with('error', 'Data tidak tersimpan! Terjadi kesalahan.');
        }
    }

    public function update (Request $request, string $id) {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'contact'=> 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('message',$validator->messages()->first());
            return back()->withInput();
        }
          $input = $request->all();

        try{
            $employee = Employee::findOrFail($id);
            $employee->update([
                'name'=>$input['name'],
                'contact'=>$input['contact'],
            ]);
            return redirect()->route('index.employee')->with('success', 'employee berhasil diupdate!');
        }
        catch(Exception $e)
        {
          return redirect()->back()->with('error', 'Data tidak tersimpan! Terjadi kesalahan.');
        }
    }
    
}
