<?php

namespace App\Http\Controllers\MasterData;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\MasterData\DataKelompokUsia;

class DataKelompokUsiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = DataKelompokUsia::orderBy('created_at', 'DESC')->get();

        return view('pages.master_data.data_kelompok_usia.index', compact('datas'));
    }

    public function create(Request $request)
    {
        $status = "Berhasil";
        $action = "menambahkan";
        $title  = "Data Kelompok Usia";

        DB::beginTransaction();
        try {
            if($request->id != null && $request->id != '') {
                $data = DataKelompokUsia::findOrFail($request->id);

                $action = "perbarui";
            } else {
                $data = new DataKelompokUsia();
                $data->created_at = Carbon::now();
            }

            $data->nama         = $request->nama;
            $data->usia_awal    = $request->usia_awal;
            $data->usia_akhir   = $request->usia_akhir;
            $data->status       = "AKTIF";
            $data->updated_at   = Carbon::now();
            $data->save();

            DB::commit();

            $message = $status . " " . $action . " " . $title;

            toast($message, 'success');
            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            toast('Gagal. Mohon cek kembali','error');
            return back();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = DataKelompokUsia::findOrFail($id);
            $data->delete();

            DB::commit();

            return response()->json([
                'status'     => 'success',
                'keterangan' => '',
            ]);
        } catch (\Throwable $th) {
            Log::info($th);
            DB::rollBack();
            return response()->json([
                'status'     => 'error',
                'keterangan' => 'karena ada kesalahan di sistem'
            ]);
        }
    }
}
