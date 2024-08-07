<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Pesanan;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['katalog', 'index', 'detailKatalog', 'addPesanan']);
        $this->katalog = new Katalog();
        $this->pesanan = new Pesanan();
        $this->user = new User();
    }

    public function index()
    {
        $data = [
            'katalog' => $this->katalog->get()
        ];
        return view('welcome', $data);
    }
    public function dashboard()
    {
        $data = [
            'totalKatalog' => $this->katalog->get()->count(),
            'totalPesanan' => $this->pesanan->get()->count(),
            'totalUser' => $this->user->get()->count()
        ];
        return view('dashboard.admin', $data);
    }

    public function katalog()
    {
        $data = [
            'katalog' => $this->katalog->get()
        ];
        return view('dashboard.katalog.katalog', $data);
    }

    public function createKatalog()
    {
        Request()->validate([
            'nama_katalog' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,webp|max:1000',
            'harga' => 'required:numeric',
        ], [
            'nama_katalog.required' => 'wajib diisi !!',
            'deskripsi.required' => 'wajib diisi !!',
        ]);

        //upload photo
        $file = Request()->gambar;
        $fileName = Request()->nama_katalog . '.' . $file->extension();
        $file->move(public_path('posting_img'), $fileName);

        $data = [
            'nama_katalog' => Request()->nama_katalog,
            'deskripsi' => Request()->deskripsi,
            'gambar' => $fileName,
            'harga' => Request()->harga,
            'created_at' => now()

        ];
        $this->katalog->addData($data);
        return redirect()->route('katalog')->with('pesan', 'Data Berhasil Di Tambahkan !!');
    }

    public function updateKatalog($id)
    {
        Request()->validate([
            'nama_katalog' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required:numeric',
        ], [
            'nama_katalog.required' => 'wajib diisi !!',
            'story.required' => 'wajib diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->gambar <> "") {
            //jika ingin ganti foto
            //upload photo
            $file = Request()->gambar;
            $fileName = Request()->nama_katalog . '.' . $file->extension();
            $file->move(public_path('posting_img'), $fileName);

            $data = [
                'nama_katalog' => Request()->nama_katalog,
                'deskripsi' => Request()->deskripsi,
                'gambar' => $fileName,
                'harga' => Request()->harga,
                'updated_at' => now()
            ];

            $this->katalog->editData($id, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'nama_katalog' => Request()->nama_katalog,
                'deskripsi' => Request()->deskripsi,
                'harga' => Request()->harga,
            ];
            $this->katalog->editData($id, $data);
        }
        return redirect()->route('katalog')->with('pesan', 'Data Berhasil Di Update !!');
    }

    public function deleteKatalog($id)
    {
        $katalog = $this->katalog->detailData($id);
        $filePath = public_path('posting_img') . '/' . $katalog->nama_katalog;

        if ($katalog->gambar != "" && file_exists($filePath)) {
            unlink($filePath);
        }

        $this->katalog->deleteData($id);
        return redirect()->route('katalog')->with('pesan', 'Data Berhasil Di Hapus !!');
    }

    public function detailKatalog($id)
    {
        $data = [
            'katalog' => $this->katalog->detailData($id)
        ];
        return view('detail-katalog', $data);
    }

    public function pesanan()
    {
        $data = [
            'pesanan' => $this->pesanan->with('katalog')->get()
        ];

        return view('dashboard.pesanan.pesanan', $data);
    }

    public function updateStatus(Request $request, $id)
    {
        $data = [
            'status' => $request->status,
            'updated_at' => $request->now()
        ];
        $this->pesanan->editData($id, $data);
        return response()->json(['success' => true]);
    }

    public function deletePesanan($id)
    {

        $this->pesanan->deleteData($id);
        return redirect()->route('pesanan')->with('pesan', 'Data Berhasil Di Hapus !!');
    }

    public function laporanPage()
    {
        $data = DB::table('pesanan as p')
            ->join('katalog as k', 'p.id_katalog', '=', 'k.id_katalog')
            ->select('k.nama_katalog', 'k.gambar', DB::raw('COUNT(p.id_katalog) AS total_pesanan'), DB::raw('SUM(p.total_harga) AS total_harga'))
            ->groupBy('k.nama_katalog', 'k.gambar')
            ->get();

        return view('dashboard.laporan.laporan', ['data' => $data]);
    }

    public function addPesanan()
    {
        Request()->validate([
            'email' => 'required|email',
            'id_katalog' => 'required',
            'total_harga' => 'required',
        ], [
            'email.required' => 'wajib diisi !!',
        ]);

        $data = [
            'email' => Request()->email,
            'id_katalog' => Request()->id_katalog,
            'total_harga' => Request()->total_harga,
            'created_at' => now(),
        ];
        $this->pesanan->addData($data);
        return redirect()->route('home');
    }
}
