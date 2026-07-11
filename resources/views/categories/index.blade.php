<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Kategori
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Pesan Sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tombol Tambah dan Form Pencarian --}}
                <div class="flex justify-between items-center mb-5">

                    <a href="{{ route('categories.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Tambah Kategori
                    </a>

                    <form action="{{ route('categories.index') }}" method="GET" class="flex items-center gap-2">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari kategori..."
                            class="border rounded px-3 py-2 w-64">

                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            Cari
                        </button>
                    </form>

                </div>

                {{-- Tabel --}}
                <table class="table-auto w-full border border-collapse">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Kategori</th>
                            <th class="border px-4 py-2">Deskripsi</th>
                            <th class="border px-4 py-2" width="220">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                            <tr>
                                <td class="border px-4 py-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $category->name }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $category->description }}
                                </td>

                                <td class="border px-4 py-2">

                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('categories.destroy', $category->id) }}"
                                        method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md ml-2">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    Belum ada data kategori.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

                {{-- Pagination --}}
                <div class="mt-5">
                    {{ $categories->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>