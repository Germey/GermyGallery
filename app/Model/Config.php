<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

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

}
