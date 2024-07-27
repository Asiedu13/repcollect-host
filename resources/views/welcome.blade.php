<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RepCollect | Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 mx-[100px]">
    <header class="flex justify-between .text-center py-[10px]">
        <nav>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-align-justify"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
        </nav>

     <a href="<?php echo route('home') ?>">
         <h2 class="text-xl font-bold">RepCollect</h2>
     </a>

    </header>
    <main class="container">
        <section class="flex flex-col h-[550px] justify-center items-center w-[inherit]">
        {{-- <h1 class="text-6xl mb-2 font-bold text-gray-400">RepCollect</h1>
        <p class="mb-5 w-[500px] text-center">
            Effortlessly manage, track, and record your group donations and collections with our all-in-one solution.
        </p> --}}
        <section class="flex flex-col justify-center items-center w-[inherit]">
            <h1 class="text-3xl font-bold text-gray-500">Get Started</h1>
            <p class="">Start <b class="bg-green-400 text-white p-1 rounded-md ">tracking</b> donations and group collections today in three easy steps</p>
        </section>
        <div class="w-[500px] my-[40px] ">
            <p class="text-gray-700 font-bold flex items-center gap-2">Steps <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>  </p>
            <ol class=" mx-[20px]">
                <li class="flex gap-2">1. Create a link <a href="{{route('me.create')}}" class="bg-blue-400 text-white text-sm p-1 rounded-md w-[120px] flex gap-2 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    Create a link</a> </li>
                <li class="flex gap-5 relative">2. Fill in details
                    <div class="bg-white w-[200px] h-[300px] rounded-xl shadow-md absolute right-0 p-4">
                        <h2 class="font-bold text-gray-600">Group 5 Project Work</h2>
                        <p class="text-gray-400 text-sm font-bold">Payments</p>
                        <ul class="text-sm text-gray-500 my-4 font-semibold ">
                            <li>Mary James $10</li>
                            <li>John Doe $10</li>
                            <li>Elizabeth Keen $10</li>
                             <li>Patrick Hightower $10</li>
                             <li>Eunice Kennedy $20</li>
                             <li> Willa Cather $15</li>
                        </ul>
                    </div>
                </li>
                <li>3. Share payment link</li>
            </ol>
        </div>
       </section>
       @guest
            <section class='flex justify-center items-center mt-[80px] gap-5'>
            <a href="register" class="bg-gray-600 text-white py-1 px-2 rounded-md font-semibold .text-gray-600">Register account</a>
            <a href="login" class="bg-white py-1 px-2 rounded-md font-semibold text-gray-600">Log in to account</a>
       @endguest

       @auth
            <section class='flex justify-center items-center mt-[80px] gap-5'>
            <a href="{{route('dashboard')}}"> 
            <p class="bg-white py-1 px-4 rounded-md font-semibold text-gray-600 flex justify-center items-center gap-4 shadow-md"> {{$username}}  <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
            </span></p> 
            </a>
       @endauth
       </section>
    </main>
</body>
</html>