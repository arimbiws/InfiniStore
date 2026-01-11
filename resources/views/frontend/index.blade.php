@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')

<x-navbar />

<header
    class="w-full pt-[74px] pb-[34px] bg-[url(' {{ asset('images/backgrounds/hero-image.png') }} ')] bg-cover bg-no-repeat bg-center relative z-0">
    <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10">
        <div class="flex flex-col gap-2 text-center w-fit mt-20 z-10">
            <h1 class="font-semibold text-[60px] leading-[130%]">Explore High Quality<br>Digital Products</h1>
            <p class="text-lg text-infinistore-grey">Change the way you work to achieve better results.</p>
        </div>
        <div class="flex w-full justify-center mb-[34px] z-10">
            <form
                class="group/search-bar p-[14px_18px] bg-infinistore-darker-grey ring-1 ring-[#414141] hover:ring-[#888888] max-w-[560px] w-full rounded-full transition-all duration-300">
                <div class="relative text-left">
                    <button class="absolute inset-y-0 left-0 flex items-center">
                        <img src="{{ asset('images/icons/search-normal.svg') }}" alt="icon">
                    </button>
                    <input type="text" id="searchInput"
                        class="bg-infinistore-darker-grey w-full pl-[36px] focus:outline-none placeholder:text-[#595959] pr-9"
                        placeholder="Type anything to search..." />
                    <input type="reset" id="resetButton" class="close-button hidden w-[38px] h-[38px] flex shrink-0 bg-[url(' {{ asset('images/icons/close.svg')}} ')] hover:bg-[url(' {{ asset('images/icons/close-white.svg')}} ')] transition-all duration-300 appearance-none transform -translate-x-1/2 -translate-y-1/2 absolute top-1/2 -right-5" value="">
                </div>
            </form>
        </div>
    </div>
    <div class="w-full h-full absolute top-0 bg-gradient-to-b from-infinistore-black/70 to-infinistore-black z-0"></div>
</header>

<section id="Category" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8">
    <h2 class="font-semibold text-[32px]">Category</h2>
    <div class="flex justify-between items-center">
        <a href="category.html"
            class="group category-card w-fit h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-[18px] rounded-2xl w-[210px] bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="{{ asset('images/icons/cart.svg') }}" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">All Products</p>
                    <p class="text-xs text-infinistore-grey">Everything in One Place</p>
                </div>
            </div>
        </a>
        @forelse($categories as $category)
        <a href="{{ route('frontend.category', $category) }}"
            class="group category-card w-fit h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-[18px] rounded-2xl w-[210px] bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="{{ asset($category->icon) }}" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">{{ $category->name }}</p>
                    <p class="text-xs text-infinistore-grey">{{ $category->desc }}</p>
                </div>
            </div>
        </a>
        @empty
        @endforelse
    </div>
</section>

<x-new-product />

<x-testimonials />

<x-tools />

<x-footer />

@endsection

@push('after-script')
<script>
    $('.testi-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true,
        pageDots: false,
        prevNextButtons: false,
    });

    // previous
    $('.btn-prev').on('click', function() {
        $('.testi-carousel').flickity('previous', true);
    });

    // next
    $('.btn-next').on('click', function() {
        $('.testi-carousel').flickity('next', true);
    });
</script>

<script>
    const searchInput = document.getElementById('searchInput');
    const resetButton = document.getElementById('resetButton');

    searchInput.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            resetButton.classList.remove('hidden');
        } else {
            resetButton.classList.add('hidden');
        }
    });

    resetButton.addEventListener('click', function() {
        resetButton.classList.add('hidden');
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menu-button');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        menuButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown menu when clicking outside of it
        document.addEventListener('click', function(event) {
            const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event.target);
            if (!isClickInside) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
@endpush