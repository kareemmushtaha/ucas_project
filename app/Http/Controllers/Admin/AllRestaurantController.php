<?php

namespace App\Http\Controllers\Admin;

use App\Blogger;
use App\model\TypeRestaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AllRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blogger::with('TypeRestaurant')->get();
        $data = Blogger::paginate(10);
        return view('dashboard.bossAdmin.AllRestaurant.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = TypeRestaurant::all();
        return view('dashboard.bossAdmin.AllRestaurant.create', compact('data'));
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

        $Restaurant = new Blogger();
        $Restaurant->name = $request->input('name');
        $Restaurant->email = $request->input('email');
        $Restaurant->password =bcrypt($request->input('password'));
        $Restaurant->img = $imgfile;
        $Restaurant->Description = $request->input('Description');
        $Restaurant->TypeOf_id = $request->input('TypeOf_id');;

        $result = $Restaurant->save();
        if ($result === TRUE)
            return redirect("AllRestaurant")->with('success', " Restaurant (($Restaurant->name)) saved successfully");

    }

    private function rules($id = null)
    {
        return [
            'name' => 'required',
            'password' => 'required',
            'Description' => 'required',
            'TypeOf_id' => 'required',
        ];
        if ($id) {
            $rules['email'] = 'required|unique:bloggers,email,' . $id;
            $rules['img'] = 'mimes:jpg,jpeg,png,gif';// ازم تكون موجودة في كلا الحالتين الاضافة والتعديل
        } else {
            $rules['email'] = 'required|unique:bloggers,email';
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
            $Restaurant = Blogger::findOrFail($id);
            $TypeOf = TypeRestaurant::all();
            return view("dashboard.bossAdmin.AllRestaurant.update", compact('Restaurant', 'TypeOf'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('/AllRestaurant@index')->with('error', 'category not found');
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
            $Restaurant = Blogger::findOrFail($id);
            $oldName = $Restaurant->name;
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
                $Restaurant->img = $imgfile;
            }
            $Restaurant->name = $request->input('name');
            $Restaurant->email = $request->input('email');
            $Restaurant->password =bcrypt($request->input('password'));
            $Restaurant->Description = $request->input('Description');
            $Restaurant->TypeOf_id = $request->input('TypeOf_id');
            $Restaurant->update();
            return redirect('/AllRestaurant')->with('success', "Restaurant $oldName Updated  Successfully");

        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/AllRestaurant')->with('error', 'Restaurant not found');
        }

//        Blogger::where('id', $id)->update($Restaurant);
        return redirect('/AllRestaurant')->with('success', "Update (($request->category_name)) Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Restaurant = Blogger::find($id);
        $Restaurant->delete();
        return redirect('AllRestaurant')->with('success', "The Restaurant (($Restaurant->name))  was deleted successfully ");
    }
}
