<section id="NewProduct" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8">
    <h2 class="font-semibold text-[32px]">New Product</h2>
    <div class="grid grid-cols-4 gap-[22px]">
        <div class="product-card flex flex-col rounded-[18px] bg-[#181818] overflow-hidden">
            <a href="{{ route('frontend.details', '$product->slug') }}" class="thumbnail w-full h-[180px] flex shrink-0 overflow-hidden relative">
                <img src="{{ asset('images/thumbnails/img1.png') }}" class="w-full h-full object-cover" alt="thumbnail">
                <p class="backdrop-blur bg-black/30 rounded-[4px] p-[4px_8px] absolute top-3 right-[14px] z-10">Rp
                    129,000</p>
            </a>
            <div class="p-[10px_14px_12px] h-full flex flex-col justify-between gap-[14px]">
                <div class="flex flex-col gap-1">
                    <a href="{{ route('frontend.details', '$product->slug') }}" class="font-semibold line-clamp-2 hover:line-clamp-none">SaaS Website
                        Master Template: Streamline Your Digital Solution</a>
                    <p
                        class="bg-[#2A2A2A] font-semibold text-xs text-infinistore-grey rounded-[4px] p-[4px_6px] w-fit">
                        Template</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                        <img src="{{ asset('images/logos/framer.png') }}" class="w-full h-full object-cover" alt="logo">
                    </div>
                    <a href="" class="font-semibold text-xs text-infinistore-grey">Framer</a>
                </div>
            </div>
        </div>
    </div>
</section>