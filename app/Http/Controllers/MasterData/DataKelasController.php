<?php

namespace App\Http\Controllers\MasterData;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\MasterData\DataKelas;
use App\Models\MasterData\DataKelompokUsia;

class DataKelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = DataKelas::orderBy('created_at', 'DESC')->get();
        $kelompokUsias = DataKelompokUsia::select('id', 'nama')->where('status', 'AKTIF')->orderBy('nama', 'ASC')->get();

        return view('pages.master_data.data_kelas.index', compact('datas', 'kelompokUsias'));
    }

    public function create(Request $request)
    {
        $status = "Berhasil";
        $action = "menambahkan";
        $title  = "Data Kelas";

        DB::beginTransaction();
        try {
            if($request->id != null && $request->id != '') {
                $data = DataKelas::findOrFail($request->id);
                $action = "perbarui";
            } else {
                $data = new DataKelas();
                $data->created_at = Carbon::now();
            }

            $data->nama_kelas       = $request->nama_kelas;
            $data->kelompok_usia_id = $request->kelompok_usia_id;
            $data->status           = "AKTIF";
            $data->updated_at       = Carbon::now();
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
            $data = DataKelas::findOrFail($id);
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
