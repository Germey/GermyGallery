<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get config value.
     *
     * @return mixed
     */
    public static function getConfigValueByKey($key)
    {
        $value = Config::where('key', $key)->first()->value;
        return $value;
    }

    /**
     * Unserialized variable to array.
     *
     * @param $education
     * @return string
     */
    public function getValueAttribute($value)
    {
        if (is_serialized($value)) {
            return unserialize($value);
        }
        return $value;
    }


    /**
     * If value is kind of array. Then to sequence.
     *
     * @param $value
     */
    public function setValueAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['value'] = serialize($value);
        } else {
            $this->attributes['value'] = $value;
        }
    }

}
