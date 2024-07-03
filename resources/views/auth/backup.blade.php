<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <section id="login-page" class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                <div class="relative px-2 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-10">
                    <div class="max-w-wd mx-auto">

                        <div>
                            <h1 class="text-2xl font-bold text-secondary">Login</h1>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="relative">
                                        <input type="email" name="email" id="email"
                                            placeholder="Enter your email address"
                                            class="aboslute left-0 -top-3.5 text-gray-600 text-sm-peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-palceholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                                            required>
                                        <label for="email"
                                            class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email:</label>
                                    </div>
                                    <div class="relative">
                                        <input type="password" name="password" id="password"
                                            placeholder="Enter your password"
                                            class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                                            required>
                                        <label for="password"
                                            class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password:</label>
                                    </div>
                                    <div class="relative">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                    <div class="relative">
                                        <button class="bg-accent1 text-secondary rounded-md px-2 py-1"
                                            type="submit">Login</button>
                                    </div>
                                </form>
                                <div class="relative">
                                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @vite('resources/js/app.js')
</body>

</html>
