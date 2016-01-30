<?php namespace App\Providers;

use App\Model\Config;
use Illuminate\Support\ServiceProvider;
use View;

class ConfigServiceProvider extends ServiceProvider
{

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
    public function boot()
    {
        $this->composeConfigItems();
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
                    'is_open' => [
                        '1' => '开放',
                        '0' => '需密钥',
                    ]
                ]
            ]);
        });
    }

}
