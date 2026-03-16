<?php

namespace App\Http\Controllers;

use App\Models\Mpelapor;
use Illuminate\Http\Request;

class Cpelapor extends Controller
{
    
    public function tampil()
    {
        $pelapor = Mpelapor::all();
        return view('pelapor.tampil', compact('pelapor'));
    }

    public function tambah()
    {
        return view('pelapor.tambah');
    }

    public function simpan(Request $request)
    {
        $pelapor = new Mpelapor();
        $pelapor ->id_pelapor                   =$request->id_pelapor;
        $pelapor ->nama_pelapor                 =$request->nama_pelapor;
        $pelapor ->jenis_laporan                =$request->jenis_laporan;
        $pelapor ->uraian_laporan_gratifikasi   =$request->uraian_laporan_gratifikasi;
        $pelapor ->taksiran_dana_gratifikasi    =$request->taksiran_dana_gratifikasi;
        $pelapor ->tempat_terjadi_gratifikasi   =$request->tempat_terjadi_gratifikasi;
        $pelapor ->pemberi_gratifikasi          =$request->pemberi_gratifikasi;
        $pelapor ->telpon_pemberi_gratifikasi   =$request->telpon_pemberi_gratifikasi;
        $pelapor ->penerima_gratifikasi         =$request->penerima_gratifikasi;
        $pelapor ->jabatan_penerima             =$request->jabatan_penerima;
        $pelapor ->hubungan_penerima            =$request->hubungan_penerima;
        $pelapor->save();

        return redirect()->route('pelapor.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    public function edit (string $id_pelapor)
    {
        $pelapor = Mpelapor::where('id_pelapor', $id_pelapor)->first();
        return view ('pelapor.edit', compact('pelapor'));
    }

    public function simpan_edit(Request $request, string $id_pelapor)
    {
    
        $pelapor = Mpelapor::where('id_pelapor', $id_pelapor)->first();

        $pelapor ->nama_pelapor                 =$request->nama_pelapor;
        $pelapor ->jenis_laporan                =$request->jenis_laporan;
        $pelapor ->uraian_laporan_gratifikasi   =$request->uraian_laporan_gratifikasi;
        $pelapor ->taksiran_dana_gratifikasi    =$request->taksiran_dana_gratifikasi;
        $pelapor ->tempat_terjadi_gratifikasi   =$request->tempat_terjadi_gratifikasi;
        $pelapor ->pemberi_gratifikasi          =$request->pemberi_gratifikasi;
        $pelapor ->telpon_pemberi_gratifikasi   =$request->telpon_pemberi_gratifikasi;
        $pelapor ->penerima_gratifikasi         =$request->penerima_gratifikasi;
        $pelapor ->jabatan_penerima             =$request->jabatan_penerima;
        $pelapor ->hubungan_penerima            =$request->hubungan_penerima;
        $pelapor->save();
    
        return redirect()->route('pelapor.tampil')->with('success', 'Data berhasil diperbarui');
    }
    public function hapus($id_pelapor)
    {
        $pelapor = Mpelapor::where('id_pelapor', $id_pelapor)->first();

        $pelapor->delete();
        return redirect()->route('pelapor.tampil')->with('success', 'Data guru berhasil dihapus');
    }
}