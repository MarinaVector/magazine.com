<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Author extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'patronymic'
    ];

    public function magazines()
    {
        return $this->belongsToMany(
            Magazine::class,
            'author_magazine',
            'author_id',
            'magazine_id'
        );
    }
}
