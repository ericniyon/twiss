<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Partner;
use App\Models\User;

class PartnerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_partner_api()
    {
        $partner = factory(Partner::class)->make();
        $data = $partner->attributesToArray();
        $response = $this->json('POST','api/partners',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_partner_api()
    {
        $partner = factory(Partner::class)->create();
        $data = factory(Partner::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/partners/'.$partner->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_partner_api()
    {
        $partner = factory(Partner::class)->create();
        $response = $this->json('DELETE','api/partners/'.$partner->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $partner->refresh();
        $this->assertDatabaseMissing('partners',['id' => $partner->id]);

    }
}
