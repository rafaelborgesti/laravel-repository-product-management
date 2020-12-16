<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductFormRequest;

class ProductController extends Controller
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository
            ->orderBy('id')
            ->relationships('category')
            ->paginate();

        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        $product = $this->repository->store($request->all());

        return redirect()
            ->route('products.index')
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
        $product = $this->repository->findWhereFirst('id',$id);
        
        if (!$product)
            return redirect()->back();

        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$product = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        $product = $this->repository->delete($id);

        return redirect()
            ->route('products.index')
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
        $product = $this->repository->delete($id);

        return redirect()
            ->route('products.index')
            ->withSuccess('Successfully deleted!');
    }
    
    public function search(Request $request)
    {

        $filters = $request->except('_token');

        $products = $this->repository->search($request);

        return view('admin.products.index',compact('products','filters'));
    }

}
