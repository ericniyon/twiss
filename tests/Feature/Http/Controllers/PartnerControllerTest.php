<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Partner;

class PartnerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_partner_and_redirects()
    {

        $partner = factory(Partner::class)->make();
        $data = $partner->attributesToArray();
        $response = $this->post(route('partners.store'), $data);
        $response->assertRedirect(route('partners.index'));
        $response->assertSessionHas('status', 'Partner created!');
    }

    /**
     * @test
     */
    public function it_updates_partner_and_redirects()
    {
        $partner = factory(Partner::class)->create();
        $data = factory(Partner::class)->make()->attributesToArray();
        $response = $this->put(route('partners.update', ['partner' => $partner]), $data);
        $response->assertRedirect(route('partners.index'));
        $response->assertSessionHas('status', 'Partner updated!');
    }

    /**
     * @test
     */
    public function it_destroys_partner_and_redirects()
    {
        $partner = factory(Partner::class)->create();
        $response = $this->delete(route('partners.destroy', ['partner' => $partner]));
        $response->assertRedirect(route('partners.index'));
        $response->assertSessionHas('status', 'Partner destroyed!');
    }
}
