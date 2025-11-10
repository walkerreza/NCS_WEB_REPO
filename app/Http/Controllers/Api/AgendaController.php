<?php

namespace App\Http\Controllers\Api;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AgendaController extends ApiController
{
    /**
     * Tampilkan semua agenda dengan filter
     * 
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Agenda::active()->with('creator:id,name');

        // Filter: upcoming atau past
        if ($request->has('status')) {
            if ($request->status === 'upcoming') {
                $query->upcoming();
            } elseif ($request->status === 'past') {
                $query->past();
            }
        } else {
            // Default: tampilkan yang akan datang
            $query->upcoming();
        }

        $agendas = $query->paginate(10);

        return $this->responseSukses($agendas, 'Berhasil mengambil data agenda');
    }

    /**
     * Tampilkan detail agenda
     * 
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $agenda = Agenda::active()
            ->with('creator:id,name')
            ->find($id);

        if (!$agenda) {
            return $this->responseError('Agenda tidak ditemukan', 404);
        }

        return $this->responseSukses($agenda, 'Berhasil mengambil detail agenda');
    }
}
