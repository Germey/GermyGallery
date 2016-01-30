<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use Redirect, View, Flash;
use App\Model\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller {

    private $config_items = [
        'title',
        'description',
        'bar_color',
        'icon_border_color',
        'panel_color',
        'title_color',
        'description_color',
        'date_color',
        'bg_img',
        'is_open',
    ];

    /**
     * Index to config.
     *
     * @return mixed
     */
    public function getIndex()
    {
        return Redirect::to('/manage/config/edit');
    }

    /**
     * Get config page.
     *
     * @return mixed
     */
    public function getEdit()
    {
        return View::make('config.edit')->with([
            'configs' => Config::all()->toArray(),
            'config_items' => $this->config_items,
        ]);
    }

    /**
     * Update configs.
     *
     * @param ConfigRequest $request
     * @return mixed
     */
    public function postUpdate(ConfigRequest $request)
    {
        $configs = $request->all();
        foreach($configs as $key => $value) {
            Config::where('key', '=', $key)->update(['value' => $value]);
        }
        Flash::success('修改成功！');
        return Redirect::to('/manage/config/edit');
    }

}
