@component('app')
    <section class="flex flex-col gap-2 justify-center items-center bg-white rounded-md p-1">
        <div class="w-[500px] .h-[700px]">
            <div class="mt-24 mb-14 flex items-center gap-2">
                <h2 class="text-lg font-bold text-gray-700">RepCollect</h2> | <span>Sign Up</span>
            </div>
            
            <div>
                <h1 class="text-2xl font-bold text-gray-700">Get Started Now</h1>
                <p class="mb-10">Enter your credentials to access your account</p>
                 @if($errors->any())
                <div>
                    @foreach ($errors->all() as $error )
                    <p class='text-red-600'>* {{$error}}</p>
                    @endforeach
                </div>
                @endif
                <a href="{{route('auth.google')}}" class="border border-slate-300 p-1 rounded-md flex gap-3 items-center justify-center font-bold text-sm text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                <path d="M23.5 13.2607C23.5 12.4482 23.4271 11.667 23.2917 10.917H12.5V15.3493H18.6667C18.401 16.7816 17.5938 17.9951 16.3802 18.8076V21.6826H20.0833C22.25 19.6878 23.5 16.7503 23.5 13.2607Z" fill="#4285F4"/>
                <path d="M12.5003 24.458C15.5941 24.458 18.1878 23.432 20.0837 21.682L16.3805 18.807C15.3545 19.4945 14.042 19.9007 12.5003 19.9007C9.51595 19.9007 6.98991 17.8851 6.08887 15.1768H2.26074V18.1455C4.14616 21.8903 8.02116 24.458 12.5003 24.458Z" fill="#34A853"/>
                <path d="M6.08887 15.1774C5.8597 14.4899 5.72949 13.7555 5.72949 13.0003C5.72949 12.2451 5.8597 11.5107 6.08887 10.8232V7.85449H2.26074C1.45866 9.45122 1.04129 11.2135 1.04199 13.0003C1.04199 14.8493 1.4847 16.5993 2.26074 18.1462L6.08887 15.1774Z" fill="#FBBC05"/>
                <path d="M12.5003 6.09928C14.1826 6.09928 15.693 6.67741 16.8805 7.81283L20.167 4.52637C18.1826 2.67741 15.5889 1.54199 12.5003 1.54199C8.02116 1.54199 4.14616 4.1097 2.26074 7.85449L6.08887 10.8232C6.98991 8.11491 9.51595 6.09928 12.5003 6.09928Z" fill="#EA4335"/>
                </svg> Sign up with Google
                </a>
                <div class="relative flex flex-col .items-center justify-center">
                    <hr class="h-px mt-8 bg-gray-400 border-0 dark:bg-gray-700">
                    <span class="absolute right-[50%] top-[20px] bg-[#fff] px-1 shadow-xl rounded-md">or</span>
                </div>
            </div>
        </div>

        <form action="<?php echo route('register') ?>" class="w-[500px]" method="POST">
            @csrf
            <div class="my-5 flex flex-col">
                <label for="email" class="text-sm font-semibold text-gray-600">Email address</label>
                <input class="outline-none border border-gray-400 rounded-md p-2" type="email" id="email" name="email" placeholder="example@gmail.com">
            </div>

            <div class="my-5 flex flex-col">
                <label for="password" class="text-sm font-semibold text-gray-600">Password</label>
                <input class="outline-none border border-gray-400 rounded-md p-2" type="password" id="password" name="password" placeholder="••••••••••">
                {{-- <a href="#" class="text-sm font-bold text-gray-700 text-right">Forgot password?</a> --}}
            </div>

            <div class="mt-10 flex mb-10">
                <button type="submit" class="bg-gray-700 p-1 h-[40px] rounded-md text-white flex justify-center items-center w-[100%] text-sm">Sign Up</button>
            </div>
            <p class="text-sm font-bold text-gray-700 mb-[20px]">Already have an account? <a  class='text-purple-500 text-sm' href="<?php echo route('login') ?>">Sign In</a></p>
        </form>
    </section>
@endcomponent