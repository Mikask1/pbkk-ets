<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="mt-4 pb-12 mx-12">
        <div class="flex justify-end my-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onclick="window.location.href='/barang-form'">
                Tambah
            </button>
        </div>
        <div class="grid md:grid-cols-3 gap-x-6 gap-y-10">
            @foreach ($barang as $brg)
                <div class="p-4 h-full w-full drop-shadow-md rounded-sm bg-white">
                    <img src="{{ asset('storage/' . $brg->gambar) }}" alt="Gambar Barang {{ $brg->id }}">
                    <div class="mt-4 flex justify-between">
                        <h3 class="underline text-xl font-bold">{{ $brg->nama_barang }}</h3>

                        <div class="flex gap-2">
                            <button class="bg-slate-500 hover:bg-slate-700 text-xs text-white p-2 px-4 rounded"
                                onclick="window.location.href='/barang-update?barang_id={{ $brg->id }}'">
                                Update
                            </button>

                            <form action="{{ route('barang.delete', ['barang_id' => $brg->id]) }}" method="post">
                                <input class="bg-red-500 hover:bg-red-700 text-xs text-white p-2 px-4 rounded"
                                    type="submit" value="Delete" />
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
                    <p class="text-md italic mt-2">{{ $brg->jenis_barang }}</p>
                    <p class='text-sm'>{{ $brg->keterangan }}</p>
                    <p class="mt-4">Kondisi: {{ $brg->kondisi_barang }}</p>
                    <p>Kecacatan: {{ $brg->kecacatan }}</p>
                    <p class="text-sm mt-4">Tersedia {{ $brg->jumlah_barang }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
