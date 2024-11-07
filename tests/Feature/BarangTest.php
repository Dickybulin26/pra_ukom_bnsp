<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Barang;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHalamanBarang(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHalamanFormTambah(): void
    {
        $response = $this->get(route('barang.tambah'));

        $response->assertStatus(200);
    }

    public function testHalamanFormEdit(): void
    {
        $response = $this->get(route('barang.edit', 1));

        $response->assertStatus(200);
    }

    public function testDelete(): void
    {
        // Membuat barang untuk dihapus
        $barang = Barang::create([
            'nama' => 'Laptop',
            'stok' => 10,
            'harga' => 10000000,
        ]);

        // Mengirimkan request DELETE untuk menghapus barang
        $response = $this->get(route('barang.delete', $barang->id));

        // Memastikan response berhasil (status 302 atau redirect)
        $response->assertStatus(302);

        // Memastikan data barang tidak ada lagi di database
        $this->assertDatabaseMissing('barangs', [
            'id' => $barang->id
        ]);
    }

    public function testTambahDataBarang(): void
    {
        // Data barang yang akan dikirim
        $data = [
            'namaBarang' => 'Laptop',
            'stokBarang' => 10,
            'hargaBarang' => 10000000,
            'gambarBarang' => null,
        ];

        // Mengirimkan request POST untuk membuat barang baru
        $response = $this->post(route('barang.store'), $data);

        // Memastikan response berhasil (status 201 atau redirect)
        $response->assertStatus(302); // Mengharapkan redirect setelah data berhasil disimpan

        // Memastikan data barang baru ada di database
        $this->assertDatabaseHas('barangs', [
            'nama' => 'Laptop',
            'stok' => 10,
            'harga' => 10000000
        ]);
    }

    /** @test */
    public function testListBarang()
    {
        // Membuat beberapa barang untuk pengujian
        Barang::create([
            'nama' => 'Laptop',
            'stok' => 10,
            'harga' => 10000000,
        ]);
        Barang::create([
            'nama' => 'Handphone',
            'stok' => 5,
            'harga' => 5000000,
        ]);

        // Mengirimkan request GET untuk melihat daftar barang
        $response = $this->get(route('barang.index'));

        // Memastikan response berhasil
        $response->assertStatus(200);

        // Memastikan data barang ada di halaman
        $response->assertSee('Laptop');
        $response->assertSee('Handphone');
    }

}


