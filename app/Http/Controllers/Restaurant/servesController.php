<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogger;
use App\model\servesResturent;

class servesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogger = auth('blogger')->user();
        $serves = $blogger->getServes;
//        dd($serves);
        return view('dashboard.Restaurant.serves.index', compact('serves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = Blogger::all();/* !! ملهاش لازمة */

        return view('dashboard.Restaurant.img.create', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->massages()); // validation
        $serves = new servesResturent();
        $serves->serves_name = $request->input('serves_name');
        $serves->Resturnt_id = $request->input('Resturnt_id');

        $result = $serves->save();
        if ($result === TRUE)
            return redirect("Restaurant/serves")->with('success', "serves (($serves->serves_name)) saved successfully");

    }

    /* ---------- function because make  validation -----------------*/

    private function rules()
    {
        return [
            'serves_name' => 'required',
            'Resturnt_id' => 'required',
        ];
    }

    private function massages()
    {
        return [
            'serves_name.required' => 'Enter serves Details',
            'Resturnt_id.required' => 'Enter Restaurant Name Follow ',
        ];
    }
    /* ---------- finish  function  make  validation -----------------*/

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = servesResturent::findOrFail($id);
            return view("dashboard.Restaurant.serves.update", compact('data'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('serves@index')->with('error', 'Serves Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules(), $this->massages());

        $data = [
            'serves_name' => $request->serves_name,
            'Resturnt_id' => $request->Resturnt_id,
        ];
        servesResturent::where('id', $id)->update($data);
        return redirect('Restaurant/serves')->with('success', "Update (($request->serves_name)) Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serves = servesResturent::find($id);
        $serves->delete();
        return redirect('Restaurant/serves')->with('success', " The item (($serves->category_name))  was deleted successfully ");
    }
}
