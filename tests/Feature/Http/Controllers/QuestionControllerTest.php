<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Question;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_question_and_redirects()
    {

        $question = factory(Question::class)->make();
        $data = $question->attributesToArray();
        $response = $this->post(route('questions.store'), $data);
        $response->assertRedirect(route('questions.index'));
        $response->assertSessionHas('status', 'Question created!');
    }

    /**
     * @test
     */
    public function it_updates_question_and_redirects()
    {
        $question = factory(Question::class)->create();
        $data = factory(Question::class)->make()->attributesToArray();
        $response = $this->put(route('questions.update', ['question' => $question]), $data);
        $response->assertRedirect(route('questions.index'));
        $response->assertSessionHas('status', 'Question updated!');
    }

    /**
     * @test
     */
    public function it_destroys_question_and_redirects()
    {
        $question = factory(Question::class)->create();
        $response = $this->delete(route('questions.destroy', ['question' => $question]));
        $response->assertRedirect(route('questions.index'));
        $response->assertSessionHas('status', 'Question destroyed!');
    }
}
