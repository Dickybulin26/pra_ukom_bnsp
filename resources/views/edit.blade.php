<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah barang</title>

    {{-- bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #e5eeff;
        }

        .main-content {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-content .card {
            color: #fff;
            width: 25rem;
            height: auto;
            background-color: #b1c9fc;
            border-radius: 1rem;
            padding: 1rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="main-content">
            <div class="card">
                <div class="back-button">
                    <a href="{{ route('barang.index', $barang->id) }}" class="btn btn-secondary"
                        type="button">Kembali</a>
                </div>
                <h5 class="card-title text-center my-3 fw-bold">Edit Barang</h5>
                <div class="card-body">
                    <form action="{{ route('barang.update', $barang->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="namaBarang" class="form-label">Nama Barang:</label>
                            <input type="text" value="{{ $barang->nama }}" class="form-control" id="namaBarang"
                                name="namaBarang" placeholder="nama barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="stokBarang" class="form-label">Stok Barang:</label>
                            <input type="number" class="form-control" value="{{ $barang->stok }}" id="stokBarang"
                                name="stokBarang" placeholder="Jumlah stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargaBarang" class="form-label">Harga Barang:</label>
                            <input type="number" class="form-control" value="{{ $barang->harga }}" id="hargaBarang"
                                name="hargaBarang" placeholder="Harga barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambarBarang" class="form-label">Gambar Barang:</label>
                            <input type="file" class="form-control" value="{{ $barang->foto }}" id="gambarBarang"
                                name="gambarBarang">
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('images/' . $barang->foto) }}" alt="" style="width: 5rem">
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">Edit Barang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
