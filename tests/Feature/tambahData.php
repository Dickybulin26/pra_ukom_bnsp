<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class tambahData extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // $response = $this->get('barang.tambah');

        $data = [
            'NamaBarang' => 'Beras',
            'stokBarang' => '5',
            'hargaBarang' => '10000',
        ];

        $response = $this->post('barang.store', $data);

        $response->assertStatus(200);
    }
}
