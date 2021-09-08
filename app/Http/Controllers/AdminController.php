<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function user()
    {
        $data = User::all();
        return view("admin.user", compact("data"));

    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function foodmenu()
    {

        $data = Food::all();

        return view("admin.foodmenu",compact("data"));

    }

    public function updateview($id)
    {

        $data = Food::find($id);

        return view("admin.updateview", compact("data"));

    }

    public function update(Request $request, $id)
    {

        $data = Food::find($id);

        $image = $request->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();

      $request->image->move('foodimage', $imagename);

      $data->image= $imagename;

      $data->title = $request->title;

      $data->price = $request->price;

      $data->description = $request->description;

      $data->save();

      return redirect()->back();

    }

    public function upload(Request $request)
    {

      $data = new Food();

      $image = $request->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();

      $request->image->move('foodimage', $imagename);

      $data->image= $imagename;

      $data->title = $request->title;

      $data->price = $request->price;

      $data->description = $request->description;

      $data->save();

      return redirect()->back();

    }

    public function deletemenu($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function reservation(Request $request)
    {

      $data = new Reservation();

      $data->name = $request->name;

      $data->email = $request->email;

      $data->phone = $request->phone;

      $data->guest = $request->guest;

      $data->date = $request->date;

      $data->time = $request->time;

      $data->message = $request->message;


      $data->save();

      return redirect()->back();

    }

    public function viewreservation()
    {

        if (Auth::id()) {

            $data = Reservation::all();

            return view('admin.adminreservation', compact("data"));
        }

        else {
            return redirect('login');
        }
    }


    public function viewchef()
    {

        $data = Foodchef::all();
        return view('admin.adminchef', compact("data"));
    }

    public function uploadchef(Request $request)
    {

      $data = new Foodchef();

      $image = $request->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();

      $request->image->move('chefimage', $imagename);

      $data->image= $imagename;

      $data->name = $request->name;

      $data->speciality = $request->speciality;

      $data->save();

      return redirect()->back();

    }

    public function updatechef($id){

        $data = Foodchef::find($id);

        return view("admin.updatechef",compact("data"));

    }

    public function updatefoodchef(Request $request, $id){

        $data = Foodchef::find($id);

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('chefimage', $imagename);

            $data->image= $imagename;
        }



        $data->name = $request->name;

        $data->speciality = $request->speciality;

        $data->save();

        return redirect()->back();



    }

    public function deletechef($id)
    {
        $data = Foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orders()
    {
        $data = Order::all();
        return view('admin.orders', compact('data'));
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $data = Order::where('name', 'Like', '%'.$search.'%')->orWhere('foodname', 'Like', '%'.$search.'%')->get();
        return view('admin.orders', compact('data'));
    }

}
