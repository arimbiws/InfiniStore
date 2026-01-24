@extends('frontend.layouts.app')
@section('title', 'Checkout Product')
@section('content')

<x-navbar />

<section id="checkout" class="container max-w-[1130px] mx-auto mt-[90px]">

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="ps-5 py-5 bg-red-500 text-white font-semibold text-center opacity-75">
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="w-full flex justify-center gap-[118px]">
        <div class="product-info flex flex-col gap-4 w-min h-fit mt-[18px]">
            <h1 class="font-semibold text-[32px] ">Checkout Product</h1>
            <div class="product-detail flex flex-col gap-3">
                <div class="thumbnail w-[412px] h-[255px] flex shrink-0 rounded-[20px] overflow-hidden">
                    <img src="{{ Storage::url(($product->cover)) }}" class="w-full h-full object-cover"
                        alt="thumbnail">
                </div>
                <div class="product-title flex flex-col gap-[30px]">
                    <div class="flex flex-col gap-3">
                        <p class="font-semibold">{{ $product->name}}</p>
                        <p
                            class="bg-[#2A2A2A] font-semibold text-xs text-infinistore-grey rounded-[4px] p-[4px_6px] w-fit">
                            {{ $product->category->name}}
                        </p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full flex shrink-0 overflow-hidden">
                                <img src="{{ Storage::url(($product->creator->avatar)) }}" alt="logo">
                            </div>
                            <p class="font-semibold text-infinistore-grey">{{ $product->creator->name}}</p>
                        </div>
                        <p
                            class="font-semibold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('frontend.checkout.store', $product->slug) }}" enctype="multipart/form-data"
            class="flex flex-col p-[30px] gap-[60px] rounded-[20px] w-[450px] border-2 border-infinistore-darker-grey">
            @csrf
            <div class="w-full flex flex-col gap-4">
                <p class="font-semibold text-xl">Transfer to:</p>
                <div class="flex flex-col gap-3">
                    <div class="flex gap-3">
                        <div
                            class="flex items-center gap-1 p-[12px_20px] pl-4 w-[163px] justify-between rounded-lg bg-[#181818] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                            <div class="flex flex-col">
                                <label for="bank" class="text-xs text-infinistore-grey pl-1">Bank Name</label>
                                <select name="bank" id="bank"
                                    class="mt-1 font-semibold bg-transparent appearance-none outline-none px-1 invalid:text-[#595959] invalid:font-normal invalid:text-sm"
                                    required>
                                    <option class="text-infinistore-black" value="{{ $product->creator->bank_name}}" selected>
                                        {{ $product->creator->bank_name}}
                                    </option>
                                </select>
                            </div>
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('images/icons/bank.svg') }}" alt="icon">
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-1 p-[12px_20px] pl-4 w-[215px] justify-between rounded-lg bg-[#181818] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                            <div class="flex flex-col w-full">
                                <label for="name" class="text-xs text-infinistore-grey pl-1">Account Name</label>
                                <div class="flex mt-1 items-center max-w-[149px]">
                                    <input disabled type="text" name="name" value="{{ $product->creator->bank_account}}" id="name"
                                        class="font-semibold bg-transparent appearance-none autofull-no-bg outline-none px-1 placeholder:text-[#595959] placeholder:font-normal placeholder:text-sm w-full"
                                        placeholder="Type here" required></input>
                                </div>
                            </div>
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('images/icons/user-square.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-1 p-[12px_20px] pl-4 justify-between rounded-lg bg-[#181818] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                        <div class="flex flex-col w-full">
                            <label for="number" class="text-xs text-infinistore-grey pl-1">Account Number</label>
                            <div class="flex mt-1 items-center max-w-[322px]">
                                <input type="tel" name="number" disabled id="number"
                                    class="mt-1 font-semibold bg-transparent appearance-none autofull-no-bg outline-none px-1 placeholder:text-[#595959] placeholder:font-normal placeholder:text-sm w-full"
                                    placeholder="Type here" value="{{ $product->creator->bank_account_number}}" pattern="[0-9 -]" required></input>
                            </div>
                        </div>
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('images/icons/card.svg') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col gap-4">
                <p class="font-semibold text-xl">Confirm Payment</p>
                <div class="flex flex-col gap-3">
                    <p class="text-xs text-[#2D68F8] p-[10px_22px] rounded-lg bg-[#2D68F805]">Please upload proof of
                        payment we will confirm it as soon as possible</p>
                    <div class="flex gap-3">
                        <button type="button"
                            class="flex gap-2 shrink-0 w-[291px] h-[48px] p-[12px_18px] justify-center items-center border border-dashed border-[#595959] rounded-lg hover:bg-[#2A2A2A] transition-all duration-300"
                            onclick="document.getElementById('proof').click()">
                            <p>Choose File</p>
                            <img src="{{ asset('images/icons/document-upload.svg') }}" alt="icon">
                        </button>
                        <input type="file" name="proof" id="proof" class="hidden" onchange="previewFile()" required>
                        <div class="relative rounded-lg overflow-hidden bg-[#181818] w-full h-[48px]">
                            <div class="relative file-preview z-10 w-full h-full hidden">
                                <img src="{{ asset('images/icons/check.svg') }}"
                                    class="check-icon absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="icon">
                                <img src="" class="thumbnail-proof w-full h-full object-cover" alt="thumbnail">
                            </div>
                            <img src="{{ asset('images/icons/gallery.svg') }}"
                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="icon">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Checkout Now</button>
            </div>

        </form>
    </div>
</section>

@endsection

@push('after-script')
<script>
    function previewFile() {
        var preview = document.querySelector('.file-preview');
        var fileInput = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            var img = preview.querySelector('.thumbnail-proof'); // Get the thumbnail image element
            img.src = reader.result; // Update src attribute with the uploaded file
            preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
        }

        if (fileInput) {
            reader.readAsDataURL(fileInput);
        } else {
            preview.classList.add('hidden'); // Hide preview if no file selected
        }
    }
</script>

<script>
    function copyTextFunc(id) {
        var copyText = document.getElementById(id);

        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        document.execCommand("copy");

        alert("Copied the text: " + copyText.value);
    }
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