<div>
    <section class="flex flex-col gap-2 justify-center items-center bg-white rounded-md p-1">
        <div class="w-[500px] .h-[700px]">
            <div class="mt-24 mb-14 flex items-center gap-2">
                <h2 class="text-lg font-bold text-gray-700">RepCollect</h2> | <span>Let's Collect</span>
            </div>
            
            <div>
                <h1 class="text-2xl font-bold text-gray-700">Create A Cause For Collection</h1>
                <p class="mb-10">Setup money collection point for a cause</p>
            </div>
        </div>

        <form wire:submit="save" class="w-[500px]">
            @csrf
            <div class="my-5 flex flex-col">
                <label for="title" class="text-sm font-semibold text-gray-600">Title <sup class="text-red-600">*</sup>
                </label>
                <input wire:model.live="title" class="outline-none border-b-2 border-gray-400 .rounded-md p-2" type="title" id="title" name="title" placeholder="Purpose of Collection">
            </div>

            <div class="my-5 flex flex-col">
                <label for="description" class="text-sm font-semibold text-gray-600">Description  <sup class="text-red-600 text-md">*</sup></label>
                <p>
                    @error('description')
                        <span class="text-red-500 text-sm"> {{$message}} </span>   
                    @enderror</p>
                <textarea wire:model.live="description" class="outline-none border-2 rounded-md my-1 border-gray-400 .rounded-md p-2" type="text" id="description" name="description" placeholder="This is for the end of sem class party..."> </textarea>
            </div>

            <div class="my-5 flex flex-col">
                <label for="amount" class="text-sm font-semibold text-gray-600">Amount (GHS) </label>
                <p class="text-gray-400">This is set as the min amount anyone can pay</p>
                 <p>
                    @error('amount')
                        <span class="text-red-500 text-sm"> {{$message}} </span>   
                    @enderror
                </p>
                <input wire:model.live="amount" class="outline-none border-b-2 border-gray-400 .rounded-md p-2" type="number" id="amount" name="amount" placeholder="50">
            </div>

             <div class="my-5 flex flex-col">
                <label for="desired_amount" class="text-sm font-semibold text-gray-600">Desired Amount (GHS) </label>
                <input wire:model.live="desired_amount" class="outline-none border-b-2 border-gray-400 .rounded-md p-2" type="number" id="desired_amount" name="desired_amount" placeholder="1000">
            </div>

            <div class="mt-10 flex mb-10">
                <button type="submit" class="bg-gray-700 p-1 h-[40px] rounded-md text-white flex justify-center items-center w-[100%] text-sm gap-5"> Create Collection Point
                     <div wire:loading>
                        <div class="relative w-8 h-8">
                            <div class="absolute left-0 bottom-0 w-full h-4 bg-white rounded-b-full animate-move"></div>
                             <div class="absolute left-1/2 top-0 transform -translate-x-1/2 bg-red-500 w-2 h-2 rounded-full animate-spin"></div>
                        </div>

                     </div>
                </button>
            </div>
            <p class="text-sm .font-bold text-gray-700 mb-[20px]"><b>Terms</b>  and <b>Conditions</b>  apply 
                {{-- <a  class='text-purple-500 text-sm' href="<?php echo route('login') ?>">Sign In</a> --}}
            </p>
        </form>
    </section>
</div>
