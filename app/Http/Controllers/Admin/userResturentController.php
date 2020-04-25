<?php

namespace App\Http\Controllers\Admin;

use App\Admin;

use App\Blogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class userResturentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::paginate(5);
        return view('dashboard.bossAdmin.userAdmin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Admin::all();
        return view('dashboard.bossAdmin.userAdmin.create', compact('data'));
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

        $files = $request->file('img');
        if ($files) { // يعني اذا محمل صورة نفذ التالي
            $destinationPath = public_path() . "/imgresturent/";
            $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension(); // هنا بتقله غيرلي اسم الصورة الي جاية للاسم التالي
            $files->move($destinationPath, $imgfile); // احفظلي الصورة بالمجلد الي نيوزبوست باسم الامتداد المطلوب
        } else //null اذا مش محمل صورة خلي اسمها
        {
            $imgfile = "NULL";
        }

        $Restaurant = new Admin();
        $Restaurant->name = $request->input('name');
        $Restaurant->email = $request->input('email');
        $Restaurant->password = bcrypt($request->input('password'));
        $Restaurant->img = $imgfile;
        $result = $Restaurant->save();
        if ($result === TRUE)
            return redirect("userAdmin")->with('success', " Restaurant (($Restaurant->name)) saved successfully");

    }

    private function rules( $id = null)
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
        if ($id) {
            $rules['email'] = 'required|unique:Admin,email,'.$id;
            $rules['img'] = 'mimes:jpg,jpeg,png,gif';// ازم تكون موجودة في كلا الحالتين الاضافة والتعديل
        } else {
            $rules['email'] = 'required|unique:Admin,email';
            $rules['img'] = 'mimes:jpg,jpeg,png,gif|max:2048';
        }
        return $rules;
    }

    private function massages()
    {
        return [
            'img.mimes' => 'Enter Img Type (( jpg or jpeg or png or gif))',
            'img.max' => 'The Picture Big siz',
            'name.required' => 'Enter Name Restaurant',
            'email.required' => 'Enter Email Restaurant',
            'email.unique' => 'Enter Email taken previously',
            'password.required' => 'Enter Email password',
            'Description.required' => 'Enter  Brief  With Restaurant',
            'TypeOf_id.required' => 'Enter  Type Of  With Restaurant',
        ];
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
        try {
            $Admin = Admin::findOrFail($id);
//            $TypeOf = TypeRestaurant::all();
            return view("dashboard.bossAdmin.userAdmin.update", compact('Admin'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('/userAdmin@index')->with('error', 'Admin Personal not found');
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
        try {
            //find model category
            $Admin = Admin::findOrFail($id);
            $oldNameAdmin = $Admin->name;
            //validator in input

            $request->validate($this->rules($id), $this->massages());
            if ($request->hasFile('img')) {
                //upload new img
                $files = $request->file('img');
                if ($files) { // يعني اذا محمل صورة نفذ التالي
                    $destinationPath = public_path() . "/imgresturent/";
                    $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension(); // هنا بتقله غيرلي اسم الصورة الي جاية للاسم التالي
                    $files->move($destinationPath, $imgfile); // احفظلي الصورة بالمجلد الي نيوزبوست باسم الامتداد المطلوب
                } else //if not upload img put name "null"
                {
                    $imgfile = "NULL";
                }
                // remove The Old Img
//                if (File::exists(public_path($Restaurant->img))) {
//                    File::delete(public_path($Restaurant->img));
//               }
                $Admin->img = $imgfile;
            }
            $Admin->name = $request->input('name');
            $Admin->email = $request->input('email');
            $Admin->password = $request->input('password');
            $Admin->update();
            return redirect('/userAdmin')->with('success', "Restaurant $oldNameAdmin Updated  Successfully to $Admin->name");

        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/userAdmin')->with('error', 'Restaurant not found');
        }

//        Admin::where('id', $id)->update($Admin);
        return redirect('/userAdmin')->with('success', "Update (($Admin->name)) Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Admin = Admin::find($id);
        $Admin->delete();

        return redirect('userAdmin')->with('success', "The Restaurant (($Admin->name))  was deleted successfully ");
    }


    /******* ------  Test Relation Ship  To Project ------  ************/

    /*******  ------ Test Relation Ship  To Project ------  ************/

//
//    /* relation in AboutUs Restaurant  ((One ->One))*/
//    /* mohanad mohanad mohanad mohanad mohanad mohanad mohanad mohanad mohanad mohanad*/
//    public function getAboutUsRestaurant()
//    {
////          auth()->loginUsingId(7); هيك بقرا الاي دي من جدول اليوزر العادي
//        $user = \App\Blogger::where('id', 6 /*auth()->user()->id*/)->with('aboutUs')->first();
//        dd($user->toArray());
//
//    }
//
//    public function geRestaurantName($id)
//    {
//
//        $name = \App\model\aboutusResturent::where('id', $id)->with('Restaurant')->first();
//        dd($name->toArray());
//
//    }
//    /* relation in AboutUs Restaurant */
//
//
//    /* relation in Get Img Restaurant    ((One ->Many)) */
//    public function getImgRestaurant($id)
//    {
//        //auth()->guest();
//        $restaurant = \App\Blogger::where('id', $id)->with('getImg')->first();
//
//        foreach ($restaurant->getImg as $g) {
//            echo $g->details . '<br>';
//        }
////        dd($user->toArray());
//    }
//
//    public function getRestaurantByImg($id)
//    {
//        $restaurant = \App\model\imgResturent::where('id', $id)->with('getRestaurantByImg')->get();
//        foreach ($restaurant as $k) {
//            echo $k->details . " " . "user" . " " . $k->getRestaurantByImg->name . '<br>';
//        }
//    }
//
//    public function getAllRestaurantByImg()
//    {
//        $restaurant = \App\model\imgResturent::with('getRestaurantByImg')->get();
//        foreach ($restaurant as $k) {
//            echo $k->details . " " . "user" . " " . $k->getRestaurantByImg->name . '<br>';
//        }
//    }
//    /* End relation in Get Img Restaurant */
//
//
//    /*  relation in Get category Restaurant  (( One ->Many)) */
//    public function getCategory()
//    {
////        dd(auth('blogger')->check());
////        $blogger = auth('blogger')->user();
////        $blogger->categories;
//        $category = \App\Blogger::with('categories')->first();
//        foreach ($category->categories as $cat) {
//            echo $cat->category_name . '<br>';
//        }
//    }
//
//    public function getRestaurantByCategory($id)
//    {
//        $restaurant = \App\model\category::where('id', $id)->with('restaurant')->get();
//        foreach ($restaurant as $k) {
//            echo $k->category_name . " " . "user" . " " . $k->restaurant->name . '<br>';
//        }
//    }
//
//    public function getAllRestaurantByCategory()
//    {
//        $restaurant = \App\model\category::with('restaurant')->get();
//        foreach ($restaurant as $rest) {
//            echo $rest->category_name . ' Restaurant -> ' . $rest->restaurant->name . '<br>';
//        }
//    }
//    /*  End relation in Get category Restaurant */
//
//    /*  relation in Get Serves Restaurant  ((One ->Many)) */
//
//    public function getServes($id)
//    {
//        $serves = \App\Blogger::where('id', $id)->with('getServes')->first();
//        foreach ($serves->getServes as $helper) {
//            echo $helper->serves_name;
//        }
//    }
//
//    public function getRestaurantByServes($id)
//    {
//        $restaurant = \App\model\servesResturent::where('id', $id)->with('getRestaurantByServes')->get();
//        foreach ($restaurant as $rest) {
//            echo $rest->serves_name . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByServes->name;
//        }
//    }
//
//    public function getAllRestaurantByServes()
//    {
//        $restaurant = \App\model\servesResturent::with('getRestaurantByServes')->get();
//        foreach ($restaurant as $rest) {
//            echo $rest->serves_name . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByServes->name . ' ' . '<br>';
//        }
//    }
//    /*  relation in Get Serves Restaurant */
//
//
//    /*  relation in Get Adds Restaurant  ((One ->Many))*/
//    public function getAdds($id)
//    {
//        $adds = \App\Blogger::where('id', $id)->with('getAdds')->first();
//        foreach ($adds->getAdds as $add) {
//            echo $add->details . '<br>';
//        }
//    }
//
//    public function getRestaurantByAdd($id)
//    {
//        $restaurant = \App\model\adsRestaurant::where('id', $id)->with('getRestaurantByAdd')->get();
//        foreach ($restaurant as $rest) {
//            echo $rest->details . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByAdd->name;
//        }
//    }
//
//    public function getAllRestaurantByAdd()
//    {
//        $restaurant = \App\model\addsRestaurant::with('getRestaurantByAdd')->get();
//        foreach ($restaurant as $rest) {
//            echo $rest->details . " " . ' Restaurant -> ' . " " . $rest->getRestaurantByAdd->name . ' ' . '<br>';
//        }
//    }
//
//
//    /* End relation in Get Adds Restaurant  */

}
