<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Fjord\Crud\Models\Traits\Sluggable;

class Group extends Model
{
    use TrackEdits, Sluggable;

    /**
     * Setup Model:
     *
     * Enter all fillable columns. Translated columns must also be set fillable.
     * Don't forget to also set them fillable in the coresponding translation-model!
     */


    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = ['title', 'text'];



        /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function partners() {
        return $this->hasMany('\App\Models\Partner');
    }

}
