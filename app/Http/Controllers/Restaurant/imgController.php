<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\imgRestaurant;
use App\Blogger;

class imgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogger = auth('blogger')->user();
        $img = $blogger->getImg;

//        $img=imgRestaurant::paginate(5);  اذا عملت البجنيشن بصير يعرض كل الصور الي بتخص
//   المطعم والي ما بتخصه

        return view('dashboard.Restaurant.img.index', compact('img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Restaurant.img.create');
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
        if ($files) {
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
            return redirect("Restaurant/img")->with('success', " Restaurant Img (($Img->details)) saved successfully");
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
            'details.required' => 'Enter  Details  Img Restaurant',
            'Resturnt_id.required' => 'Enter   Restaurant Follower This Img',
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
            $img = imgRestaurant::findOrFail($id);
            return view("dashboard.Restaurant.img.update", compact('img'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('Restaurant/img')->with('error', 'Img Not Found');
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
            $img = imgRestaurant::findOrFail($id);
            $oldName = $img->details;
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
                $img->img = $imgfile;
            }
            $img->details = $request->input('details');
            $img->Resturnt_id = $request->input('Resturnt_id');
            $img->update();
            return redirect('/Restaurant/img')->with('success', "Restaurant $oldName Updated  Successfully");

        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/Restaurant/img')->with('error', 'Img Not Found');
        }

//        Blogger::where('id', $id)->update($Restaurant);
        return redirect('/Restaurant/img')->with('success', "Update (($request->details)) Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = imgRestaurant::find($id);
        $img->delete();
        return redirect('Restaurant/img')->with('success', "The img $img->details Was Deleted");
    }
}
