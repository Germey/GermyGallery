<?php namespace App\Providers;

use App\Model\Config;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use View;

class ConfigServiceProvider extends ServiceProvider
{

    private $request;

    /**
     * Overwrite any vendor / package configuration.
     *
     * This service provider is intended to provide a convenient location for you
     * to overwrite any "vendor" or package configuration that you may want to
     * modify before the application handles the incoming request / command.
     *
     * @return void
     */
    public function register()
    {
        config([
            //
        ]);
    }

    /**
     * Config boot.
     */
    public function boot(Request $request)
    {
        $this->request = $request;
        $this->composeConfigItems();
        $this->composeUrlPara();
        $this->composeAuthKind();
        $this->composeSkin();
    }

    /**
     * Compose config variable.
     */
    private function composeConfigItems()
    {
        View::composer(['display.show', 'auth.index'], function ($view) {
            $view->with([
                'configs' => Config::all()->lists('value', 'key')
            ]);
        });
        View::composer(['config.edit'], function ($view) {
            $view->with([
                'select_items' => [
                    'is_open' => Config::getConfigValueByKey('open_map')
                ]
            ]);
        });
    }

    /**
     *  compose url para.
     */
    private function composeUrlPara()
    {
        View::composer([
            'memory.index',
            'token.index',
        ], function ($view) {
            $view->with([
                'paras' => get_url_para($this->request)
            ]);
        });
    }


    /**
     *  compose auth kind.
     */
    private function composeAuthKind()
    {
        View::composer([
            'token.create',
        ], function ($view) {
            $view->with([
                'auth_kind' => Config::getConfigValueByKey('auth_kind')
            ]);
        });
    }

    /**
     *  compose skin.
     */
    private function composeSkin()
    {
        View::composer([
            'manage.options',
        ], function ($view) {
            $view->with([
                'skin' => Config::getConfigValueByKey('skin')
            ]);
        });
    }



}
