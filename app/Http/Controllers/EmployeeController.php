<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $f_name=$request->firstName;
       $l_name=$request->lastName;
       $company=$request->company;
       $mail=$request->mail;
       $phone=$request->phone;
       $id=$request->id;

       if(empty($id)){

       $employee=new employee();
       $employee->first_name=$f_name;
       $employee->last_name=$l_name;
       $employee->company_id=$company;
       $employee->email=$mail;
       $employee->phone=$phone;
       $employee->save();

       return response()->json("success");

       }else{
           $this->update($id,$f_name,$l_name,$company,$mail,$phone);
       }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $companies=company::where('is_delete',0)->get();

        $employees=employee::where('is_delete',0)->paginate(10);


        return view('employee/employee')->with([
            'companies'=>$companies,
            'employees'=>$employees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request->id;

        $editData=employee::where('id',$id)->get();

        return response()->json($editData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,$f_name,$l_name,$company,$mail,$phone)
    {
        employee::where('id','=',$id)->update([
            'first_name'=>$f_name,
            'last_name'=>$l_name,
            'company_id'=>$company,
            'email'=>$mail,
            'phone'=>$phone
        ]);


        return response()->json('success');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;

        employee::where('id','=',$id)->update([
           'is_delete'=>1
        ]);

        return response()->json('success');
    }
}
