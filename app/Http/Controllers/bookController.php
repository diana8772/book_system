<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirect;
use DB;
use Session;
use Auth;
class bookController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $member_id = auth()->user()->member_id;
        $book_id = $request->input("book_id",'');
        $book_name = $request->input("book_name", '');
        $book_author = $request->input("book_author", '');
        $book_publisher = $request->input("book_publisher", '');
        if($request->has('save')) $save = key($request->input('save'));
        if($request->has('insert_id')) $insert_id = $request->input('insert_id');
        if($request->has('delete')) $delete = key($request->input('delete'));
        if($request->has('lends')) $lends = $request->input('lends');
        $book_names = $request->input("book_names");
        $book_authors = $request->input("book_authors");
        $book_publishers = $request->input("book_publishers");
        $book_languages = $request->input("book_languages");
        if($request->has('save'))
        {
            DB::table("book")
              ->where('book_id', $save)
              ->update([
                  'book_name' => $book_names,
                  'book_publisher' => $book_publishers,
                  'book_language' => $book_languages,
              ]);
            DB::table("author")
              ->where('book_id', $save)
              ->update([
                  'book_author' => $book_authors,
              ]);
        }
        if($request->has('delete'))
        {
            DB::table("book")
              ->where('book_id', $delete)
              ->delete();
            DB::table("author")
              ->where('book_id', $delete)
              ->delete();
        }
        if($request->has('insert'))
        {
            $lend_number = key($request->input('insert'));
            $max_lend_id = DB::table("lend_borrow")
                             ->max("lend_borrow_id")+1;

            $insert_id = $request->input('insert_id');
            DB::table("lend_borrow")
              ->insert([
                    'lend_borrow_id' => $max_lend_id,
                    'member_id' => $insert_id,
                    'book_id' => $lend_number,
                    'lend_time' => date("Y-m-d H:i:s"),
                    'borrow_time' => date("Y-m-d H:i:s"),
                    'book_status' => 'NO',
                ]);
            DB::table("book")
              ->where('book_id', $lend_number)
              ->update([
                    'book_dynamic' => 'NO',
                ]);
        }
        if($request->has('search') && $book_id == '' && $book_name == '' && $book_author == '' && $book_publisher == '')
            return redirect('book');
        if($request->has('logout'))
        {
            Auth::logout();
            return redirect('');
        }
        $book = DB::table("book")
                  ->select('author.book_id',
                           'book_name',
                           'book_publisher',
                           'book_language',
                           'book_dynamic',
                           'author.book_author'
                           )
                  ->join('author', 'author.book_id', 'book.book_id')
                  ->where(function($query) use ($book_id)
                        {
                        if(!empty($book_id)):
                            $query->Where('author.book_id', $book_id);
                        endif;
                     })
                  ->where(function($query) use ($book_name)
                        {
                        if(!empty($book_name)):
                            $query->Where('book_name','like', DB::raw("'%$book_name%'"));
                        endif;
                     })
                   ->where(function($query) use ($book_author)
                        {
                        if(!empty($book_author)):
                            $query->Where('author.book_author','like', DB::raw("'%$book_author%'"));
                        endif;
                     })
                   ->where(function($query) use ($book_publisher)
                        {
                        if(!empty($book_publisher)):
                            $query->Where('book_publisher','like', DB::raw("'%$book_publisher%'"));
                        endif;
                     })
                  ->get();
        return view('book',
            compact(
                'book'
            )
        );
    }
    public function personal(Request $request)
    {
        $member_id = auth()->user()->member_id;
        if($request->has('borrows'))
        {
            $borrows_number = key($request->input('borrows'));
            DB::table("lend_borrow")
              ->where('member_id', $member_id)
              ->where('book_id', $borrows_number)
              ->update([
                    'borrow_time' => date("Y-m-d H:i:s"),
                    'book_status' => 'YES',
                ]);
            DB::table("book")
              ->where('book_id', $borrows_number)
              ->update([
                    'book_dynamic' => 'YES',
                ]);
        }
        if($request->has('logout'))
        {
            Auth::logout();
            return redirect('');
        }
        $personal = DB::table('lend_borrow')
                      ->select('lend_borrow_id',
                               'member_id',
                               'book.book_id',
                               'book.book_name',
                               'lend_time',
                               'borrow_time',
                               'book_status'
                           )
                      ->where('member_id', $member_id)
                      ->join('book', 'lend_borrow.book_id', 'book.book_id')
                      ->get();
        return view('member_lend',
            compact(
                'personal'
            )
        );
    }
    public function detail(Request $request)
    {
        $member_id = auth()->user()->member_id;
        if($request->has('lends'))
        {
            $lend_number = key($request->input('lends'));
            $max_lend_id = DB::table("lend_borrow")
                             ->max("lend_borrow_id")+1;
            DB::table("lend_borrow")
              ->insert([
                    'lend_borrow_id' => $max_lend_id,
                    'member_id' => $member_id,
                    'book_id' => $lend_number,
                    'lend_time' => date("Y-m-d H:i:s"),
                    'borrow_time' => date("Y-m-d H:i:s"),
                    'book_status' => 'NO',
                ]);
            DB::table("book")
              ->where('book_id', $lend_number)
              ->update([
                    'book_dynamic' => 'NO',
                ]);
        }
        if($request->has('logout'))
        {
            Auth::logout();
            return redirect('');
        }
        $book_detail = DB::table("book")
                         ->select('author.book_id',
                                  'book_name',
                                  'book_publisher',
                                  'book_language',
                                  'book_dynamic',
                                  'author.book_author',
                                  'book_publish_time',
                                  'book_summary',
                                  'book_image'
                             )
                         ->join('author', 'author.book_id', 'book.book_id')
                         ->where('book.book_id', $request->input('book_id'))
                         ->get();
        return view('book_detail',
            compact(
                'book_detail'
            )
        );
    }
}
