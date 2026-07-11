<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label>Nama Kategori</label>
                        <input
                            type="text"
                            name="name"
                            class="w-full border rounded p-2"
                        >
                    </div>

                    <div class="mb-4">
                        <label>Deskripsi</label>
                        <textarea
                            name="description"
                            class="w-full border rounded p-2"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700"
>
                        Simpan
                    </button>

                    <a
                        href="{{ route('categories.index') }}"
                        class="ml-3 text-gray-600 hover:text-gray-900"
>
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>