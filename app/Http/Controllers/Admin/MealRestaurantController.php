<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\meal;
use App\model\category;
use App\Blogger;


class MealRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meal = \App\model\meal::with('getMeal', 'RestaurantMeal')->get();
        $meal = meal::paginate(5);
        return view('dashboard.bossAdmin.mealRestaurant.index', compact('meal'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Blogger::all();
        $category=category::all();
        return view('dashboard.bossAdmin.mealRestaurant.create', compact('data','category'));

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

        $Meal = new meal();
        $Meal->name = $request->input('name');
        $Meal->details = $request->input('details');
        $Meal->price = $request->input('price');
        $Meal->img = $imgfile;
        $Meal->category_id = $request->input('category_id');
        $Meal->Resturnt_id = $request->input('Resturnt_id');;

        $result = $Meal->save();
        if ($result === TRUE)
            return redirect("MealRestaurant")->with('success', " Meal (( $Meal->name )) saved successfully");

    }

    private function rules($id = null)
    {
        return [
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'Resturnt_id' => 'required',
        ];
        if ($id) {
            $rules['img'] = 'mimes:jpg,jpeg,png,gif';// ازم تكون موجودة في كلا الحالتين الاضافة والتعديل
        } else {
            $rules['img'] = 'mimes:jpg,jpeg,png,gif|max:2048';
        }
        return $rules;
    }

    private function massages()
    {
        return [
            'img.mimes' => 'Enter Img Type (( jpg or jpeg or png or gif))',
            'img.max' => 'The Picture Big siz',
            'name.required' => 'Enter Name Meal',
            'details.required' => 'Enter Details Meal',
            'price.required' => 'Enter price Meal',
            'category_id.unique' => 'Enter Category Follow',
            'Resturnt_id.required' => 'Enter Restaurant Follow',
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
            $Meal = meal::findOrFail($id);
            $data = Blogger::all();
            $category=category::all();
            return view("dashboard.bossAdmin.mealRestaurant.update", compact('data', 'category','Meal'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('/MealRestaurant@index')->with('error', 'Meal not found');
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
            $Meal = meal::findOrFail($id);
            $oldName = $Meal->name;
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
                $Meal->img = $imgfile;
            }
            $Meal->name = $request->input('name');
            $Meal->details = $request->input('details');
            $Meal->price = $request->input('price');
            $Meal->category_id = $request->input('category_id');
            $Meal->Resturnt_id = $request->input('Resturnt_id');
            $Meal->update();
            return redirect('/MealRestaurant')->with('success', "Meal $oldName Updated  Successfully");

        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/MealRestaurant')->with('error', 'Meal not found');
        }

//        Blogger::where('id', $id)->update($Restaurant);
        return redirect('/MealRestaurant')->with('success', "Update (($request->name)) Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Meal = meal::find($id);
        $Meal->delete();
        return redirect('MealRestaurant')->with('success', "The Meal (($Meal->name))  was deleted successfully ");
    }
}
