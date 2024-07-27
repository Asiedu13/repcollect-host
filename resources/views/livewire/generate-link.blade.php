<div class="flex justify-center items-center">
    <section x-data = "{ copied: false }" class="bg-white w-[500px] py-10  rounded-md px-6 text-gray-600">
        <div class="flex items-center gap-4 .justify-center ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            <h2 class="text-2xl text-gray-600">Generated Link</h2>
        </div>
        <p class="text-sm pl-10">Your link has been generated. Share with anyone to receive payments</p>
        <div class="rounded-md my-2 ml-10 w-fit flex">
            <input class="border px-2 rounded-md w-[400px] outline-none" type="text" id='link' x-ref='linkToCopy' value="{{url("/pay/$link")}}" readonly>
        </div>

        <div class="ml-10 flex gap-5 mt-10">
            <button class="bg-gray-600 text-white rounded-md p-2 text-sm hover:bg-gray-500 gap-2 flex" x-on:click="
                $refs.linkToCopy.select();
                document.execCommand('copy');
            ">
                Copy to Clipboard <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-pen"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5.5"/><path d="M4 13.5V6a2 2 0 0 1 2-2h2"/><path d="M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/></svg>
            </button>
            <button class="text-sm hover:text-gray-500" x-on:click="$wire.proceed()">
                Done
            </button>

            </div>
            <p x-show="copied">Copied to clipboard!</p>
</section>
</div>
