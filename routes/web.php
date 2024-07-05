<?php

use App\Models\ImportCost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/be_api_service_simulasi_biaya_import', function() {
    try {
        $url_api = 'https://api-hub.ilcs.co.id/my/n/tarif?hs_code=10079000';
        $response = file_get_contents($url_api);
        $results = json_decode($response, true);

        if (isset($results['data']) && is_array($results['data'])) {
            foreach ($results['data'] as $result) {
                ImportCost::create([
                    'kode_barang' => $result['hs_code'],
                    'uraian_barang' => 'api unavailable',
                    'bm' => $result['bm'],
                    'nilai_komoditas' => $result['ppnbm'],
                    'nilai_bm' => $result['cukai'],
                ]);
            }
        } else {
            throw new \Exception('Struktur data dari API tidak sesuai yang diharapkan.');
        }

        return response()->json(['message' => 'Data berhasil diimpor']);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/fe_api_service_simulasi_biaya_import', function() {
    $url_api_negara = 'https://api-hub.ilcs.co.id/my/n/negara?ur_negara=SIN';
    $response_negara = file_get_contents($url_api_negara);
    $results_negara = json_decode($response_negara, true);

    $url_api_pelabuhan = 'https://api-hub.ilcs.co.id/my/n/pelabuhan?kd_negara=SG&ur_pelabuhan=jur';
    $response_pelabuhan = file_get_contents($url_api_pelabuhan);
    $results_pelabuhan = json_decode($response_pelabuhan, true);

    $url_api_barang = 'https://api-hub.ilcs.co.id/my/n/barang?hs_code=10079000';
    $response_barang = file_get_contents($url_api_barang);
    $results_barang = json_decode($response_barang, true);

    $url_api_cukai = 'https://api-hub.ilcs.co.id/my/n/tarif?hs_code=10079000';
    $response_cukai = file_get_contents($url_api_cukai);
    $results_cukai = json_decode($response_cukai, true);

    $data = [
        'negara' => $results_negara['data'][0]['ur_negara'],
        'pelabuhan' => $results_pelabuhan['data'][0]['ur_pelabuhan'],
        'barang' => [
            'kode' => $results_barang['data'][0]['hs_code_format'],
            'keterangan' => $results_barang['data'][0]['sub_header'] . ' ' . $results_barang['data'][0]['uraian_id']
        ],
        'cukai' => $results_cukai['data'][0]['bm'],
    ];

    return view('fe_api_service_simulasi_biaya_import', $data);
});
