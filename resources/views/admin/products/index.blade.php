<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10 sm:rounded-lg">

                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="ps-5 py-5 bg-red-500 text-white font-bold">
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="flex felx-row justify-between mb-5">
                    <h3 class="text-indigo-950 text-3xl font-bold">My Products</h3>
                    <a href="{{ route('admin.products.create') }}" class="w-fit py-3 px-5 bg-indigo-950 text-white rounded-full">Add New Product</a>
                </div>

                @forelse($products as $product)
                <div class="item-product flex flex-row justify-between items-center mt-5">
                    <div class="flex flex-row items-center gap-x-7">
                        <img src="{{ Storage::url(($product->cover)) }}" class="h-[100px] w-[100px] rounded-2xl" alt="">
                        <div>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $product->name }}</h3>
                            <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-sm font-medium text-indigo-500 ring-1 ring-indigo-700/10 ring-inset">{{ $product->category->name }}</p>
                            <!-- <p class="pt-2">{{ $product->creator->name }}</p> -->
                        </div>
                    </div>
                    <div>
                        <p class="text-indigo-950 text-xl font-bold">Rp{{ number_format($product->price) }}</p>
                    </div>
                    <div class="flex flex-row gap-x-3">
                        <a href="{{ route('admin.products.edit', $product) }}" class="py-3 px-5 bg-yellow-500 text-white font-bold rounded-full">Edit</a>

                        <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-3 px-5 bg-red-500 text-white rounded-full">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="mt-8">Belum ada produk tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>