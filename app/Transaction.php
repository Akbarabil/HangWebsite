<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'ID_TRANS';
    public $timestamps = false;
    public $incrementing = false;
}
