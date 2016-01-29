<?php namespace App\Providers;

use App\Model\Memory;
use Illuminate\Support\ServiceProvider;
use View, Response;

class MemoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeMemoryTags();
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
            'memory.show',
        ], function ($view) {
            $unique_tags = [];
            $memory_tags = Memory::all()->lists('tags');
            foreach ($memory_tags as $tag_item) {
                if ($tag_item)
                    $unique_tags = array_unique(array_merge($unique_tags, explode(',', $tag_item)));
            }
            $view->with([
                'memory_tags' => Response::json($unique_tags)->getContent()
            ]);
        });
    }

}
