<?php

namespace Chatty;

use Chatty\Status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'fname', 'lname', 'location','accepted',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName() {
        if ($this->fname && $this->lname) {
            return "{$this->fname} {$this->lname}";
        }
        if ($this->fname) {
            return "$this->fname";
        }
        return null;
    }

    public function getNameOrUsername() {
        return $this->getName() ?: $this->username;
    }

    public function getFnameOrUsername() {
        return $this->fname ?: $this->username;
    }

    public function getAvatarUrl() {
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=25";
    }

    public function statuses() {
        return $this->hasMany('Chatty\Status', 'user_id');
    }

    public function likes() {
        return $this->hasMany('Chatty\Like', 'user_id');
    }

    public function myFriends() {
        return $this->belongsToMany('Chatty\User', 'friends', 'userid', 'friendid');
    }

    public function mutualFriends() {
        return $this->belongsToMany('Chatty\User', 'friends', 'friendid', 'userid');
    }

    public function Friends() {
        return $this->myFriends()->wherePivot('accepted', true)->get()->merge($this->mutualFriends()->wherePivot('accepted', true)->get());
    }

    public function friendRequest() {
        return $this->myFriends()->wherePivot('accepted', false)->get();
    }

    public function friendRequestPending() {
        return $this->mutualFriends()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(User $user) {
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestReceived(User $user) {
        return (bool) $this->friendRequest()->where('id', $user->id)->count();
    }

    public function addFriend(User $user) {
        $this->mutualFriends()->attach($user->id);
    }

    public function acceptFriendRequest(User $user) {
        $this->friendRequest()->where('id', $user->id)->first()->pivot->
        update([
            'accepted' => true,
        ]);
    }

    public function isFriendWith(User $user) {
        return (bool) $this->Friends()->where('id', $user->id)->count();
    }


    public function hasLikedStatus(Status $status) {
        return (bool) $status->likes->where('likeable_id', $status->id)->where('likeable_type', get_class($status))->where('user_id', $this->id)->count();
    }
}
