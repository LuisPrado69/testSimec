<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Players
 * @package App\Models
 */
class Players extends Model
{

    /**
     * @var string
     */
    protected $table = 'players';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias',
        'game',
        'score'
    ];
}
