<?php

namespace App\Http\Controllers\Admin;

use App\Admin;

use App\Blogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class 0userResturentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::paginate(7);
        return view('dashpoard.bossAdmin.userResturent.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Admin::all();
        return view('dashpoard.bossAdmin.userResturent.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $files = $request->img;
        if ($files) { // يعني اذا محمل صورة نفذ التالي

            $destinationPath = public_path() . "/imgresturent/";

            $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension(); // هنا بتقله غيرلي اسم الصورة الي جاية للاسم التالي

            $files->move($destinationPath, $imgfile); // احفظلي الصورة بالمجلد الي نيوزبوست باسم الامتداد المطلوب
        } else //null اذا مش محمل صورة خلي اسمها
        {
            $imgfile = "NULL";
        }
        // echo $imgfile;
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->email,
            'img' => $imgfile, //اسم الصورة في الداتا بيز
        ];
        Admin::create($data);
        return redirect("userAdmin");
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
        $restaurant = Admin::find($id);
        $restaurant->delete();
        return redirect('userAdmin');
    }


    /* relation in AboutUs Restaurant  ((One ->One))*/
    /* mohanad mohanad mohanad mohanad mohanad mohanad mohanad mohanad mohanad mohanad*/
    public function getAboutUsRestaurant()
    {
//          auth()->loginUsingId(7); هيك بقرا الاي دي من جدول اليوزر العادي
        $user = \App\Blogger::where('id', 6 /*auth()->user()->id*/)->with('aboutUs')->first();
        dd($user->toArray());

    }

    public function geRestaurantName($id)
    {
        $name = \App\model\aboutusResturent::where('id', $id)->with('Restaurant')->first();
        dd($name->toArray());
    }
    /* relation in AboutUs Restaurant */


    /* relation in Get Img Restaurant    ((One ->Many)) */
    public function getImgRestaurant($id)
    {
        //auth()->guest();
        $restaurant = \App\Blogger::where('id', $id)->with('getImg')->first();

        foreach ($restaurant->getImg as $g) {
            echo $g->details . '<br>';
        }
//        dd($user->toArray());
    }

    public function getRestaurantByImg($id)
    {
        $restaurant = \App\model\imgResturent::where('id', $id)->with('getRestaurantByImg')->get();
        foreach ($restaurant as $k) {
            echo $k->details . " " . "user" . " " . $k->getRestaurantByImg->name . '<br>';
        }
    }

    public function getAllRestaurantByImg()
    {
        $restaurant = \App\model\imgResturent::with('getRestaurantByImg')->get();
        foreach ($restaurant as $k) {
            echo $k->details . " " . "user" . " " . $k->getRestaurantByImg->name . '<br>';
        }
    }
    /* End relation in Get Img Restaurant */


    /*  relation in Get category Restaurant  (( One ->Many)) */
    public function getCategory()
    {
//        dd(auth('blogger')->check());
//        $blogger = auth('blogger')->user();
//        $blogger->categories;
        $category = \App\Blogger::with('categories')->first();
        foreach ($category->categories as $cat) {
            echo $cat->category_name . '<br>';
        }
    }

    public function getRestaurantByCategory($id)
    {
        $restaurant = \App\model\category::where('id', $id)->with('restaurant')->get();
        foreach ($restaurant as $k) {
            echo $k->category_name . " " . "user" . " " . $k->restaurant->name . '<br>';
        }
    }

    public function getAllRestaurantByCategory()
    {
        $restaurant = \App\model\category::with('restaurant')->get();
        foreach ($restaurant as $rest) {
            echo $rest->category_name . ' Restaurant -> ' . $rest->restaurant->name . '<br>';
        }
    }
    /*  End relation in Get category Restaurant */

    /*  relation in Get Serves Restaurant  ((One ->Many)) */

    public function getServes($id)
    {
        $serves = \App\Blogger::where('id', $id)->with('getServes')->first();
        foreach ($serves->getServes as $helper) {
            echo $helper->serves_name;
        }
    }

    public function getRestaurantByServes($id)
    {
        $restaurant = \App\model\servesResturent::where('id', $id)->with('getRestaurantByServes')->get();
        foreach ($restaurant as $rest) {
            echo $rest->serves_name . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByServes->name;
        }
    }

    public function getAllRestaurantByServes()
    {
        $restaurant = \App\model\servesResturent::with('getRestaurantByServes')->get();
        foreach ($restaurant as $rest) {
            echo $rest->serves_name . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByServes->name . ' ' . '<br>';
        }
    }
    /*  relation in Get Serves Restaurant */


    /*  relation in Get Adds Restaurant  ((One ->Many))*/
    public function getAdds($id)
    {
        $adds = \App\Blogger::where('id', $id)->with('getAdds')->first();
        foreach ($adds->getAdds as $add) {
            echo $add->details . '<br>';
        }
    }

    public function getRestaurantByAdd($id)
    {
        $restaurant = \App\model\addsRestaurant::where('id', $id)->with('getRestaurantByAdd')->get();
        foreach ($restaurant as $rest) {
            echo $rest->details . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByAdd->name;
        }
    }

    public function getAllRestaurantByAdd()
    {
        $restaurant = \App\model\addsRestaurant::with('getRestaurantByAdd')->get();
        foreach ($restaurant as $rest) {
            echo $rest->details . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByAdd->name . ' ' . '<br>';
        }
    }


    /* End relation in Get Adds Restaurant  */

}
