<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Film extends Model
{
    use Searchable;
    protected $table = 'film';

    protected $primaryKey = 'film_id';

    public $timestamps = false;

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'film_actor');
    }

    public function toSearchableArray()
    {
        return [
            'film_id' => $this->film_id,
            'title' => $this->title,
            'description' => $this->description,
            'actors' => $this->actors->implode('name', ', '),
        ];
    }
}