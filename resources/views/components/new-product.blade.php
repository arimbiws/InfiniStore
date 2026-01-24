<section id="NewProduct" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8">
    <h2 class="font-semibold text-[32px]">New Products</h2>
    <div class="grid grid-cols-4 gap-[22px]">

        @forelse($newProducts ?? [] as $product)
        <div class="product-card flex flex-col rounded-[18px] bg-[#181818] overflow-hidden">
            <a href="{{ route('frontend.details', $product->slug) }}" class="thumbnail w-full h-[180px] flex shrink-0 overflow-hidden relative">
                <img src="{{ Storage::url(($product->cover))  }}" class="w-full h-full object-cover" alt="thumbnail">
                <p class="backdrop-blur bg-black/30 rounded-[4px] p-[4px_8px] absolute top-3 right-[14px]">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </a>
            <div class="p-[10px_14px_12px] h-full flex flex-col justify-between gap-[14px]">
                <div class="flex flex-col gap-1">
                    <a href="{{ route('frontend.details', $product->slug) }}" class="font-semibold line-clamp-2 hover:line-clamp-none">{{ $product->name }}</a>
                    <p
                        class="bg-[#2A2A2A] font-semibold text-xs text-infinistore-grey rounded-[4px] p-[4px_6px] w-fit">
                        {{ $product->category->name }}
                    </p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                        <img src="{{ Storage::url(($product->creator->avatar)) }}" class="w-full h-full object-cover" alt="logo">
                    </div>
                    <a href="" class="font-semibold text-xs text-infinistore-grey">{{ $product->creator->name }}</a>
                </div>
            </div>
        </div>
        @empty
        @endforelse

    </div>
</section>