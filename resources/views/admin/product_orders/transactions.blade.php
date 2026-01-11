<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10 sm:rounded-lg flex flex-col gap-y-5">

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

                <div class="flex flex-row justify-between items-center mb-5">
                    <h3 class="text-indigo-950 font-bold text-2xl">My Transactions</h3>
                </div>

                @forelse($transactions as $transaction)
                <div class="item-product flex flex-row justify-between items-center mt-5">
                    <img src="{{ Storage::url($transaction->product->cover) }}" class="h-[100px] w-[100px] rounded-2xl" alt="">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $transaction->product->name }}</h3>
                        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">{{ $transaction->product->category->name }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm pb-1">Total Price:</p>
                        <p class="text-indigo-950 text-xl font-bold">Rp{{ number_format($transaction->total_price) }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm pb-1">Status:</p>
                        @if($transaction->is_paid)
                        <span class="py-1 px-3 rounded-full bg-green-500 text-white font-bold text-base">
                            SUCCESS
                        </span>
                        @else
                        <span class="py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-base">
                            PENDING
                        </span>
                        @endif
                    </div>
                    <div class="flex flex-row gap-x-3">
                        <a href="{{ route('admin.product_orders.transactions_details', $transaction) }}" class="py-3 px-5 bg-gray-500 text-white rounded-full">
                            Details
                        </a>
                    </div>
                </div>

                @empty
                <p class="mt-2">Belum ada pembelian produk yang dilakukan</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>