<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionPostRequest;
use App\Models\Question;


class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function show(Request $request, Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(QuestionPostRequest $request)
    {
        $data = $request->validated();
        $question = Question::create($data);
        return redirect()->route('questions.index')->with('status', 'Question created!');
    }

    public function edit(Request $request, Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(QuestionPostRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->fill($data);
        $question->save();
        return redirect()->route('questions.index')->with('status', 'Question updated!');
    }

    public function destroy(Request $request, Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('status', 'Question destroyed!');
    }
}
