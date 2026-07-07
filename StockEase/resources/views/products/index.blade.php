<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-5">

                    <a href="{{ route('products.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Tambah Produk
                    </a>

                    <form action="{{ route('products.index') }}" method="GET" class="flex items-center gap-2">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari produk..."
                            class="border rounded px-3 py-2 w-64">

                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            Cari
                        </button>

                    </form>

                </div>

                <table class="table-auto w-full border">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="border px-3 py-2">No</th>
                            <th class="border px-3 py-2">Kode</th>
                            <th class="border px-3 py-2">Nama Produk</th>
                            <th class="border px-3 py-2">Kategori</th>
                            <th class="border px-3 py-2">Stok</th>
                            <th class="border px-3 py-2">Harga</th>
                            <th class="border px-3 py-2">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            <td class="border px-3 py-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $product->code }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $product->name }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $product->category->name }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $product->stock }}
                            </td>

                            <td class="border px-3 py-2">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>

                            <td class="border px-4 py-2">
    <div class="flex items-center gap-2">

        <a href="{{ route('products.edit', $product->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Edit
        </a>

        <form action="{{ route('products.destroy', $product->id) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus produk ini?')"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                Hapus
            </button>

        </form>

    </div>
</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="border py-4 text-center">
                                Belum ada data produk.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-5">
                    {{ $products->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>