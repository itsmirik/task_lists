<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_no_bg.png') }}"/>
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body>
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="https://images.pexels.com/photos/259915/pexels-photo-259915.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="w-full h-full object-cover">
        </div>

        <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        items-center justify-center">

            <div class="flex justify-center mt-10 ">
                <img class="h-48 w-48 rounded-lg" src="https://png.pngtree.com/png-clipart/20190604/original/pngtree-business-logo-design-png-image_915991.jpg" alt="Logo">
            </div>

            <div class="w-full h-100">

                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 text-center">
                    Task lists
                </h1>

                <form class="mt-6"  action="{{ route('auth.login-action') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block text-gray-700">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Email:"
                               class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                        @if($errors->has('email'))
                            <div class="text-red-500 flex py-1 border-0 rounded relative mb-4 mt-2">
                                <img class="w-6 mr-2" src="{{asset('assets/images/cancel.svg')}} " alt="">
                                    {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Password"
                               class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
                        @if($errors->has('password'))
                            <div class="text-red-500 flex py-1 border-0 rounded relative mb-4 mt-2">
                                <img class="w-6 mr-2" src="{{asset('assets/images/cancel.svg')}} " alt="">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="w-full block bg-blue-500 hover:bg-indigo-300 focus:bg-indigo-300 text-white font-semibold rounded-lg
              px-4 py-3 mt-6">Log In</button>
                </form>

                <hr class="my-6 border-gray-300 w-full">
            </div>
        </div>
    </section>

</body>
</html>

{{--
<form action="{{route('auth.login-action')}}" method="post">
    @csrf
    <input type="email" name="email">

    <input type="password" name="password">

    <button type="submit">login</button>
</form>--}}
