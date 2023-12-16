<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhaCungCapController extends Controller
{
    public function getDanhSach()
    {
        $nhacungcap = NhaCungCap::all();
        return view('admin.nhacungcap.danhsach', compact('nhacungcap'));
    }
    public function getThem()
    {
        return view('admin.nhacungcap.them');
    }
    public function postThem(Request $request)
    {
        $request->validate([
            'nhacungcap' => ['required', 'max:255', 'unique:nhacungcap'],
            ]);

        $orm = new NhaCungCap();
        $orm->nhacungcap = $request->nhacungcap;
        $orm->save();
        return redirect()->route('admin.nhacungcap');
    }
    public function getSua($id)
    {
        $nhacungcap = NhaCungCap::find($id);
        return view('admin.nhacungcap.sua', compact('nhacungcap'));
    }
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'nhacungcap' => ['required', 'max:255', 'unique:nhacungcap,nhacungcap,'. $id],
            ]);

        $orm = NhaCungCap::find($id);
        $orm->nhacungcap = $request->nhacungcap;
        $orm->save();
        return redirect()->route('admin.nhacungcap');
    }
    public function getXoa($id)
    {
        $orm = NhaCungCap::find($id);$orm->delete();
        return redirect()->route('admin.nhacungcap');
    }
}

