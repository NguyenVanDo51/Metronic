<?php


namespace App\Http\View\Composers;

use App\Model\Post;
use Illuminate\View\View;

class TestComposer
{
    public function compose(View $view)
    {
        try {
            $post = Post::all();
            $view->with('channels', $post);
        } catch (\Exception $exception) {
            logger([
                'Error in TestComposer' => $exception->getMessage()
            ]);
        }
    }
}
