<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['user_id','menu_id','expire'];
    
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
