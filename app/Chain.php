<?php
/**
 * Created by PhpStorm.
 * User: GilEO
 * Date: 01.12.2017
 * Time: 8:48
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    public $timestamps = false;

    protected $table = "chain";

    protected $fillable = [
        'value',
        'hash'
    ];

}