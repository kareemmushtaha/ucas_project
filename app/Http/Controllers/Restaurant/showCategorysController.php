<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\model\category;
use App\Blogger;

class showCategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogger = auth('blogger')->user();
        $categories = $blogger->categories;
//        $data['categories'] = $categories;
        return view('dashpoard.Restaurant.categoryRestaurant.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = Blogger::all();
        return view('dashpoard.Restaurant.categoryRestaurant.create', compact('data'));
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
        $category = new category();
        $category->category_name = $request->input('category_name');
        $category->Resturnt_id = $request->input('Resturnt_id');

        $result = $category->save();
        if ($result === TRUE)
            return redirect("Restaurant/category")->with('success', "category (($category->category_name)) saved successfully");
    }

    /* ---------- function because make  validation -----------------*/

    private function rules()
    {
        return [
            'category_name' => 'required',
            'Resturnt_id' => 'required',
        ];
    }

    private function massages()
    {
        return [
            'category_name.required' => 'Enter Category Name',
            'Resturnt_id.required' => 'Enter Restaurant Name Follow ',
        ];
    }
    /* ---------- finish  function  make  validation -----------------*/

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
            $data = category::findOrFail($id);
            return view("dashpoard.Restaurant.categoryRestaurant.update", compact('data'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('category@index')->with('error', 'category not found');
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
        $request->validate($this->rules(), $this->massages());

        $data = [
            'category_name' => $request->category_name,
        ];
        category::where('id', $id)->update($data);
        return redirect('Restaurant/category')->with('success', "Update (($request->category_name)) Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect('Restaurant/category')->with('success', "The item (($category->category_name))  was deleted successfully ");
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required'
        ]);
        $q = $request->q;
        $filteredUseres = category::where('category_name', 'like', '%' . $q . '%')
            ->orWhere('id', 'like', '%' . $q . '%')->get();

        if ($filteredUseres->count()) {
            return view('dashpoard.Restaurant.categoryRestaurant.index')->with([
                'categories' => $filteredUseres
            ]);
        } else {
            return redirect('/Restaurant/category')->with([
                'error' => "Not Found Result (($q))"
            ]);
        }
    }

}
