<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
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


        $id=$request->hid;
        $name=$request->name;
        $email=$request->mail;
        $web=$request->web;

        // dd($name);

        $request->validate([
            'files' => 'required|dimensions:min_width=100,min_height=100',
            'name'=>'required',
            'mail'=>'required|email:rfc,dns',
            'web'=>'required'
          ]);

    if(empty($id)){

        if($request->hasFile('files'))

        {
            $path= public_path().'/company_logo/'.$name.'/';


            if(!(company::exists($path)))
            {
                File::makeDirectory($path,$mode=0775,true,true);
            }

            foreach ($request->file('files') as $file)
               {
                   $file_name=$file->getClientOriginalName();

                   $file->move($path,$file_name);
                   $url='company_logo/'.$name.'/'.$file_name;

                   $query = new company;
                   $query->name = $name;
                   $query ->email = $email;
                   $query->logo = $url;
                   $query->website=$web;
                   $query->is_delete = 0;
                   $query->save();

               }

            return redirect()->back();




        }
    }else{
        $this->update($request,$id,$name,$email,$web);
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

        $company_data=company::where('is_delete',0)->paginate(10);


        return view('company/company')->with([
            'company_data'=>$company_data
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
        $editData=company::where('id',$id)->get();
        return response()->json($editData);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request,$id,$name,$email,$web)
    {
        // dd($request);



        if($request->hasFile('files'))

        {
            $path= public_path().'/company_logo/'.$name.'/';


            if(!(company::exists($path)))
            {
                File::makeDirectory($path,$mode=0775,true,true);
            }

            foreach ($request->file('files') as $file)
               {
                   $file_name=$file->getClientOriginalName();

                   $file->move($path,$file_name);
                   $url='company_logo/'.$name.'/'.$file_name;



                   company::where('id','=',$id)->update([
                    'name'=>$name,
                    'email'=>$email,
                    'logo'=>$url,
                    'website'=>$web,
                    'is_delete'=>0,

                    ]);

               }

            return redirect()->back();




        }

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

        company::where('id',$id)->update([
            'is_delete'=>1
        ]);

        return response()->json("success");
    }
}
