<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-2">Nama Kategori</label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $category->name) }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Deskripsi</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full border rounded-lg px-3 py-2">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">
                        Update
                    </button>

                    <a
                        href="{{ route('categories.index') }}"
                        class="ml-3 text-gray-600">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>