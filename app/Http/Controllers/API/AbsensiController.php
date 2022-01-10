<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $types = $request->input('type');
        $user_id = $request->input('user_id');

        if ($id) {
            $absensi = Absensi::with(['user'])->find($id);

            if ($absensi) {
                return ResponseFormatter::success(
                    $absensi,
                    'Data Absensi Berhasil diambil',
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Absensi tidak ada',
                    404
                );
            }
        }

        $absensi = Absensi::with(['user'])->where('user_id', Auth::user()->id);

        if ($user_id)
            $absensi->where('user_id', $user_id);

        if ($types)
            $absensi->where('types', $types);

        return ResponseFormatter::success(
            $absensi,
            'Data list absensi berhasil diambil'
        );
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->update($request->all());

        return ResponseFormatter::success(
            $absensi,
            'Data absensi berhasil di ubah'
        );
    }

    public function create(Request $request)
    {

        $request->validate([
            'types' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $absensi = Absensi::create([
            'user_id' => $request->user_id,
            'types' => $request->types,
        ]);

        $absensi = Absensi::with(['user'])->find($absensi->id);

        try {

            return ResponseFormatter::success([
                'message' => 'Success',
                'data' => $absensi
            ]);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication', 500);
        }
    }
}
