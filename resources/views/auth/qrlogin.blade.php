@extends('auth.layout')

@section('content')

<h2>Scan your QR Code here</h2>

<div class="camera">
    <video id="preview"></video>
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
</div>

@endsection