<?php

namespace App\Http\Controllers\Show;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blogger;
use App\model\TypeRestaurant;
use App\model\servesResturent;
use App\model\imgRestaurant;
use App\model\meal;
use App\model\addsRestaurant;
use RealRashid\SweetAlert\Facades\Alert;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('success')) {
            toast(session('success'), 'success');
        }

        $data = TypeRestaurant::select('Type_Name')->get();
        $Restaurant = Blogger::select(['name', 'id', 'TypeOf_id', 'Description','img'])->paginate(10);
        $adds = addsRestaurant::latest()->take(8)->get();
        return view('homeView', compact('data', 'Restaurant', 'adds'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restaurant($id)
    {
        try {
            $Restaurant = Blogger::findOrFail($id);
            $serves = DB::table('bloggers')
                ->join('serves_resturent', 'bloggers.id', '=', 'serves_resturent.Resturnt_id')
                ->where('serves_resturent.Resturnt_id', '=', $id)
                ->select('bloggers.*', 'serves_resturent.*')
                ->get();

            $Adds = DB::table('bloggers')
                ->join('adds_resturent', 'bloggers.id', '=', 'adds_resturent.Resturnt_id')
                ->where('adds_resturent.Resturnt_id', '=', $id)
                ->select('adds_resturent.*')
                ->paginate(12);

            $aboutUs = DB::table('bloggers')
                ->join('aboutus_resturent', 'bloggers.id', '=', 'aboutus_resturent.Resturnt_id')
                ->where('aboutus_resturent.Resturnt_id', '=', $id)
                ->select('aboutus_resturent.*')
                ->get();


            $img = DB::table('bloggers')
                ->join('imgresturent', 'bloggers.id', '=', 'imgresturent.Resturnt_id')
                ->where('imgresturent.Resturnt_id', '=', $id)
                ->select('imgresturent.*')
                ->get();

            $category = DB::table('bloggers')
                ->join('category', 'bloggers.id', '=', 'category.Resturnt_id')
                ->where('category.Resturnt_id', '=', $id)
                ->select('category.*')
                ->get();

//            $meal = DB::table('bloggers')
//                ->join('meal_resturent', 'bloggers.id', '=', 'meal_resturent.Resturnt_id')
//                ->where('meal_resturent.Resturnt_id', '=', $id)
//                ->select('meal_resturent.*')
//                ->get();


            $meal = DB::table('meal_resturent')
                ->where('Resturnt_id', $id)
                ->get();

            return view("RestaurantView", compact('Restaurant', 'serves', 'aboutUs', 'Adds', 'img', 'category', 'meal'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('/')->with('error', 'Restaurant not found');
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
