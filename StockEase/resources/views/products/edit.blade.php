<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Produk
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

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-2">Kategori</label>

                        <select
                            name="category_id"
                            class="w-full border rounded-lg px-3 py-2">

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Kode Produk</label>

                        <input
                            type="text"
                            name="code"
                            value="{{ old('code', $product->code) }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Nama Produk</label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Stok</label>

                        <input
                            type="number"
                            name="stock"
                            value="{{ old('stock', $product->stock) }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Harga</label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price', $product->price) }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Deskripsi</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full border rounded-lg px-3 py-2">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">
                        Update
                    </button>

                    <a
                        href="{{ route('products.index') }}"
                        class="ml-3 text-gray-600">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>