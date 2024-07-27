<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="bg-gray-100 mx-[100px] min-h-screen">
     {{-- <header class="flex justify-between py-[10px] h-[100px]">
        <nav class="flex justify-center items-center">
             <a href="<?php echo route('home') ?>">
                <h2 class="text-xl font-bold">RepCollect</h2>
            </a>
        </nav>
        
        @guest
        <a href="<?php echo route('home') ?>" class='flex gap-2 justify-center items-center'>
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
                            {{$currentUser[0]->name ??  "Guest" }}
                        </p>
                        <p>
                            {{$currentUser[0]->email ??  "guestemail@gmail.com" }}
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
                    <a href="{{route('dashboard')}}" class=".block flex gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">

                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        

                        Dashboard
                    </a>

                <a href="/logout" class=".block flex gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">

                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        
                        Logout
                     </a>
        </div>
        </div>
        @endauth
    </header> --}}
        {{$slot}}
    </body>
</html>
