<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductFormRequest;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->with('category')->paginate(2);
        
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
        $product = $this->product->create($request->all());

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
        $product = $this->product->with('category')->where('id',$id)->first();
        
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
        if (!$product = $this->product->find($id))
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
        $product = $this->product
            ->find($id)
            ->update($request->all());

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
        $product = $this->product->find($id)->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess('Successfully deleted!');
    }
    
    public function search(Request $request)
    {

        $filters = $request->except('_token');

        $products = $this->product
            ->with('category')
            ->where(function($query) use ($request){
                if ($request->has('name')){
                    $filter = $request->name;
                    $query->where(function($querySub) use ($filter){
                        $querySub->where('name','LIKE',"%{$filter}%")
                            ->orWhere('description','LIKE',"%{$filter}%");
                    });
                }
                if ($request->price){
                    $query->where('price','LIKE',"%{$request->price}%");
                }
                if ($request->category){
                    $query->orWhere('category_id',$request->category);
                }
            })
            ->paginate(2);

        return view('admin.products.index',compact('products','filters'));
    }

}
