<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PartnershipRequest;
use App\Models\User;

class PartnershipRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_partnership_request_api()
    {
        $partnershipRequest = factory(PartnershipRequest::class)->make();
        $data = $partnershipRequest->attributesToArray();
        $response = $this->json('POST','api/partnership-requests',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_partnership_request_api()
    {
        $partnershipRequest = factory(PartnershipRequest::class)->create();
        $data = factory(PartnershipRequest::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/partnership-requests/'.$partnershipRequest->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_partnership_request_api()
    {
        $partnershipRequest = factory(PartnershipRequest::class)->create();
        $response = $this->json('DELETE','api/partnership-requests/'.$partnershipRequest->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $partnershipRequest->refresh();
        $this->assertDatabaseMissing('partnership_requests',['id' => $partnershipRequest->id]);

    }
}
