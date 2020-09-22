<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    /**
     * @var EloquentRepository
     */
    protected $postRepository;

    public function __construct(EloquentRepository $postEloquentRepository)
    {
        $this->postRepository = $postEloquentRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function index()
    {
        return $this->postRepository->getAll();
    }

    /** Show one
     * @param $id
     * @return Model
     */
    public function show($id)
    {
        return $this->postRepository->find($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy ($id)
    {
        return $this->postRepository->delete($id);
    }
}
