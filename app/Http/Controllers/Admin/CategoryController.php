<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{

    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->paginate();

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $this->repository->store([
            'title' => $request->title,
            //'url' => $request->url,
            'description' => $request->description
        ]);

        return redirect()
            ->route('categories.index')
            ->withSuccess('Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->repository->findById($id);

        if (!$category)
            return redirect()->back();

        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$category = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $this->repository->update($id,[
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);
        
        return redirect()
            ->route('categories.index')
            ->withSuccess('Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->repository->delete($id);
        
        return redirect()
            ->route('categories.index')
            ->withSuccess('Successfully deleted!');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $categories = $this->repository->search($data);
        
        return view('admin.categories.index',compact('categories','data'));
    }

}
