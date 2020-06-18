<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\aboutusResturent;
use App\Blogger;
use \App\model\TypeRestaurant;
use Illuminate\Support\Facades\DB;

class aboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //find user id  Authenticated
        $blogger = auth('blogger')->user()->id;
        //---------------------       Restaurant id in model aboutRestaurant == $blogger
        $aboutUs = \App\model\aboutusResturent::where('Resturnt_id', $blogger)->get();

        $typeOf = TypeRestaurant::get();
        $restaurant = Blogger::get();
        return view('dashboard.Restaurant.aboutUs.index', compact('aboutUs', 'typeOf', 'restaurant'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Restaurant.aboutUs.create');
    }


    private function rules($id = null)
    {
        return [
            'aboutUs' => 'required',
            'adress' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'telephon' => 'required'
        ];
        return $rules;
    }

    private function massages()
    {
        return [
            'aboutUs.required' => 'Enter Details About Us Restaurant ',
            'adress.required' => 'Enter Address Restaurant',
            'phone1.required' => 'Enter  First phone Restaurant',
            'phone2.required' => 'Enter  second phone Restaurant',
            'telephon.required' => 'Enter  Telephone  Restaurant',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /* Create And Update About Us     One To One */

    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->massages()); // validation
//       return $request->all();
        $obj = aboutusResturent::query()->where('Resturnt_id', auth('blogger')->user()->id)->first();
        if ($obj) {
            $obj->aboutUs = $request->input('aboutUs');
            $obj->adress = $request->input('adress');
            $obj->phone1 = $request->input('phone1');
            $obj->phone2 = $request->input('phone2');
            $obj->telephon = $request->input('telephon');
            $obj->save();
            /* هنا عملية اب ديت على الرو الموجود مسبقا */
        } else {
            $aboutUs = new aboutusResturent();
            $aboutUs->aboutUs = $request->input('aboutUs');
            $aboutUs->adress = $request->input('adress');
            $aboutUs->phone1 = $request->input('phone1');
            $aboutUs->phone2 = $request->input('phone2');
            $aboutUs->telephon = $request->input('telephon');
            $aboutUs->Resturnt_id = auth('blogger')->user()->id;
            $aboutUs->save();
        }
        return redirect("Restaurant/aboutUs")->with('success', "About Us saved successfully");
    }


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
//        try {
//            $data = aboutusResturent::findOrFail($id);
//            return view("dashboard.Restaurant.aboutUs.update", compact('data'));
//        } catch (ModelNotFoundException $exception) {
//            return redirect()->route('aboutUs@index')->with('error', ' Not Found Information');
//     }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

//    public function update(Request $request, $id)
//    {
//
//        $request->validate($this->rules($id), $this->massages());
//
//        $nameRestaurant = auth('blogger')->user()->email;
//
//        $data = [
//            'aboutUs' => $request->aboutUs,
//            'adress' => $request->adress,
//            'phone1' => $request->phone1,
//            'phone2' => $request->phone2,
//            'telephon' => $request->telephon,
//            'Resturnt_id' => $request->Resturnt_id,
//        ];
//        aboutusResturent::where('id', $id)->update($data);
//        return redirect('Restaurant/aboutUs')->with('success', "Update About Us Information Successfully (( $nameRestaurant )) ");
//    }


    public function updateType(Request $request, $id)
    {
        $data = [
            'TypeOf_id' => $request->typeof,
        ];

        Blogger::select('TypeOf_id')->where('id', $id)->update($data);
        return redirect('Restaurant/aboutUs')->with('success', "Update Type Successfully");
    }

    public function updateLogo(Request $request, $id)
    {
        $files = $request->file('img');
        if ($files) {
            $destinationPath = public_path() . "/imgresturent/";
            $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = "NULL";
        }
        $data = [
            'img' => $request = $imgfile,
        ];
        Blogger::select('img')->where('id', $id)->update($data);
        return redirect('Restaurant/aboutUs')->with('success', "Update Logo Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutUs = aboutusResturent::find($id);
        $aboutUs->delete();
        return redirect('Restaurant/aboutUs')->with('success', "The Information $aboutUs->details Was Deleted");
    }
}
