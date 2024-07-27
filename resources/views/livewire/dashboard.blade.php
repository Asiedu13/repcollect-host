<main class="bg-white mt-5 rounded-md h-[fit] lg:w-[700px] flex flex-col px-2">
        <header class="flex gap-2 .text-gray-600 text-sky-500 font-semibold items-center py-4 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
            <h2 class="text-xl border-r-2 border-sky-400 pr-4">Collections</h2> 
            <a href="{{route('me.create')}}" class="flex gap-2 font-normal items-center text-sm text-sky-500" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                 Create new collection 
            </a>
        </header>
        <hr>
        <livewire:collection-display color="yellow" type="ongoing" :items="$ongoing" :svg="$ongoingIcon">
        </livewire:collection-display>
        <livewire:collection-display color="green" type="completed" :items="$completed" :svg="$completedIcon" color="yellow" />
        <livewire:collection-display color="gray" type="paused" :items="$paused" :svg="$pausedIcon"  color="gray"/>
</main>
  

