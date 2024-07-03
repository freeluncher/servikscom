<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-secondary to-accent1 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-primary shadow-lg sm:rounded-3xl sm:p-10">

                <div class="max-w-md mx-auto">
                    <div class="flex items-center align-middle mb-3">
                        <img class="h-10 w-10" src="{{ asset('iconApp.svg') }}" alt="Siserviks Logo">
                        <span class="font-medium text-secondary ps-2">Si Serviks</span>
                    </div>
                    <div>
                        <h1 class="text-4xl text-secondary font-bold">Welcome!</h1>
                        <p class="text-md text-secondary">Sign in to continue</p>
                    </div>
                    <div class="divide-y divide-gray-200 mt-5">
                        <form action="{{ route('login') }}" method="POST"
                            class="py-2 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            @csrf
                            <div class="relative">
                                <input autocomplete="off" id="email" name="email" type="email"
                                    class=" bg-primary peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Email address" required />
                                <label for="email"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                    Address</label>
                            </div>
                            <div class="relative">
                                <input autocomplete="off" id="password" name="password" type="password"
                                    class="bg-primary peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Password" required />
                                <label for="password"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                            </div>
                            <div class="inline-flex items-center pt-4">
                                <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="check">
                                    <input type="checkbox"
                                        class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-secondary transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                                        id="check" />
                                    <span
                                        class="absolute text-accent2 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                            fill="currentColor" stroke="currentColor" stroke-width="1">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </label>
                                <label class="mt-px text-base text-secondary cursor-pointer select-none px-2"
                                    htmlFor="check">
                                    Remember Me
                                </label>
                            </div>
                            <div class="relative flex justify-center">
                                <button type="submit"
                                    class="bg-secondary text-white font-semibold rounded-md px-20 py-1 mt-5 hover:bg-accent1 hover:text-accent2">Login</button>
                            </div>
                            <div class="relative pt-1 text-center">
                                <a class="font-semibold text-accent1 text-sm hover:text-accent2"
                                    href="{{ route('password.request') }}">Forgot
                                    Your Password?</a>
                            </div>
                            <hr class="bg-secondary h-1 rounded-md">
                            <div class="relative">
                                <span class="text-sm">Don't have a account yet? Create a new one!</span>
                            </div>
                            <div class="relative flex justify-center">
                                <button type="button"
                                    class="bg-secondary text-accent2 font-semibold rounded-md px-20 py-1 hover:bg-accent1 hover:text-accent2">Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
