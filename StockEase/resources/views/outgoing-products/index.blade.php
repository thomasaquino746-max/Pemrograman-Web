<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Barang Keluar
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('outgoing-products.create') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Tambah Barang Keluar
                </a>

                <table class="table-auto w-full border mt-5">
                    <thead>
                        <tr>
                            <th class="border px-3 py-2">No</th>
                            <th class="border px-3 py-2">Tanggal</th>
                            <th class="border px-3 py-2">Produk</th>
                            <th class="border px-3 py-2">Qty</th>
                            <th class="border px-3 py-2">Customer</th>
                            <th class="border px-3 py-2">Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($outgoingProducts as $item)

                        <tr>
                            <td class="border px-3 py-2">
                                {{ $loop->iteration }}
                            </td>

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
                                {{ $item->customer }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $item->description }}
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada data Barang Keluar.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $outgoingProducts->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>