<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * Response sukses dengan data
     * 
     * @param  mixed  $data  Data yang akan dikirim
     * @param  string  $pesan  Pesan sukses
     * @param  int  $kode  HTTP status code
     * @return JsonResponse
     */
    protected function responseSukses($data, string $pesan = 'Berhasil mengambil data', int $kode = 200): JsonResponse
    {
        return response()->json([
            'sukses' => true,
            'pesan' => $pesan,
            'data' => $data,
        ], $kode);
    }

    /**
     * Response error
     * 
     * @param  string  $pesan  Pesan error
     * @param  int  $kode  HTTP status code
     * @param  mixed  $errors  Detail error (opsional)
     * @return JsonResponse
     */
    protected function responseError(string $pesan, int $kode = 400, $errors = null): JsonResponse
    {
        $response = [
            'sukses' => false,
            'pesan' => $pesan,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $kode);
    }

    /**
     * Response sukses tanpa data
     * 
     * @param  string  $pesan  Pesan sukses
     * @param  int  $kode  HTTP status code
     * @return JsonResponse
     */
    protected function responseSuksesNoData(string $pesan, int $kode = 200): JsonResponse
    {
        return response()->json([
            'sukses' => true,
            'pesan' => $pesan,
        ], $kode);
    }
}
