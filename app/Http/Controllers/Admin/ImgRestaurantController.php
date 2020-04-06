<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Blogger;

class ImgRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=imgRestaurant::with('getRestaurantByImg')->get();
        $data=imgRestaurant::paginate(5);
        return view('dashboard.bossAdmin.imgRestaurant.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Blogger::all();
        return view('dashboard.bossAdmin.imgRestaurant.create', compact('data'));
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

        $Img = new imgRestaurant();
        $Img->details = $request->input('details');
        $Img->Resturnt_id = $request->input('Resturnt_id');
        $Img->img = $imgfile;

        $result = $Img->save();
        if ($result === TRUE)
            return redirect("ImgAllRestaurant")->with('success', " Restaurant Img (($Img->details)) saved successfully");
    }

    private function rules($id = null)
    {
        return [
            'details' => 'required',
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
        try {
            $img = imgRestaurant::findOrFail($id);
            $Restaurant = Blogger::all();
            return view("dashboard.bossAdmin.imgRestaurant.update", compact('Restaurant', 'img'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('/ImgAllRestaurant@index')->with('error', 'Img Not Found');
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
            $imgRestaurant = imgRestaurant::findOrFail($id);
            $oldName = $imgRestaurant->details;
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
                $imgRestaurant->img = $imgfile;
            }
            $imgRestaurant->details = $request->input('details');
            $imgRestaurant->Resturnt_id = $request->input('Resturnt_id');
            $imgRestaurant->update();
            return redirect('/ImgAllRestaurant')->with('success', "Restaurant $oldName Updated  Successfully");

        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/ImgAllRestaurant')->with('error', 'Img Not Found');
        }

//        Blogger::where('id', $id)->update($Restaurant);
        return redirect('/ImgAllRestaurant')->with('success', "Update (($request->details)) Successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = imgRestaurant::find($id);
        $img->delete();
        return redirect('ImgAllRestaurant')->with('success', "The Img Number (($img->id))  was deleted successfully ");
    }
}
