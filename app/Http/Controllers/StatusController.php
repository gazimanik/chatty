<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\User;
use Chatty\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function postStatus(Request $request) {
        $this->validate($request, [
            'status' => 'required|max:1500',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);
        
        return redirect()->route('index')->with('info', 'Post created succesfully');
    }

    public function postReply(Request $request, $statusId) {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:250',
        ], [
            'required' => 'Reply required',
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) {
            return redirect()->route('index');
        }

        if (!Auth::user()->isFriendWith($status->user) && Auth::user()->id !== $status->user->id) {
            return redirect()->route('index');
        }

        dd('there ha have a problem');

        // $reply = Status::create([
        //     'body' => $request->input("reply-{$statusId}"),
        // ])->user()->associate(Auth::user());

        // $status->replies()->save($reply);

        // return redirect()->back();
    }

    public function getLike($statusId) {
        $status = Status::find($statusId);
        if (!$status) {
            return redirect()->route('index');
        }

        if (!Auth::user()->isFriendWith($status->user)) {
            return redirect()->route('index');
        }

        if (Auth::user()->hasLikedStatus($status)) {
            return redirect()->back();
        }

        // $like = $status->likes()->create([]);

        // Auth::user()->likes()->save($like);

        // return redirect()->back();

        dd('some thiong going wrong');
    }
}
