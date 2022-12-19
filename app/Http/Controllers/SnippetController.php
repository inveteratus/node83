<?php

namespace App\Http\Controllers;

use App\Http\Requests\SnippetRequest;
use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function index()
    {
        return view('snippet.index');
    }

    public function create()
    {
        return view('snippet.form', ['snippet' => null]);
    }

    public function store(SnippetRequest $request)
    {
        $snippet = Snippet::factory()
            ->create([
                'name' => $request->name,
                'content' => $request->content,
                'tags' => $request->tags ? explode(',', $request->tags) : null,
                'public' => $request->public ?? false,
            ]);

        return to_route('snippet.show', ['snippet' => $snippet]);
    }

    public function show(Snippet $snippet)
    {
        return view('snippet.show', ['snippet' => $snippet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function edit(Snippet $snippet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snippet $snippet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
        //
    }
}
