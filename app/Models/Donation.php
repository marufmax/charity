<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['causes_id','amount','donated_by','status','type'];

    protected $dates = ['created_at', 'updated_at'];

    public function cause()
    {
        return $this->belongsTo(Causes::class, 'causes_id');
    }

    public function donor()
    {
        return $this->hasOne(User::class, 'id', 'donated_by');
    }
}
