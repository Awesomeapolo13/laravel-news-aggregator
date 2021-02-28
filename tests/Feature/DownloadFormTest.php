<?php

namespace Tests\Feature;

use App\Models\Download;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DownloadFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_download_form_show()
    {
        $response = $this->get('/admin/download/create');

        $response->assertStatus(200);
    }

    public function test_download_form_index_redirect()
    {
        $response = $this->get('/admin/download/index');

//        $response->assertStatus(200);
        $response->assertRedirect('/admin/download/index');
    }

    public function test_download_form_redirect()
    {
        $download = Download::factory()->make();
        $response = $this->post('/admin/download/store', (array) $download);

        $response->assertRedirect('/admin/download/store');
    }
}
