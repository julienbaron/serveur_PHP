<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achete extends Model
{
    protected $table = 'achete';
    public $timestamps = false;
    protected $fillable = ['id_commande', 'id_users'];

}
