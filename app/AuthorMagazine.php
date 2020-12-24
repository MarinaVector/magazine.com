<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorMagazine extends Pivot
{
    protected $table = 'author_magazine';

    protected $fillable = [
        'author_id', 'magazine_id'
    ];
}
