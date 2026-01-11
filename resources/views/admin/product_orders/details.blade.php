<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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

                <div class="item-product flex flex-col gap-y-10 justify-between mt-10">
                    <img src="{{ Storage::url($order->product->cover) }}" class="h-auto w-[300px]" alt="">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $order->product->name }}</h3>
                        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">{{ $order->product->category->name }}</p>
                    </div>

                    <div class="flex flex-row gap-x-5 items-center">
                        <p class="mb-2 text-2xl pt-2">Rp{{ number_format($order->total_price) }}</p>
                        @if($order->is_paid)
                        <span class="py-1 px-3 rounded-full bg-green-500 text-white font-bold text-sm">
                            SUCCESS
                        </span>
                        @else
                        <span class="py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-sm ">
                            PENDING
                        </span>
                        @endif
                    </div>
                    <div class="flex flex-row gap-x-3">
                        <form action="{{ route('admin.product_orders.update', $order) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="py-3 px-5 bg-green-600 text-white rounded-full">Approve Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>