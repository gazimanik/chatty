<?php

namespace Chatty\Http\Controllers;

use DB;
use Auth;
use Chatty\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex() {
        $friend = Auth::user()->friends();
        $request = Auth::user()->friendRequest();
        return view('friend.index')->with('friend', $friend)->with('request', $request);
    }

    public function getAdd($username) {
        $user = User::where('username', $username)->first();

        if (!$user) {
           return redirect()->route('index')->with('info', 'User Not Found');
        }

        if (Auth::user()->id === $user->id) {
            return redirect()->route('index')->with('info', 'You cannot add yourself');
        }

        if (Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())) {
            return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'Friend request already pending');
        }

        if (Auth::user()->isFriendWith($user)) {
            return redirect()->route('profile.index', ['username'=>$user->username])->with('info', 'You are already friend');
        }

        Auth::user()->addFriend($user);

        return redirect()->route('profile.index', ['username' => $username])->with('info', 'friend request sent');
    }
    
    public function getAccept($username) {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->route('index')->with('info', 'User Not Found');
        }

        if (!Auth::user()->hasFriendRequestReceived($user)) {
            return redirect()->route('index');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()->route('profile.index', ['username' => $username])->with('info', 'Friend request accepted');
    }
}
