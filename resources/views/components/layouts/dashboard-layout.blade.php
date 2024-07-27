<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
   <body class="bg-gray-100 mx-[100px] min-h-full">
    <header class="flex justify-between py-[10px] h-[100px]">
        <nav class="flex justify-center items-center">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-align-justify"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg> --}}
             <a href="<?php echo route('home') ?>">
                <h2 class="text-xl font-bold">RepCollect</h2>
            </a>
        </nav>
        @guest
        <a href="<?php echo route('home') ?>" class='flex gap-2 justify-center items-center' wire:navigate>
            <h2 class="text-xl font-bold">RepCollect</h2>
        </a>
        @endguest
        @auth
        <div x-data="{open: false}" class='flex gap-2 justify-center items-center'>
            <nav class='relative'> 
                <button  class="inline-flex items-center px-4 gap-2 py-2 bg-gray-800 border border-gray-800 w-[300px] rounded-md text-sm text-white focus:outline-none focus:border-gray-900 focus:ring ring-gray-300" @click="open = true" >
                <p class=".bg-white py-1 px-1 rounded-md font-semibold text-gray-600 flex justify-center items-center gap-4 .shadow-md"> 
                    <svg viewBox="0 0 36 36" fill="none" role="img" xmlns="http://www.w3.org/2000/svg" width="40" height="40"><mask id=":r1d:" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" rx="72" fill="#FFFFFF"></rect></mask><g mask="url(#:r1d:)"><rect width="36" height="36" fill="#6cbdb5"></rect><rect x="0" y="0" width="36" height="36" transform="translate(5 -1) rotate(315 18 18) scale(1)" fill="#e3dfba" rx="6"></rect><g transform="translate(3 -6) rotate(5 18 18)"><path d="M15 19c2 1 4 1 6 0" stroke="#000000" fill="none" stroke-linecap="round"></path><rect x="14" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect><rect x="20" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect></g></g></svg>
                    <div class="flex flex-col w-fit text-sm text-gray-200 text-left">
                        <p class="font-bold">
                            {{$user[0]->name ??  "Guest" }}
                        </p>
                        <p>
                            {{$user[0]->email ??  "Guestemail@gmail.com" }}
                            </p>
                     
                    </div>
                    </p> 
                    <span class="relative flex h-3 w-3">
                         <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                    </span>
                </button>

                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"  x-show.transition="open"  @mouseenter="open = true" @click.away="open = false">
                <div class="py-1" role="none">
                    <a href="{{route('dashboard')}}" class=".block flex gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Dashboard
                    </a>
                {{-- notifications --}}
                {{-- <a href="#" class=".block flex gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                    Notifications
                </a> --}}

                <a href="/logout" class=".block flex gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        Logout
                     </a>
        </div>
    </div>

            </nav>
        </div>
        @endauth
    </header>
        <div class="flex gap-10 .flex-col justify-between .items-center">
        <section class="flex flex-col .justify-center .items-center transition-all">
            <h1 class="text-2xl font-medium capitalize text-zinc-600 text-center">Good day, {{$user[0]->name}}</h1>
        
            <svg  class="text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/>
            </svg>

            <blockquote class="text-gray-400 text-xl w-[500px] h-[100px] flex gap-5 my-3 justify-center items-center">
                <p class="text-center ">
                    {{ is_null( $saying ) ? 'Gathering insight on money managment' : $saying->content }}
                    <br>
                        ~ {{ is_null($saying) ? 'RepCollect': $saying->author}}
                </p>
            </blockquote>

            <div class="flex justify-end flex-end text-gray-400">
                <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>
            </div>

            <nav class="bg-white p-4 rounded-md mt-20 text-slate-600 w-[500px]">
                <header class="flex gap-2 items-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    <h2 class="text-lg"> Menu</h2>
                </header>

                <hr>

                <ul>
                    <a href="{{route('dashboard.profile')}}" wire:navigate>
                        <li class="flex gap-2 items-center h-[50px] .my-2 cursor-pointer hover:border-2 hover:border-slate-600 hover:rounded-md .hover:text-white hover:px-4 transition-all {{$view == 'profile' ? 'bg-gray-700 text-white px-4 rounded-md' : 'bg-white text-slate-600' }} "   wire:click="handleMenuClick('profile')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <p class="text-sm">Profile</p>
                        </li>
                    </a>

                    <a href="{{route('dashboard')}}" wire:navigate>
                        <li class="flex gap-2 items-center h-[50px] my-2 cursor-pointer hover:border-2 hover:border-slate-600 hover:rounded-md .hover:text-white hover:px-4 transition-all {{$view == 'collections' ? 'bg-gray-700 text-white px-4 rounded-md' : 'bg-white text-slate-600' }} "  wire:click="handleMenuClick('collections')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                            <p class="text-sm">Collections</p>
                        </li>
                    </a>
                    <a href="{{route('dashboard.settings')}}" wire:navigate>
                        <li class="flex gap-2 items-center h-[50px] my-2 cursor-pointer hover:border-2 hover:border-slate-600 hover:rounded-md .hover:text-white hover:px-4 transition-all {{$view == 'settings' ? 'bg-gray-700 text-white px-4 rounded-md' : 'bg-white text-slate-600' }} "  wire:click="handleMenuClick('settings')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                            <p class="text-sm">Settings</p>
                        </li>
                    </a>

                    <a href="{{route('dashboard.faq')}}" wire:navigate>
                        <li class="flex gap-2 items-center h-[50px] .my-2 cursor-pointer hover:border-2 hover:border-slate-600 hover:rounded-md .hover:text-white hover:px-4 transition-all {{$view == 'faq' ? 'bg-gray-700 text-white px-4 rounded-md' : 'bg-white text-slate-600' }} "   wire:click="handleMenuClick('faq')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-question"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                            <p class="text-sm">Frequently Asked Questions</p>
                        </li>
                    </a>
                </ul>
            </nav>
        </section>

        {{ $slot }}
        
        </div>
    </body>
</html>