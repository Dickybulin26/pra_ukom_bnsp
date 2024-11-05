<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pra UKOM BNSP</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #e5eeff;
        }

        table tbody .dataGambarBarang {
            width: 100px;
            height: 70px !important;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1 class="text-center mt-5 my-5 mt-3e">Data Barang</h1>


        <a href="{{ route('barang.tambah') }}" class="btn btn-success">Tambah</a>

        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">harga</th>
                    <th scope="col">stok</th>
                    <th scope="col">Foto</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->harga }}</td>
                        <td>{{ $value->stok }}</td>
                        <td><img src="{{ asset('images/' . $value->foto) }}" class="dataGambarBarang" alt="ini foto"></td>
                        <td>
                            <a href="{{ route('barang.edit', $value->id) }}" class="btn btn-warning mx-2">edit</a>
                            <a href="{{ route('barang.detail', $value->id) }}" class="btn btn-primary mx-2">detail</a>
                            <a href="{{ route('barang.delete', $value->id) }}" class="btn btn-danger mx-2"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

<script src=""></script>

<script></script>

</html>
