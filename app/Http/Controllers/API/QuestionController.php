<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{


    public function index()
    {
        return Question::all();
    }

    public function show(Request $request, Question $question)
    {
        return $question;
    }

    public function store(QuestionPostRequest $request)
    {
        $data = $request->validated();
        $question = Question::create($data);
        return $question;
    }

    public function update(QuestionPostRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->fill($data);
        $question->save();

        return $question;
    }

    public function destroy(Request $request, Question $question)
    {
        $question->delete();
        return $question;
    }

}
