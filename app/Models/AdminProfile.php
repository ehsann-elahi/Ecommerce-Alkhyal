<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminProfile extends Model
{
    use Notifiable;

    public function admin(){
    	return $this->belongsTo('\App\Models\Admin');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id','first_name', 'last_name','email','image',
    ];
    
}
