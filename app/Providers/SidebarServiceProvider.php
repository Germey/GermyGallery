<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Http\Request;

class SidebarServiceProvider extends ServiceProvider
{

    /**
     * The manage_path array.
     *
     * @array Guard
     */
    private $manage_path;


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->manage_path = $this->getRequestPath($request);
        $this->composeSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose sidebar variable.
     */
    private function composeSidebar()
    {
        View::composer('manage.sidebar', function ($view) {
            $view->with([
                'manage_path' => $this->getManagePath(),
                'menu_items' => $this->getMenuItems(),
            ]);
        });
    }

    /**
     * Get paths behind 'manage'.
     *
     * @param $request
     */
    private function getRequestPath($request)
    {
        $path = parse_url($request->server()['REQUEST_URI'])['path'];
        $paths = explode('/', $path);
        if (in_array('manage', $paths)) {
            $requestPath = array_slice($paths, 2);
            return $requestPath;
        }
    }

    /**
     * Return manage_path.
     *
     * @return mixed
     */
    public function getManagePath()
    {
        return $this->manage_path;
    }

    /**
     * Get menu items array.
     *
     * @return mixed
     */
    public function getMenuItems()
    {
        return [
            ['path' => '/', 'text' => '首页', 'icon' => 'home'],
            ['path' => 'memory', 'text' => '记忆管理', 'icon' => 'flag-o'],
            ['path' => 'config', 'text' => '站点设置', 'icon' => 'gear'],
            ['path' => 'token', 'text' => '密钥设置', 'icon' => 'key'],
        ];
    }


}
