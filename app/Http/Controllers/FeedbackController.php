<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackCreateRequest;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'Feedback';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = (new Category())->getCategories();
        return view('feedback.index', ['title' => $this->title, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = (new Category())->getCategories();
        return view('feedback.index', ['title' => $this->title, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackCreateRequest $request)
    {
        $feedbackData = $request->validated();
        $create = Feedback::create($feedbackData);

        if ($create) {
            return redirect()->route('feedback.create')->with('success', 'Your feedback successfully sent');
        }

        return back()->withInput()->with('errors', 'Error, please trie again letter');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
