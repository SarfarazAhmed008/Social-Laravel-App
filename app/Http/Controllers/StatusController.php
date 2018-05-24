<?php

namespace App\Http\Controllers;

use App\Status;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatusController extends Controller
{
   public function postCreateStatus(Request $request){
       $this->validate($request, [
          'body' => 'required|max:1000'
       ]);

       $body = $request['body'];
       $status = new Status();
       $status->body = $body;

       $message = 'Some error has occured!!';
       if ($request->user()->statuses()->save($status))
       {
           $message = 'Status Updated Successfully!';
       }

       return redirect()->route('dashboard')->with(['message' => $message ]);
   }
   public function getDashboard()
   {
       if (!Auth::check())
       {
           return redirect()->back()->with(['fail' => 'You are not logged in !!']);
       }
       $statuses = Status::orderBy('created_at', 'desc')->get();
       return view('dashboard', ['statuses' => $statuses]);
   }
   public function getDeleteStatus($status_id)
   {
       $status = Status::where('id', $status_id)->first();
       if (Auth::user() != $status->user)
       {
           return redirect()->back();
       }
       $status->delete();
       return redirect()->back()->with(['message' => 'Status deleted successfully!!']);
   }
   public function getLogout()
   {
       Auth::logout();
       return redirect()->route('index')->with(['message' => 'Successfully logout!!' ]);
   }

   public function postEditStatus(Request $request)
   {
       $this->validate($request, [
          'body' => 'required'
       ]);

       $status = Status::find($request['postId']);
       if (Auth::user() != $status->user)
       {
           return redirect()->back();
       }
       $status->body = $request['body'];
       $status->update();

       //return response()->json(['message' => 'Status updated successfully!']);
       return response()->json( ['body-status' => $status->body], 200);
   }

   public function postLikeStatus(Request $request)
   {
        $status_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $status = Status::find($status_id);
        if (!$status)
        {
            return null;
        }
        $user  = Auth::user();
        $like = $user->likes()->where('status_id', $status_id )->first();
        if ($like)
        {
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like)
            {
                $like->delete();
                return null;
            }
        }
        else
        {
            $like = new Like();
        }
        $like->user_id = $user->id;
        $like->status_id = $status->id;
        $like->like = $is_like;
        if ($update)
        {
            $like->update();
        }
        else
        {
            $like->save();
        }
        return null;
   }

}
