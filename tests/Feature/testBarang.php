<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testBarang extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testShowListBarang(): void
    {
        $response = $this->get('barang.tambah');

        $response->assertStatus(200);
    }

    public function testTambahData(): void
    {
        $data = [
            'NamaBarang' => 'Beras',
            'stokBarang' => '5',
            'hargaBarang' => '10000',
        ];

        $response = $this->post('barang.store', $data);
    }
}
