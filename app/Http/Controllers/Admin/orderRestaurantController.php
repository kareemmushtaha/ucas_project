<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\meal;
use App\model\category;
use App\Blogger;
use App\User;
use mysql_xdevapi\Result;

class orderRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$meal =\App\model\meal::with('user')->first();
        $meal = \App\model\meal::paginate(15);
        return view('dashboard.bossAdmin.Order.index', compact('meal'));

//        $meal = \App\model\meal::with('user')->first();
//        foreach ($meal->user as $me){
//            echo $me->name .'</br>';
//        }
//        /*  اليوزر رقم 1 قام بعملية الشراء كم مرة */
//        echo $meal->user->where('id',1)->sum('id') .'</br>';

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


//        $order = meal::find($id);
//        $order->delete();
//        return redirect('/userMeal')->with('success', "The Meal (($order->name))  was deleted successfully ");
    }

//    public function delete($id)
//    {
//        DB::table('meal_resturent')->where('Resturnt_id', '=', $id)->delete();
//        return redirect('userMeal');
//    }
//


}