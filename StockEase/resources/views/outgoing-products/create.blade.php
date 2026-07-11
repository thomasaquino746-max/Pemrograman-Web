<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang Keluar
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('outgoing-products.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2">Produk</label>

                        <select
                            name="product_id"
                            class="w-full border rounded-lg px-3 py-2">

                            <option value="">-- Pilih Produk --</option>

                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} (Stok: {{ $product->stock }})
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Jumlah Barang Keluar</label>

                        <input
                            type="number"
                            name="qty"
                            value="{{ old('qty') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Tanggal</label>

                        <input
                            type="date"
                            name="date"
                            value="{{ old('date', date('Y-m-d')) }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Customer</label>

                        <input
                            type="text"
                            name="customer"
                            value="{{ old('customer') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Keterangan</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full border rounded-lg px-3 py-2">{{ old('description') }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                        Simpan
                    </button>

                    <a
                        href="{{ route('outgoing-products.index') }}"
                        class="ml-3 text-gray-600">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>