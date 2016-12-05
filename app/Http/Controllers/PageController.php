<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use App\Order;
use App\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller{
    
    public function __construct(){
        $user = Auth::user();
        $days = [];
        for ($i = 0; $i<7;$i++){
            $day = Carbon::today()->addDays($i)->toDateString();
            $days[$i]= $day;
        }

        //$nav_links = ['/' => 'Home', 'menu' => 'Menu', 'order' => 'Order'];
        view()->share('user',$user);
        view()->share('tomorrow',$days[1]);
        view()->share('days',$days);
    }
    
    public function getHome(){
        return view('home');
    }
    
    
    public function getEditMeals(){
        return view('editmeals');
    }
    
    public function postEditMeals(Request $request){
        $soup = $request->input('soup');
        $name = $request->input('name');
        $price = $request->input('price');
        $day_in_week = $request->input('day_in_week');
        $about = $request->input('about');
        
        $meal = new Menu();
        $meal->soup = $soup;
        $meal->name = $name;
        $meal->price = $price;
        $meal->day_in_week = $day_in_week;
        $meal->about = $about;
        $meal->save();

        return redirect()->action('PageController@getMenu');
        
    }
    
    public function getAdmin(){
        $users = User::all();
        return view('admin', ['users'=>$users]);
    }
    
    public function getOrder(){
         return view('orderlist');
    }
    
    public function getMenu(){
        $menu = Menu::orderBy('day_in_week')->get();
        return view('showmeals', ['menu' => $menu]); 
    }
    
    public function getMenuid($id){
        if ($id =="{id}"){
            $id = 1+ date("w",strtotime(Carbon::today()));
        }
        $menu = Menu::where("day_in_week","=",$id)->get();
        
        return view('meals', ['menu' => $menu]); 
    }
    
    public function getLogout(){
        Auth::logout();
    }
    
    public function getDelete($id){
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->action('PageController@getMenu');
    }
    
    public function getUpdateForm($id){
        $menu = Menu::find($id);
        return view("update", ['menu' => $menu]);
    }
    
    public function postUpdate($id, Request $request){
        $soup = $request->input('soup');
        $name = $request->input('name');
        $price = $request->input('price');
        $day_in_week = $request->input('day_in_week');
        $about = $request->input('about');
        
        $menu = Menu::where("id", "=", $id)->first();
        $menu->update(["soup" => $soup,
            "name" => $name,
            "price" => $price,
            "day_in_week" => $day_in_week,
            "about" => $about]);
    return redirect()->action('PageController@getMenu');
    }
    
    public function postPayment(Request $request){
        $payment = $request->input('payment');
        $user_id = $request->input('user_id');
        $user = User::where("id", "=", $user_id)->first();
        $wallet = $user->wallet;
        $wallet = $wallet + $payment;
        $user->update(["wallet" => $wallet]);
        return redirect()->action('PageController@getAdmin');
        
    }

    public function postAddOrder(Request $request){
        $user_id = $request->input('user_id');
        $menu_id = $request->input('menu_id');
        $expire = $request->input('expire');
        $order = new Order;
        $wallet = User::where("id", "=", $user_id)->first();
        $order->menu_id = $menu_id;
        $order->user_id = $user_id;
        $order->expire = $expire;
        $order->save();
        $wallet->update(["wallet" => $request->input('wallet')]);
        return redirect()->action('PageController@getOrder');
        
    }
    
    public function postDelOrder(Request $request){
        $user_id = $request->input('user_id');
        $order_id = $request->input('order_id');
        $dorder = Order::find($order_id);
        $wallet = User::where("id", "=", $user_id)->first();
        $wallet->update(["wallet" => $request->input('wallet')]);
        $dorder-> delete();

        return redirect()->action('PageController@getOrder');
  }
  
    
    
}
