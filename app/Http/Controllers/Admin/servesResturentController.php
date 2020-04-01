<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\servesResturent;
use App\Blogger;



class servesResturentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=servesResturent::all();
       return view('dashboard.bossAdmin.servesResturent.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Blogger::all();
        return view('dashboard.bossAdmin.servesResturent.create', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->rules(), $this->massages()); // validation
        $data = [
            'serves_name' => $request->serves_name,
            'Resturnt_id' => $request->Resturnt_id,
        ];
        servesResturent::create($data);
        return redirect("servesAllRestaurant")->with('success',"Create Serves Successfully $request->serves_name ");
    }


    private function rules($id = null)
    {
        return [
            'serves_name' => 'required',
            'Resturnt_id' => 'required',
        ];
        return $rules;
    }

    private function massages()
    {
        return [
            'serves_name.required' => 'Enter Serves Name',
            'Resturnt_id.required' => 'Pleas Chose Restaurant ',
        ];
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
        $data=servesResturent::find($id);
        $blogger=Blogger::all();
        return view("dashboard.bossAdmin.servesResturent.update",compact('data','blogger'));
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
        $request->validate($this->rules($id), $this->massages());
        $data=[
            'Resturnt_id'=>$request->Resturnt_id,
            'serves_name'=>$request->serves_name,

        ];
        servesResturent::where('id',$id)->update($data);
        return redirect('servesAllRestaurant');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serves=servesResturent::find($id);
        $serves->delete();
        return redirect('servesAllRestaurant')->with('success', "The Serves Restaurant (( $serves->serves_name )) deleted successfully ");
    }




}
