<div>   
    {{-- Logo, Tips and Options bar (till i know what to put there) --}}
        <section  class="grid grid-cols-2 min-h-screen">
            <section class=".flex-1 flex flex-col min-h-screen justify-center items-center">
                <header class="text-center">
                    <h1 class="text-3xl">RepCollect</h1>
                </header>
                
                
                <article class="flex items-center gap-5 bg-white rounded-md px-2 py-5 my-5 w-[400px] text-gray-400">
                    <div class="absolute opacity-15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="104" height="104" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>
                    </div>
                    <div class="text-gray-700 z-10 pl-16">
                        <h3 class="text-lg font-semibold text-gray-600">Tip 2</h3>
                        <p class="w-[300px] text-sm">Clearly communicate the purpose and provide regular updates to ensure transparency and build trust with contributors.</p>
                    </div>
                </article>

                {{-- <address class="rounded-md w-[400px] h-[300px] .bg-gray-700 .text-slate-300 px-6 py-2 ">
                    {{-- Collection info such as name(title), collection number(with collection type), collector, date created, total amount collected --}}
                    {{-- <h3 class="underline">Info and Stats</h3>
                </address> --}}

                
                {{-- Other collection --}}
                <section class="rounded-md w-[400px] max-h-[300px] bg-white text-gray-700 px-6 pt-2 pb-10">
                    <header class="my-5 .px-6">
                        <h2 class="text-lg font-semibold">Other Collections</h2>
                    </header>
                    <hr>

                  <ul class=".overflow-auto max-h-[200px] .px-4">
                    {{-- use this one for the component --}}
                    @forelse ($otherCollections as $collection )
                         <li>
                        <a class="border-b-2 .shadow-md h-[50px] flex items-center py-2 flex-1 justify-between  text-gray-400 .capitalize " href="{{route('collect', $collection->link)}}" wire:navigate class="capitalize">
                            <p class="text-slate-500 max-w-[180px] overflow-hidden"> {{$collection->title}} </p>
                            <div class="text-sm font-bold text-gray-400 ">
                                <span class="text-slate-500"> {{count($collection->transactions)}} paid </span> • <span class="text-green-500"> GHS {{$collection->sum}}.00 </span>
                                </div>
                        </a>
                    </li>
                    @empty
                        
                    @endforelse
                  </ul>
                </section>

                {{-- back to dashboard goes here with arrow --}}
                <nav class="text-gray-400 flex gap-2 mt-4">
                    <svg class="animate-slideLeft" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-left"><path d="M6 8L2 12L6 16"/><path d="M2 12H22"/></svg>
                    <a href="{{route('dashboard')}}" wire:navigate>
                        <p>Back to dashboard</p>
                    </a>
                </nav>
            </section>
            
            {{-- Individual collection --}}
            <section class="flex-1 bg-white rounded-md my-5 .px-4">
                <div class="flex gap-2 .text-gray-600 text-gray-500 font-semibold items-center py-2 px-4 justify-between">

                    <div class="flex gap-2">
                        <a href="{{route('home')}}" class="flex gap-2 font-normal items-center text-sm text-gray-500 border-gray-400 border-r-2  pr-4">
                        RepCollect
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                        <h2 class="text-sm font-normal">Collections</h2>
                    </div>
                    {{-- <a href="{{route('pay', $theOne->link)}}">Copy link</a> --}}
                    <input class="border px-2 rounded-md w-[100px] outline-none invisible" type="text" id='link' x-ref='linkCopy' value="{{url("/pay/$theOne->link")}}" readonly>
                      
                    <a href="{{route('me.generate', $theOne->link)}}" class="bg-gray-600 text-white rounded-md p-2 text-sm hover:bg-gray-500 gap-2 flex text-right" wire:navigate> 
                        Get payment link
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-pen"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5.5"/><path d="M4 13.5V6a2 2 0 0 1 2-2h2"/><path d="M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/></svg>
                    </a>
                </div>

                <hr>

                <section class="px-4 py-4">
                    <header class="py-4 text-gray-700 flex ">
                        <div class="">
                            <h2 class="capitalize text-2xl text-sky-500"> {{$theOne->title}} </h2>
                            <p class="text-sm px-1 text-gray-500 my-2 max-h-[80px] w-[400px]"> {{$theOne->description}} 
                            </p>
                        </div>

                        <div class="max-w-[600px] w-[600px] max-h-[inherit] h-[inherit] overflow-clip .border-2">
                            <b class="text-green-400 .text-gray-600 text-lg">Goal: <span>GHS {{$theOne->desired_amount}}.00 </span></b> <br>
                            <b class=".text-green-400 text-gray-600 text-2xl ">Current: <span>GHS {{$transactionsSum}}.00</span></b>

                            <p class="text-sm font-semibold text-orange-300 "> {{$nOfPaymentsAtBase;}}  more payments at base price (GHS {{$theOne->cost}}.00 )</p>
                        </div>
                    </header>
                    <hr>
                    <section class="mt-5">
                        <h3 class="text-sm text-gray-600 font-semibold">Payments made</h3>
                        <section class="overflow-y-auto h-[400px] max-h-[400px] ">

                            @forelse ($transactions as $transaction )
                                <div class="my-2">
                                    <a class="border-2 rounded-md .shadow-md h-[50px] flex items-center px-2 py-2 flex-1 justify-between  text-gray-400 .capitalize " href="#" class="capitalize">
                                    <p class="text-slate-500"> {{$transaction->payer_name}} </p>
                                    <div class="text-sm font-bold text-gray-400 ">
                                        <span class="text-slate-500 capitalize"> {{$transaction->payment_type}} </span>
                                        •
                                    <span class="text-green-500"> GHS {{$transaction->amount_paid}}.00 </span>
                                    </div>
                                    </a>
                                </div>
                            @empty
                                <div class="max-h-[400px] h-[400px] flex justify-center items-center">
                                    <p class="text-center text-gray-400 font-semibold text-2xl">No transactions at the moment</p>
                                </div>
                                
                            @endforelse
                    </section>
                </section>
            </section>
            <div class="text-right px-6 relative">
                {{-- Could be a pause collection button --}}
                {{-- <button class="text-white text-sm border-1 bg-red-500 border-red-500 w-fit rounded-md p-1">
                    End collection
                </button> --}}
                <button class="text-red-500 text-sm border-red-500 w-fit rounded-md py-1 hover:underline">
                    Want to stop collecting money for this cause?
                </button>
                {{-- <p class="text-gray-600 text-sm">Stop collecting money for this cause</p> --}}
            </div>
            </section>
        </section>
    {{-- </div> --}}
</div>
