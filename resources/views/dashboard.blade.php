<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard StockEase
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <div class="bg-blue-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Kategori</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalCategories }}</p>
                </div>

                <div class="bg-green-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Produk</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalProducts }}</p>
                </div>

                <div class="bg-yellow-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Barang Masuk</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalIncoming }}</p>
                </div>

                <div class="bg-red-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Barang Keluar</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalOutgoing }}</p>
                </div>

                <div class="bg-indigo-600 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Total Stok</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalStock }}</p>
                </div>

            </div>

            <div class="bg-white rounded-lg shadow mt-8 p-6">
                <h3 class="text-xl font-semibold mb-3">
                    Selamat Datang
                </h3>

                <p>
                    Selamat datang di <strong>StockEase</strong>.
                    Gunakan menu di samping untuk mengelola kategori, produk,
                    barang masuk, dan barang keluar.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow mt-8 p-6">

    <h3 class="text-xl font-semibold mb-4">
        Produk dengan Stok Menipis
    </h3>

    <table class="table-auto w-full border">

        <thead>
            <tr>
                <th class="border px-3 py-2">Produk</th>
                <th class="border px-3 py-2">Stok</th>
            </tr>
        </thead>

        <tbody>

            @forelse($lowStockProducts as $product)

            <tr>
                <td class="border px-3 py-2">
                    {{ $product->name }}
                </td>

                <td class="border px-3 py-2 text-red-600 font-bold">
                    {{ $product->stock }}
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="2" class="text-center py-4">
                    Semua stok masih aman.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>
<div class="bg-white rounded-lg shadow mt-8 p-6">

    <h3 class="text-xl font-semibold mb-4">
        Barang Masuk Terbaru
    </h3>

    <table class="table-auto w-full border">

        <thead>
            <tr>
                <th class="border px-3 py-2">Tanggal</th>
                <th class="border px-3 py-2">Produk</th>
                <th class="border px-3 py-2">Qty</th>
            </tr>
        </thead>

        <tbody>

            @forelse($latestIncoming as $item)

            <tr>
                <td class="border px-3 py-2">{{ $item->date }}</td>
                <td class="border px-3 py-2">{{ $item->product->name }}</td>
                <td class="border px-3 py-2">{{ $item->qty }}</td>
            </tr>

            @empty

            <tr>
                <td colspan="3" class="text-center py-4">
                    Belum ada data.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>
<div class="bg-white rounded-lg shadow mt-8 p-6">

    <h3 class="text-xl font-semibold mb-4">
        Barang Keluar Terbaru
    </h3>

    <table class="table-auto w-full border">

        <thead>
            <tr>
                <th class="border px-3 py-2">Tanggal</th>
                <th class="border px-3 py-2">Produk</th>
                <th class="border px-3 py-2">Qty</th>
            </tr>
        </thead>

        <tbody>

            @forelse($latestOutgoing as $item)

            <tr>
                <td class="border px-3 py-2">{{ $item->date }}</td>
                <td class="border px-3 py-2">{{ $item->product->name }}</td>
                <td class="border px-3 py-2">{{ $item->qty }}</td>
            </tr>

            @empty

            <tr>
                <td colspan="3" class="text-center py-4">
                    Belum ada data.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

        </div>
    </div>

</x-app-layout>