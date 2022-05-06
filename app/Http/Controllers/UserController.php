<?php

namespace App\Http\Controllers;
use Alert;
use App\Http\Controllers\Controller;
use App\Models\Cart;
 use App\Models\Product;
 use App\Models\User;
 use App\Models\Order;
 use App\Models\Order_items;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
        public function index()
        {
            $orders = Order::where('user_id',Auth::id())->get();
           return view('user-dashboard',compact('orders'));
        }
        public function vieworder($id)
        {
           $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
           return view('view-order' ,compact('orders'));
        }


        public function viewprofile()
        {
            $user = User::where('id',Auth::id())->first();
             return view('view-profile',compact('user'));
        }
        public function updateprofile(Request $request)
        {
          $user =  User::where('id',Auth::id())->first();
        $user->name = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');

        $user->dob = $request->input('dob');
        $user->update();
        return redirect('user-dashboard')->with('Status', 'Profile Updated  Successfully ');

        }

        public function viewpassword()
        {
            $user = User::where('id',Auth::id())->first();
            return view('view-password',compact('user'));
        }
        public function changepassword(Request $request)
        {

            if (!(Hash::check($request->input('current-password'), Auth::user()->password))) {
// return "hello";
                return redirect()->back()->with("error","Your current password does not matches with the password.");

                // $validatedData = $request->validate([
                //       'current-password' => 'required',
                //      'new-password' => 'required|string|min:8|confirmed',
                //  ]);

                //  //Change Password
                // $user = Auth::user();
                //  $user->password = bcrypt($request->input('new-password'));
                //  $user->save();

                //  return redirect('user-dashboard')->with('Status', 'Password Changed  Successfully ');
            }
            if(strcmp($request->input('current-password'), $request->input('new-password')) == 0){
                           // Current password and new password same
                            return redirect()->back()->with("error","New Password cannot be same as your current password.");
                        }
                        $validatedData = $request->validate([
                                  'current-password' => 'required',
                                 'new-password' => 'required|string|min:8|confirmed',
                             ]);
//  //Change Password
                $user = Auth::user();
                 $user->password = bcrypt($request->input('new-password'));
                 $user->update();

                 return redirect('user-dashboard')->with('Status', 'Password Changed  Successfully ');
          }

}
