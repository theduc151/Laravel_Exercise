<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $categories = $this->category;
        $data['categories'] = $categories;
        $products = $this->product
            ->with('category')
            ->paginate(10);        
        $data['products'] = $products;
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $categories = $this->category->get();
        $data['categories'] = $categories;

        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataSave = $request->only([
            'category_id',
            'name',
            'thumbnail',
            'content',
            'price',
            'image',
        ]);
        
        try {
            Product::create($dataSave);

            return redirect()->route('products.index')
                ->with('success', 'Create Success.');
        } catch (Exception $ex) {
            return redirect()->route('products.index')
                ->with('error', 'Create Failure.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $products = $this->product->findOrFail($id);
        $data['products'] = $products;
        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $categories = $this->category->get();
        $data['categories'] = $categories;
        $products = $this->product->findOrFail($id);
        $data['products'] = $products;
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = $this->product->findOrFail($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->image = $request->image;
        $products->thumbnail = $request->thumbnail;
        $products->content = $request->content;
        
        try {
            $products->save();
            return redirect()->route('products.index')
                ->with('success', 'Update Success.');
        } catch (Exception $ex) {
            return redirect()->route('products.index')
                ->with('error', 'Update Failure.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = $this->product->findOrFail($id);
        try {
            $products->delete();
            return redirect()->route('products.index')
                ->with('success', 'Delete Success.');
        } catch (Exception $ex) {
            return redirect()->route('products.index')
                ->with('error', 'Delete Failure.');
        }
    }
}
