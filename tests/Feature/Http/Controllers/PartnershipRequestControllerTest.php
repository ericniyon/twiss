<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PartnershipRequest;

class PartnershipRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_partnership_request_and_redirects()
    {

        $partnershipRequest = factory(PartnershipRequest::class)->make();
        $data = $partnershipRequest->attributesToArray();
        $response = $this->post(route('partnership-requests.store'), $data);
        $response->assertRedirect(route('partnership-requests.index'));
        $response->assertSessionHas('status', 'PartnershipRequest created!');
    }

    /**
     * @test
     */
    public function it_updates_partnership_request_and_redirects()
    {
        $partnershipRequest = factory(PartnershipRequest::class)->create();
        $data = factory(PartnershipRequest::class)->make()->attributesToArray();
        $response = $this->put(route('partnership-requests.update', ['partnership_request' => $partnershipRequest]), $data);
        $response->assertRedirect(route('partnership-requests.index'));
        $response->assertSessionHas('status', 'PartnershipRequest updated!');
    }

    /**
     * @test
     */
    public function it_destroys_partnership_request_and_redirects()
    {
        $partnershipRequest = factory(PartnershipRequest::class)->create();
        $response = $this->delete(route('partnership-requests.destroy', ['partnership_request' => $partnershipRequest]));
        $response->assertRedirect(route('partnership-requests.index'));
        $response->assertSessionHas('status', 'PartnershipRequest destroyed!');
    }
}
