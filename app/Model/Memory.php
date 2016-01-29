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

    /**
     * Tags array to string.
     *
     * @param $tags
     */
    public function setTagsAttribute($tags)
    {
        if (is_array($tags)) {
            $this->attributes['tags'] = join(',', $tags);
        }
    }

    /**
     * Tags array to string.
     *
     * @param $tags
     */
    public function setDateEndAttribute($date_end)
    {
        if (! $date_end != '0000-00-00') {
            $this->attributes['date_end'] = $date_end;
        }
    }

}
