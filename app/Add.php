<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    public function owner(){
        return $this->belongsTo(User::class);
    }
    protected $fillable=[
        "title","description","cost"
    ];
}
