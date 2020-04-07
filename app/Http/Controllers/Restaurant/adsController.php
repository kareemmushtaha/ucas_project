<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogger;
use App\model\adsRestaurant;

class adsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogger = auth('blogger')->user();
        $ads = $blogger->Ads;
        return view('dashboard.Restaurant.Ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Restaurant.Ads.create');
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

        $Ads = new adsRestaurant();
        $Ads->details = $request->input('details');
        $Ads->finish_add = $request->input('finish_add');
        $Ads->Resturnt_id = $request->input('Resturnt_id');
        $Ads->img = $imgfile;

        $result = $Ads->save();
        if ($result === TRUE)
            return redirect("Restaurant/Ads")->with('success', " Ad  (($Ads->details)) saved successfully");
    }

    private function rules($id = null)
    {
        return [
            'details' => 'required',
            'Resturnt_id' => 'required',
            'finish_add' => 'required',
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
            'details.required' => 'Enter  Details  Ads Restaurant ',
            'finish_add.required' => 'Enter  Finish add',
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
            $ads = adsRestaurant::findOrFail($id);
            return view("dashboard.Restaurant.Ads.update", compact('ads'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('Restaurant/Ads')->with('error', 'Ad  Not Found');
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
            //find model Ads
            $ads = adsRestaurant::findOrFail($id);
            $oldName = $ads->details;
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
//                if (File::exists(public_path($ads->img))) {
//                    File::delete(public_path($ads->img));
//               }
                $ads->img = $imgfile;
            }
            $ads->details = $request->input('details');
            $ads->Resturnt_id = $request->input('Resturnt_id');
            $ads->finish_add = $request->input('finish_add');
            $ads->update();
            return redirect('/Restaurant/Ads')->with('success', "Ads $oldName Updated  Successfully");
        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/Restaurant/Ads')->with('error', 'Ads Not Found');
        }
//        Blogger::where('id', $id)->update($Restaurant);
        return redirect('/Restaurant/Ads')->with('success', "Update (($request->details)) Successfully");

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
