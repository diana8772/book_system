<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirect;
use DB;
use Session;
use Auth;
class commentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        $member_id = auth()->user()->member_id;
        $email = $request->input("email",'');
        $phone = $request->input("phone", '');
        $message = $request->input("message", '');
        if($request->has('insert')) $save = key($request->input('insert'));
        if($request->has('insert'))
        {
            $max_id = DB::table("comment")
                        ->max("comment_id")+1;
            DB::table("comment")
              ->insert([
                  'comment_id' => $max_id,
                  'phone' => $phone,
                  'email' => $email,
                  'comment' => $message,
                  'comment_time' => date('Y-m-d H:i:s'),
              ]);
        }
        if($request->has('logout'))
        {
            Auth::logout();
            return redirect('');
        }
        return view('comment',
            compact(
                'member_id'
            )
        );
    }
}
