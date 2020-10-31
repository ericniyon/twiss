<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\QuestionOption;

class QuestionOptionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_question_option_and_redirects()
    {

        $questionOption = factory(QuestionOption::class)->make();
        $data = $questionOption->attributesToArray();
        $response = $this->post(route('question-options.store'), $data);
        $response->assertRedirect(route('question-options.index'));
        $response->assertSessionHas('status', 'QuestionOption created!');
    }

    /**
     * @test
     */
    public function it_updates_question_option_and_redirects()
    {
        $questionOption = factory(QuestionOption::class)->create();
        $data = factory(QuestionOption::class)->make()->attributesToArray();
        $response = $this->put(route('question-options.update', ['question_option' => $questionOption]), $data);
        $response->assertRedirect(route('question-options.index'));
        $response->assertSessionHas('status', 'QuestionOption updated!');
    }

    /**
     * @test
     */
    public function it_destroys_question_option_and_redirects()
    {
        $questionOption = factory(QuestionOption::class)->create();
        $response = $this->delete(route('question-options.destroy', ['question_option' => $questionOption]));
        $response->assertRedirect(route('question-options.index'));
        $response->assertSessionHas('status', 'QuestionOption destroyed!');
    }
}
