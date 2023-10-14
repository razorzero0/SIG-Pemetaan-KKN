<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href={{ URL::asset('guetella/assets/vendors/font-awesome/css/font-awesome.min.css') }} rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login SIG</title>
</head>

<style>
    /* @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css') */
</style>

<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

<body>




    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="object-cover overflow-hidden">
                    <img src="{{ URL::asset('img/sig.png') }}" {{-- src='https://source.unsplash.com/500x500'  --}} />
                </div>
                <form class="w-full md:w-1/2 py-10 px-5 md:px-10" action="{{ route('loginAction') }}" method="post">
                    @csrf
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-3xl text-gray-900">LOGIN</h1>
                        <p>Sistem Informasi Geografis</p>
                    </div>
                    @if ($message = Session::get('error'))
                        <div class="text-red-700 font-bold text-center font-italic">
                            <h5>{{ $message }}</h5>
                        </div>
                    @endif

                    <div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Username</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fa fa-user text-gray-400 text-lg"></i>
                                    </div>
                                    <input type="text"
                                        class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                        name="name" placeholder="Muhammad123">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <label for="" class="text-xs font-semibold px-1">Password</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fa fa-lock text-gray-400 text-lg"></i>
                                    </div>
                                    <input type="password" name="password"
                                        class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                        placeholder="************">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button type="submit"
                                    class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
