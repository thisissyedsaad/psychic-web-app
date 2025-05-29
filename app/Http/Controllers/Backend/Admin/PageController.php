<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:pages',
            'content' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
            'status' => 'required|in:draft,published',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Page::create($request->all());

        return redirect()->route('pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:pages,slug,' . $page->id,
            'content' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
            'status' => 'required|in:draft,published',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $page->update($request->all());

        return redirect()->route('pages.index')
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')
            ->with('success', 'Page deleted successfully.');
    }
}
