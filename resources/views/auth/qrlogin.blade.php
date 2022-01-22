@extends('auth.layout')
@section('content')

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bg-purple-50 flex flex-wrap items-center justify-center min-h-screen">
    <div class="flex place-items-center">
        <div class="w-1/2">
            <h1 class="font-montserrat text-8xl text-center font-black text-purple-500 ">
                moVRin
            </h1>
        </div>
        <div class="w-1/2 ">
            <div class="shadow-2xl shadow-purple-500/20 bg-white rounded-3xl p-8 max-w-md self-center">
                <h1 class="font-montserrat text-3xl text-purple-500 font-normal text-center">
                    Log in
                </h1>
                <h1 class="font-montserrat text-5xl text-purple-500 font-extrabold text-center mt-6">
                    Hello Again!
                </h1>
                <h3 class="font-montserrat text-xl text-purple-500 font-medium text-center">
                    Welcome back, you've been missed!
                </h3>

                <div class="camera">
                    <h3 class="font-montserrat text-xl text-purple-500 font-extrabold text-center mt-10 -mb-12">
                        Scan your QR Code here
                    </h3>

                    <video id="preview" class="mx-auto"></video>
                    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                    <script type="text/javascript">
                        let scanner = new Instascan.Scanner({
                            video: document.getElementById('preview')
                        });
                        scanner.addListener('scan', function(content) {
                            window.alert(content);
                        });
                        Instascan.Camera.getCameras().then(function(cameras) {
                            if (cameras.length > 0) {
                                scanner.start(cameras[0]);
                            } else {
                                window.alert('No cameras found.');
                            }
                        }).catch(function(e) {
                            console.error(e);
                        });
                    </script>

                    <a class="group relative w-full flex justify-center py-2 px-4 text-sm font-medium rounded-full mt-2 text-purple-500 border-2 border-purple-500 hover:bg-purple-700 hover:border-purple-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" href="{{ route('login') }}" role="button">Login with email and password</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection