<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get token kind.
     *
     * @return mixed
     */
    public function getKind()
    {
        $kind_map = Config::getConfigValueByKey('auth_kind');
        return $kind_map[$this->getAttribute('kind')];
    }


}
