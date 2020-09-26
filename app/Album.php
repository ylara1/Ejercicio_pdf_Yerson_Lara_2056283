<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "albums";
    protected $primaryKey = "AlbumId";
    public $timestamps = false;

    public function canciones()
    {
        # code...
        return $this->hasMany('App\Cancion', 'AlbumId');
    }
}
