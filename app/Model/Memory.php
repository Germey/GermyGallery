<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['images'];

    /**
     * Get images belong to this memory.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getImages()
    {
        return $this->hasMany('App\Model\Image', 'memory_id');
    }


}
