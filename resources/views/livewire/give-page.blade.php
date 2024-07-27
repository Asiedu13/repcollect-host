<div class="bg-white w-[700px] h-fit py-5 rounded-md">
    {{-- The whole world belongs to you. --}}
      <header class="flex gap-2 .text-gray-600 text-sky-500 font-semibold items-center py-4 px-4">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg> --}}
            <a href="{{route('home')}}" wire:navigate> 
                <h2 class="text-xl border-r-2 border-sky-400 pr-4">RepCollect</h2> 
            </href>
            <a class="flex gap-2 font-normal items-center text-sm text-sky-500" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote"><rect width="20" height="12" x="2" y="6" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg>
                 Payment
            </a>
        </header>
        <hr>

        <header class="mx-4 my-2 h-[150px]">
            <h2 class="text-2xl text-slate-600 font-bold"> {{$focus->title}} </h2>
            <div>
                <span class="text-sm text-gray-600 tracking-wider"> Created by {{$creator->name}} </span>
                {{-- TODO: Add phone number --}}
            </div>
            <p class="text-slate-600">
                {{$focus->description}}
            </p>
        </header>
        <hr>
    <form wire:submit="redirectToGateway" class="mx-4">
        <div class="my-5 flex flex-col">
            <label for="name" class="text-sm font-semibold text-gray-600">Name <sup class="text-red-600">*</sup>
            </label>
            <input wire:model.live="payerName" class="outline-none border-b-2 border-gray-400 .rounded-md py-2" type="text" id="name" name="name" placeholder="Eg. John Doe">
            <p>
                @error('payerName')
                    <span class="text-red-500 text-sm"> {{$message}} </span>   
                @enderror
            </p>
        </div>

        <div class="my-5 flex flex-col">
            <label for="email" class="text-sm font-semibold text-gray-600">Email <sup class="text-red-600">*</sup>
            </label>
            <input wire:model.live="payerEmail" class="outline-none border-b-2 border-gray-400 .rounded-md py-2" type="text" id="payerEmail" name="payerEmail" placeholder="example@gmail.com">
            <p>
                @error('payerEmail')
                    <span class="text-red-500 text-sm"> {{$message}} </span>   
                @enderror
            </p>
        </div>

        <div class="my-5 flex flex-col">
            <label for="contact" class="text-sm font-semibold text-gray-600">Contact {{"(MOMO)"}} <sup class="text-red-600">*</sup>
            </label>
            <input wire:model.live="payerContact" class="outline-none border-b-2 border-gray-400 .rounded-md py-2" type="text" id="payerContact" name="payerContact" placeholder="0245584914">
            <p>
                @error('payerContact')
                    <span class="text-red-500 text-sm"> {{$message}} </span>   
                @enderror
            </p>
        </div>
         <div class="my-5 flex flex-col">
            <label for="contact" class="text-sm font-semibold text-gray-600">Amount <sup class="text-red-600">*</sup>
            </label>
            <input wire:model.live="payerAmount" class="outline-none border-b-2 border-gray-400 .rounded-md py-2" type="number" min="{{$min}}" id="payerAmount" name="payerAmount" placeholder="100">
            <p>
                @error('payerAmount')
                    <span class="text-red-500 text-sm"> {{$message}} </span>   
                @enderror
            </p>
        </div>

        <div  class="mt-10 flex mb-10">
                <button @click="showModal = true" class="bg-gray-600 p-1 h-[40px] rounded-md text-white flex justify-center items-center w-[100%] text-sm gap-5 hover:bg-gray-700"> Proceed to payment
                     <div wire:loading>
                        <div class="relative w-8 h-8">
                            <div class="absolute left-0 bottom-0 w-full h-4 bg-white rounded-b-full animate-move"></div>
                             <div class="absolute left-1/2 top-0 transform -translate-x-1/2 bg-red-500 w-2 h-2 rounded-full animate-spin"></div>
                        </div>

                     </div>
                </button>
 

        </div>
            <p class="text-sm .font-bold text-gray-700 mb-[20px]">  <b>Thank you! ❤️</b>
                {{-- <a  class='text-purple-500 text-sm' href="<?php echo route('login') ?>">Sign In</a> --}}
            </p>
    </form>
</div>