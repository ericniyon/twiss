<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\QuestionOption;
use App\Models\User;

class QuestionOptionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_question_option_api()
    {
        $questionOption = factory(QuestionOption::class)->make();
        $data = $questionOption->attributesToArray();
        $response = $this->json('POST','api/question-options',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_question_option_api()
    {
        $questionOption = factory(QuestionOption::class)->create();
        $data = factory(QuestionOption::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/question-options/'.$questionOption->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_question_option_api()
    {
        $questionOption = factory(QuestionOption::class)->create();
        $response = $this->json('DELETE','api/question-options/'.$questionOption->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $questionOption->refresh();
        $this->assertDatabaseMissing('question_options',['id' => $questionOption->id]);

    }
}
