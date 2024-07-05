<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fe_api_service_simulasi_biaya_import</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="mb-3">
            <label for="negara" class="form-label">Negara</label>
            <input type="text" class="form-control" name="negara" id="negara" value="{{ $negara }}">
        </div>
        <div class="mb-3">
            <label for="pelabuhan" class="form-label">Pelabuhan</label>
            <input type="text" class="form-control" name="pelabuhan" id="pelabuhan" value="{{ $pelabuhan }}">
        </div>
        <div class="mb-3">
            <label for="barang" class="form-label">Barang</label>
            <input type="text" class="form-control" name="barang" id="barang" value="{{ $barang['kode'] }}"">
            <textarea class="form-control mt-2" name="barang-description" id="barang-description">{{ $barang['keterangan'] }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" onchange="total_tarik_bea_masuk(this)">
        </div>
        <div class="mb-3">
            <label for="tarif" class="form-label">Tarif Bea Masuk</label>
            <input type="text" class="form-control" name="tarif" id="tarif" value="{{ $cukai }}">
        </div>
        <div class="mb-3">
            <label for="total-tarif" class="form-label">Total Tarif Bea Masuk</label>
            <input type="number" class="form-control" name="total-tarif" id="total-tarif" disabled>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('myscript.js') }}"></script>
</body>

</html>
