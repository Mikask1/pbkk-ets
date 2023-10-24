<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Form') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between items-center">
                        <h6 class="text-blue-500 text-xl font-bold">
                            Barang Update
                        </h6>
                        <button class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded"
                            onclick="window.location.href='/dashboard'">
                            Barang List
                        </button>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 px-4 py-2 mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form method="POST" action="{{ route('barang.update') }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <h6 class="text-blue-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Informasi Barang
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2"
                                        htmlfor="nama_barang">
                                        Nama Barang
                                    </label>
                                    <input type="text" name="nama_barang" id="nama_barang"
                                        placeholder="{{ $barang->nama_barang }}" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('nama_barang')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2"
                                        htmlfor="jumlah_barang">
                                        Jumlah Barang
                                    </label>
                                    <input type="number" name="jumlah_barang" id="jumlah_barang" placeholder="{{ $barang->jumlah_barang }}"
                                        required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('jumlah_barang')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2"
                                        htmlfor="kondisi_barang">
                                        Kondisi Barang
                                    </label>
                                    <select name="kondisi_barang" id="kondisi_barang"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">>
                                        @foreach ($kondisi_barang as $kondisi)
                                            <option value="{{ $kondisi->kondisi_barang }}">
                                                {{ $kondisi->kondisi_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kondisi_barang')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2"
                                        htmlfor="jenis_barang">
                                        Jenis Barang
                                    </label>
                                    <select name="jenis_barang" id="jenis_barang"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">>
                                        @foreach ($jenis_barang as $jenis)
                                            <option value="{{ $jenis->jenis_barang }}">{{ $jenis->jenis_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('jenis_barang')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2"
                                        htmlfor="keterangan">
                                        Keterangan
                                    </label>
                                    <input type="text" name="keterangan" id="keterangan"
                                        placeholder="Mouse dengan tingkat presisi yang tinggi" required
                                        class="group
                                                 border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded-l text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('keterangan')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2"
                                        htmlfor="kecacatan">
                                        Kecacatan
                                    </label>
                                    <input type="text" name="kecacatan" id="kecacatan"
                                        placeholder="Lampu RGB sudah tidak nyala" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('kecacatan')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 class="text-blue-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Gambar
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-black text-xs font-bold mb-2" htmlfor="gambar">
                                        Foto Barang
                                    </label>
                                    <input type="file" name="gambar" id="gambar" accept="image/*"
                                        enctype="multipart/form-data" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('bukti_transaksi')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                        @if ($errors->has('database_error'))
                            <div class="mt-4 text-red-500">
                                {{ $errors->first('database_error') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
