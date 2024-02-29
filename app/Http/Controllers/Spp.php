<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Http\Request;

class Spp extends Controller
{
    public function index (){
        $pembayaran = SppModel::all();
        $data = [
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => $pembayaran
        ];
        return view('pembayaran.index', $data);
    }
    
    public function save(Request $request) {
        SppModel::create($request->except(['_token', 'simpan']));
        return redirect()->to(url('pembayaran'))->with(['dataTambah' => true]);
    }
    
    public function delete($id){
        SppModel::destroy($id);
        return redirect()->to(url('pembayaran'))->with(['dataDelete' => true]);
    }
    public function edit ($id){
        $pembayaran = SppModel::all();
        $data = [
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => SppModel::find($id)
        ];
        return view('pembayaran.edit', $data);
    }
    public function update(Request $request, $id) {
        $pembayaran = SppModel::find($id);
        $pembayaran->update($request->except(['_token', '_method']));

        return redirect()->to(url('pembayaran'))->with(['dataEdit' => true]);
    }
}