<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Magazine extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'description',
        'image',
        'create_date',
        'author_id'
    ];

    public function authors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        /*return $this->belongsToMany(
        Author::class,
        'author_magazine',
            'magazine_id',
            'author_id'
        );
        */
        return $this->belongsToMany('App\Author')->withTimestamps();
    }
}
