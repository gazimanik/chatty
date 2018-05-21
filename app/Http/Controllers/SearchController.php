<?php

namespace Chatty\Http\Controllers;

use DB;
use Chatty\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResult(Request $request) {
        $query = $request->input('query');
        if (!$query) {
            return redirect()->route('index');
        }

        $users = User::where(DB::raw("CONCAT(fname,' ', lname)"), 'LIKE', "%{$query}%")->orWhere('username', 'LIKE', "%{$query}%")->get();

        return view('search.result')->with('users', $users);
    }
}
