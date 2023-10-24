<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BarangForm extends Controller
{
    public function handleBarangForm(Request $request)
    {
        try {
            $request->merge([
                'jumlah_barang' => (int) $request->input('jumlah_barang'),
            ]);

            $validator = Validator::make($request->all(), [
                'nama_barang' => 'required|string|max:255',
                'jumlah_barang' => 'required|integer',
                'keterangan' => 'required|string|max:255',
                'kecacatan' => 'required|string|max:255',
                'jenis_barang' => 'required|string|max:255',
                'kondisi_barang' => 'required|string|max:255',
                'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            ]);

            Log::info('Submitted data:', $request->all());

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/images/', $fileName);
            }


            $barang = new Barang();
            $barang->nama_barang = $request->input('nama_barang');
            $barang->jumlah_barang = $request->input('jumlah_barang');
            $barang->keterangan = $request->input('keterangan');
            $barang->kecacatan = $request->input('kecacatan');
            $barang->jenis_barang = $request->input('jenis_barang');
            $barang->kondisi_barang = $request->input('kondisi_barang');
            $barang->gambar = 'images/' . $fileName;

            $barang->save();

            $request->session()->flash('success', 'The form was submitted successfully.');

            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            $errorMessage = 'Error inserting data into the database: ' . $e->getMessage();
            return redirect()->back()->withErrors(['database_error' => $errorMessage])->withInput();
        }
    }

    public function handleDeleteBarang(Request $request)
    {
        try {
            $barang_id = $request->query('barang_id');

            Barang::destroy($barang_id);

            return redirect()->back()->with('success', 'Barang deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}