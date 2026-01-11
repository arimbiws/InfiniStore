<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creator Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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
                    <h3 class="text-indigo-950 font-bold text-2xl">Overview</h3>
                </div>

                <div class="flex flex-row justify-between items-center mb-5">
                    <div>
                        <p class="text-slate-500 text-sm pb-1">Total Products:</p>
                        <p class="text-indigo-950 text-xl font-bold">{{ count($my_products) }}</p>
                    </div>

                    <div>
                        <p class="text-slate-500 text-sm pb-1">Total Orders:</p>
                        <p class="text-indigo-950 text-xl font-bold">{{ count($orders_success) }}</p>
                    </div>

                    <div>
                        <p class="text-slate-500 text-sm pb-1">Total Revenue:</p>
                        <p class="text-indigo-950 text-xl font-bold">Rp{{number_format($my_revenue)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>