<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Izin;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IzinController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $jenis_izin = $request->input('jenis_izin');
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        $jenis_hari = $request->input('jenis_hari');
        $user_id = $request->input('user_id');
        $status = $request->input('status');

        if ($id) {
            $izin = Izin::with(['users'])->find($id);

            if ($izin) {
                return ResponseFormatter::success(
                    $izin,
                    'Data Izin Berhasil diambil',
                );
            }
        } else {
            return ResponseFormatter::error(
                null,
                'Data Izin tidak ada',
                404
            );
        }

        $izin = Izin::with(['users'])->where('user_id', Auth::user()->id);

        if ($user_id) {
            $izin->where('user_id', $user_id);
        }

        if ($status) {
            $izin->where('status', $status);
        }

        return ResponseFormatter::success(
            $izin,
            'Data list Izin berhasil diambil'
        );
    }

    public function update(Request $request, $id)
    {
        $izin = Izin::findOrFail($id);

        $izin->update($request->all());

        return ResponseFormatter::success(
            $izin,
            'Data Izin berhasil di ubah'
        );
    }

    public function create(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jenis_izin' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'jenis_hari' => 'required',
            'status' => 'required',
        ]);

        try {

            $izin = Izin::create([
                'user_id' => $request->user_id,
                'jenis_izin' => $request->jenis_izin,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jenis_hari' => $request->jenis_hari,
                'status' => $request->status,
            ]);

            $auth = Auth::user();
            $izin->$auth;
            $izin->save();

            return ResponseFormatter::success(
                $izin,
                'Izin berhasil dibuat',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                $error,
                'Izin Gagal'

            );
        }
    }
}
