<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public  function index(Wishlist $wishlist){
        $wishs=$wishlist->getData();
        // dd( $wishs);
        return view('frontEnd.Wishlist',compact('wishs'));
    }
    public function add(Wishlist $wishlist , $id){

        if ($wishlist->storeRecord($id)) {
            return response()->json([
                'message_alert' => 'Add success product to wishlist',
                'title'=>'success'
            ]);
           
        }else{
            return response()->json([
                'message_alert' => 'Products already in wishlist',
                'title'=>'warning'
            ]);
        }
       
    }
    public function remove($id){
        Wishlist::destroy($id);
        return response()->json([
            'message_alert' => 'Remove success product to wishlist',
            'title'=>'success'
        ]);
    }
}
