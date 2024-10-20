<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;

class AdminController extends Controller
{
    public function index(){
        if(Auth::check())
        {
            $usertype =Auth()->user()->usertype;

            if($usertype == 'user')
            {
                $room =Room::all();
                return view('home.index',compact('room'));
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->black();
            }

        }
    }

    public function home(){
        $room =Room::all();
        return view('home.index',compact('room'));
    }

    public function create_room(){
        return view('admin.create_room');
    }
    public function add_room(request $request){
        $data =new Room();

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }

        $data->save();
        return redirect()->back(); 
    }

    public function view_room(){
        $data =Room::all();
        return view('admin.view_room',compact('data'));
    }
    public function room_delete($id){
        $data =Room::find($id);
        $data->delete();
        return redirect()->back(); 
    }
    public function room_update($id){
        $data =Room::find($id);
        return view('admin.room_update',compact('data'));
    }
    public function edit_room(Request $request ,$id){

        $data =Room::find($id);

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }

        $data->save();
        return redirect()->back();
    }

    public function bookings(){
        $data=Booking::all();
        return view('admin.booking',compact('data'));
    }

    public function delete_booking($id){
        $data =Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function approve_book($id){
        $booking= Booking::find($id);
        $booking->status='approve';
        $booking->save();
        return redirect()->back();
    }
    public function reject_book($id){
        $booking= Booking::find($id);
        $booking->status='rejected';
        $booking->save();
        return redirect()->back();
    }

    public function veiw_gallary(){
        $gallary =Gallary::all();
        return view('admin.gallary',compact('gallary'));
    }
    
    public function upload_gallary(Request $request){
        $data= new Gallary;
        $image =$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('gallary',$imagename);
            $data->image= $imagename;
            $data->save();
            return redirect()->back();
        }

    }

    public function delete_gallary($id){
        $data = Gallary::find($id);
        $data->delete();
        return redirect()->back();

    }
}
