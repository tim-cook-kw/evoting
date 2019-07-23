<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Pemilih\Entities\PemilihModel;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $pemilih = PemilihModel::count();
        $calon = DB::table('calon')->get();
        $pemilihl = PemilihModel::where('jenis_kelamin', 1)->count();
        $pemilihp = PemilihModel::where('jenis_kelamin', 2)->count();
        $calon1 = DB::table('vote')->where('id_calon', 1)->count();
        $calon2 = DB::table('vote')->where('id_calon', 2)->count();
        $nama1 = DB::table('calon')->where('id', 1)->first();
        $nama2 = DB::table('calon')->where('id', 2)->first();
        $chart = Charts::create('pie', 'c3')->title('Presentasi Pemilih')
        ->labels(['Laki-Laki', 'Perempuan'])
        ->values([$pemilihl, $pemilihp])->responsive(true);
        return view('welcome', compact('chart', 'pemilihl', 'pemilihp', 'pemilih', 'calon'));
    }
    public function vote(){

    }
}
