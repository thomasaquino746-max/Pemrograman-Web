<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Barang Masuk
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-lg shadow p-6">

                <form method="GET" action="{{ route('reports.incoming') }}"
                    class="flex items-end gap-4 mb-6">

                    <div>
                        <label>Tanggal Awal</label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ request('start_date') }}"
                            class="border rounded px-3 py-2">
                    </div>

                    <div>
                        <label>Tanggal Akhir</label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ request('end_date') }}"
                            class="border rounded px-3 py-2">
                    </div>

                    <button
                        class="bg-blue-600 text-white px-5 py-2 rounded">
                        Tampilkan
                    </button>

                    <a href="{{ route('reports.incoming.pdf') }}"
                    class="bg-red-600 text-white px-5 py-2 rounded">
                        Export PDF
                    </a>

                    <a href="{{ route('reports.incoming.excel') }}"
                    class="bg-green-600 text-white px-5 py-2 rounded">
                        Export Excel
                    </a>

                </form>

                <table class="table-auto w-full border">

                    <thead>

                        <tr>
                            <th class="border px-3 py-2">Tanggal</th>
                            <th class="border px-3 py-2">Produk</th>
                            <th class="border px-3 py-2">Qty</th>
                            <th class="border px-3 py-2">Supplier</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($incomingProducts as $item)

                        <tr>

                            <td class="border px-3 py-2">
                                {{ $item->date }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $item->product->name }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $item->qty }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $item->supplier }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-4">
                                Tidak ada data.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

                <div class="mt-4">
                    {{ $incomingProducts->links() }}
                </div>

            </div>

        </div>

    </div>

</x-app-layout>