<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    
    public function __construct(Category $category)
    {
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

        $categories = $this->category
            ->orderBy('id', 'desc')
            ->paginate(10);

        $data['categories'] = $categories;

        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        return view('categories.create', $data);
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
            'name',
        ]);

        try {
            Category::create($dataSave);

            return redirect()->route('categories.index')
                ->with('success', 'Create Success.');
        } catch (Exception $ex) {
            return redirect()->route('categories.index')
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

        $categories = $this->category->findOrFail($id);

        $data['categories'] = $categories;

        return view('categories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->findOrFail($id);

        $data['categories'] = $categories;

        return view('categories.edit', $data);
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
        $categories = $this->category->findOrFail($id);

        $categories->name = $request->name;

        try {
            $categories->save();

            return redirect()->route('categories.index')
                ->with('success', 'Update Success.');
        } catch (Exception $ex) {
            return redirect()->route('categories.index')
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
        $categories = $this->category->findOrFail($id);

        try {
            $categories->delete();

            return redirect()->route('categories.index')
                ->with('success', 'Delete Success.');
        } catch (Exception $ex) {
            return redirect()->route('categories.index')
                ->with('error', 'Delete Failure.');
        }
    }
}
