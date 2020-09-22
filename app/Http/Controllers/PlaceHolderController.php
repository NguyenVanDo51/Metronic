<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class PlaceHolderController extends Controller
{
    public function index()
    {
        return view('placeholder.index', [
            'posts' => $this->getData()
        ]);

    }

    public function getData()
    {
        $posts = Http::get('https://jsonplaceholder.typicode.com/posts');

        $posts = json_decode($posts->body(), true);
        return $posts;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'titleNew' => 'required',
           'bodyNew' => 'required',
           'userIdNew' => ['required', 'numeric']
        ]);

        $post = Http::post('https://jsonplaceholder.typicode.com/posts',[
            'title' => $data['titleNew'],
            'body' => $data['bodyNew'],
            'userId' => $data['userIdNew']
        ]);
//        dd(json_decode($post->body(), true));
        return redirect()->route('placeholder.index');
    }

    public function update (Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'userId' => ['required', 'numeric']
        ]);

        $post = Http::put('https://jsonplaceholder.typicode.com/posts/' . $data['id'], [
            'id' => $data['id'],
            'userId' => $data['userId'],
            'title' => $data['title'],
            'body' => $data['body']
        ]);
//        dd(json_decode($post->body(), true));
        return redirect()->route('placeholder.index');
    }

    public function destroy(Request $request)
    {
        $post = Http::delete('https://jsonplaceholder.typicode.com/posts/' . $request->input('idDelete'));

//        dd($post->body());
        return redirect()->route('placeholder.index');
    }
}
