<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Image;
use Carbon\Carbon;

class EmployeeController extends Controller
{


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.employee');
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
        //
        $inputs = $request->except('_token');

        //echo "<pre>",print_r($inputs),die();

        DB::table('employees')->insert($inputs);

        $response = array(
           'success' =>  TRUE,
           'message' => 'Employee Created Successfully'
        );

        return response()->json($response, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $inputs = $request->except('_token', '_method');
        //echo "<pre>",print_r($inputs),die();
        $return = DB::table('employees')
            ->where('id', $inputs['id'])
            ->update($inputs);

        $response = array(
           'success' =>  TRUE,
           'message' => 'Employee Updated Successfully'
        );

        return response()->json($response, 200);    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getList(Request $request)
    {


        $employees = DB::table('employees')->select(array("*",DB::raw("CONCAT(title, ' ', firstname, ' ',  middlename, ' ', lastname, ' ', suffix) AS name ")))->get();
        
        $employee_array = json_decode(json_encode($employees), true);

        $data = array();
        foreach($employee_array as $val){
            $action_btn = "";
            $action_btn .= '<button class="btn btn-xs btn-success edit" data-id="'.$val['id'].'" title="Edit"><i class="fa fa-edit"></i></button>';
            $action_btn .= '<button class="btn btn-xs btn-danger remove" data-id="'.$val['id'].'" title="Remove"><i class="fa fa-remove"></i></button>';
            $action_btn .= '<button class="btn btn-xs btn-primary view" data-id="'.$val['id'].'" title="View" onclick="view_profile(this)"><i class="fa fa-eye"></i></button>';
            $val['action'] = $action_btn;
            $data[] = $val;
        }

        $return = array(
            "data" => $data
        );
        return response()->json($return);
        
    }


    public function showProfile(Request $request){
       $id = $request->id;   

        $data =  DB::table('employees')->find($id); 

        $return = array(
            "data" => $data
        );
        return response()->json($return);
       
    }

    public function postPicture(Request $request)
    {
        
        $inputs = $request->file('file');
        $now = Carbon::now();
        $strtotime = strtotime($now->toDateTimeString());
        $destinationPath = public_path().'/uploads/';
        $filename = $strtotime . "_" .  $request->file('file')->getClientOriginalName(); 
        $path = $request->file('file')->getRealPath();
        


        if ($request->hasFile('file')) {
            $request->file('file')->move($destinationPath, $filename);
            $image = Image::make(sprintf('uploads/%s', $filename))->resize(220, 220)->save();
        }   

        echo $filename;

    }

}
