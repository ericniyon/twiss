<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Question;
use App\Models\User;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_question_api()
    {
        $question = factory(Question::class)->make();
        $data = $question->attributesToArray();
        $response = $this->json('POST','api/questions',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_question_api()
    {
        $question = factory(Question::class)->create();
        $data = factory(Question::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/questions/'.$question->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_question_api()
    {
        $question = factory(Question::class)->create();
        $response = $this->json('DELETE','api/questions/'.$question->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $question->refresh();
        $this->assertDatabaseMissing('questions',['id' => $question->id]);

    }
}
