<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserProfile extends Model
{
    use Notifiable;

    public function user(){
    	return $this->belongsTo('\App\Models\User');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','mobile_number','address','email','image',
    ];
    
}
