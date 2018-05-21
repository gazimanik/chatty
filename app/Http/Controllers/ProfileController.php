<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\User;
use Chatty\Status;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username) {

        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404);
        }

        $statuses = $user->statuses()->notReply()->get();

        return view('profile.index')->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::user()->isFriendWith($user));

        // if (Auth::check() || Auth::user()) {
        //     $statuses = Status::notReply()->where(function ($query) {
        //         return $query->where('user_id', Auth::user()->id)->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
        //     })->orderBy('created_at', 'desc')->paginate(100);
        //     return view('timeline.index')->with('statuses', $statuses);
        // }
    }

    public function getEdit() {
        return view('profile.edit');
    }

    public function postEdit(Request $request) {
        $this->validate($request, [
            'fname' => 'max:20',
            'lname' => 'max:20',
            'location' => 'max:40',
        ]);

        Auth::user()->update([
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'location'=>$request->input('location'),
        ]);

        return redirect()->route('profile.edit')->with('info', 'Profile Updated successfully');
    }
}
