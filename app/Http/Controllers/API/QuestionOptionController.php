<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionOptionPostRequest;
use App\Http\Controllers\Controller;
use App\Models\QuestionOption;

class QuestionOptionController extends Controller
{


    public function index()
    {
        return QuestionOption::all();
    }

    public function show(Request $request, QuestionOption $question_option)
    {
        return $question_option;
    }

    public function store(QuestionOptionPostRequest $request)
    {
        $data = $request->validated();
        $question_option = QuestionOption::create($data);
        return $question_option;
    }

    public function update(QuestionOptionPostRequest $request, QuestionOption $question_option)
    {
        $data = $request->validated();
        $question_option->fill($data);
        $question_option->save();

        return $question_option;
    }

    public function destroy(Request $request, QuestionOption $question_option)
    {
        $question_option->delete();
        return $question_option;
    }

}
