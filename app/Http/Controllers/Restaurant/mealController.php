<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\meal;
use App\model\category;
use App\model\order;
use App\Blogger;
use App\User;
use App\Hellper\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use mysql_xdevapi\Session;

class mealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogger = auth('blogger')->user();
        $meal = $blogger->getMeal;
        return view('dashboard.Restaurant.meal.index', compact('meal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogger = auth('blogger')->user();
        $category = $blogger->categories;
        return view('dashboard.Restaurant.meal.create', compact('category'));
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

        $meal = new meal();
        $meal->name = $request->input('name');
        $meal->details = $request->input('details');
        $meal->price = $request->input('price');
        $meal->category_id = $request->input('category_id');
        $meal->Resturnt_id = $request->input('Resturnt_id');
        $meal->img = $imgfile;

        $result = $meal->save();
        if ($result === TRUE)
            return redirect("Restaurant/meal")->with('success', " Meal Img (($meal->name)) saved successfully");
    }

    private function rules($id = null)
    {
        return [
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'Resturnt_id' => 'required',
            'category_id' => 'required',
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
            'price.required' => 'Enter Price Meal',
            'Resturnt_id.required' => 'Enter  Restaurant',
            'category_id.required' => 'Enter  Category Follower',
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
            $meal = meal::findOrFail($id);
            $blogger = auth('blogger')->user();
            $category = $blogger->categories;
            return view("dashboard.Restaurant.meal.update", compact('meal', 'category'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('Restaurant/meal')->with('error', 'Img Not Found');
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
            //find model meal
            $meal = meal::findOrFail($id);
            $oldName = $meal->name;

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
                $meal->img = $imgfile;
            }
            $meal->name = $request->input('name');
            $meal->details = $request->input('details');
            $meal->price = $request->input('price');
            $meal->category_id = $request->input('category_id');
            $meal->Resturnt_id = $request->input('Resturnt_id');
            $meal->update();
            return redirect('/Restaurant/meal')->with('success', "Meal $oldName Updated  Successfully");

        } catch (ModelNotFoundExeption $modelNotFoundExeption) {
            return redirect('/Restaurant/meal')->with('error', 'Meal Not Found');
        }
//        Blogger::where('id', $id)->update($Restaurant);
        return redirect('/Restaurant/meal')->with('success', "Update (($request->details)) Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = meal::find($id);
        $meal->delete();
        return redirect('Restaurant/meal')->with('success', " Meal  (( $meal->name ))  was deleted successfully ");
    }


    public function addToCart(meal $meal)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($meal);
//        dd($cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', " add successfully");
    }

    public function showCart()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;

        }
        return view('cart.ShowCart', compact('cart'));

    }


    public function checkout($amount)
    {
        return view('cart.checkout', compact('amount'));
    }


    public function charge(Request $request)
    {
//      dd($request->stripeToken);
        $charge = stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount' => $request->amount,
            'description' => 'Test form laravel  new app',
        ]);
        $chargeId = $charge['id'];

        if ($chargeId) {
            //1_save order in order table

            auth()->user()->orders()->create([
                'cart' => serialize(session()->get('cart')),
            ]);

            //2_clear session
            session()->forget('cart');

            return redirect('/')->with('success', "انتهت عملية الدفع بنجاح شكراً");
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\model\meal $meal
     * @return \Illuminate\Http\Response
     */

    public function destroyCart(meal $meal)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($meal->id);
        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            //save in session
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'تم ازاله المنتح بنجاح');

    }

    private function rules2()
    {
        return [
            'qty' => 'required|numeric',
        ];
    }

    private function massages2()
    {
        return [
            'qty.required' => 'يجب ملئ حقل الكمية لايمكنك تركه فارغاً ',
            'qty.numeric' => 'يجب ان يحتوي الحقل على رقم فقط لايمكن ان يحتوي على حروف',
        ];
    }


    public function updateQtyAndPriceOrder(Request $request, meal $meal)
    {
        $request->validate($this->rules2(), $this->massages2());

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($meal->id, $request->qty);
        //save in session
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'update quantity meal successfully');

    }


}
