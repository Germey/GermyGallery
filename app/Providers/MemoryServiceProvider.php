<?php namespace App\Providers;

use App\Model\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use View, Response;

class MemoryServiceProvider extends ServiceProvider
{

    private $request;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->request = $request;
        $this->composeHappiness();
        $this->composeMemoryTags();
        $this->composeUrlPara($request);
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
     *  compose tags variable.
     */
    private function composeMemoryTags()
    {
        View::composer([
            'memory.show'
        ], function ($view) {
            $unique_tags = $this->getAllTags();
            $view->with([
                'memory_tags' => Response::json($unique_tags)->getContent()
            ]);
        });
        View::composer([
            'memory.create'
        ], function ($view) {
            $unique_tags = $this->getAllTags();
            $unique_tags = array_key_equal_value($unique_tags);
            $view->with([
                'memory_tags' => $unique_tags
            ]);
        });
    }

    /**
     *  compose happiness variable.
     */
    private function composeHappiness()
    {
        View::composer([
            'memory.show',
        ], function ($view) {
            for ($i = 0; $i <= 100; $i ++) {
                $happiness[$i] = $i;
            }
            $view->with([
                'happiness' => Response::json($happiness)->getContent()
            ]);
        });
        View::composer([
            'memory.create',
        ], function ($view) {
            for ($i = 100; $i >= 0; $i --) {
                $happiness[$i] = $i;
            }
            $view->with([
                'happiness' => $happiness
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
        ], function ($view) {
            $view->with([
                'paras' => get_url_para($this->request)
            ]);
        });
    }

    /**
     * Get all unique tags.
     *
     * @return array
     */
    private function getAllTags()
    {
        $unique_tags = [];
        $memory_tags = Memory::all()->lists('tags');
        foreach ($memory_tags as $tag_item) {
            if ($tag_item)
                $unique_tags = array_unique(array_merge($unique_tags, explode(',', $tag_item)));
        }
        return $unique_tags;
    }


}
