<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['images'];


    /**
     * Get the memory this image belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMemory()
    {
        return $this->belongsToMany('App\Model\Memory', 'memory_id');
    }

}
