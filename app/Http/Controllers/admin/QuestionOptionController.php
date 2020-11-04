<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionOptionPostRequest;
use App\Models\QuestionOption;


class QuestionOptionController extends Controller
{

    public function index()
    {
        $question_options = QuestionOption::all();
        return view('admin.question_options.index', compact('question_options'));
    }

    public function show(Request $request, QuestionOption $question_option)
    {
        return view('admin.question_options.show', compact('question_option'));
    }

    public function create()
    {
        return view('admin.question_options.create');
    }

    public function store(QuestionOptionPostRequest $request)
    {
        $data = $request->validated();
        $question_option = QuestionOption::create($data);
        return redirect()->route('question-options.index')->with('status', 'QuestionOption created!');
    }

    public function edit(Request $request, QuestionOption $question_option)
    {
        return view('admin.question_options.edit', compact('question_option'));
    }

    public function update(QuestionOptionPostRequest $request, QuestionOption $question_option)
    {
        $data = $request->validated();
        $question_option->fill($data);
        $question_option->save();
        return redirect()->route('question-options.index')->with('status', 'QuestionOption updated!');
    }

    public function destroy(Request $request, QuestionOption $question_option)
    {
        $question_option->delete();
        return redirect()->route('question-options.index')->with('status', 'QuestionOption destroyed!');
    }
}
