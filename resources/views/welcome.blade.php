<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VR Test</title>

    <!-- Script -->
    <script src="https://aframe.io/releases/1.1.0/aframe.min.js"></script>
</head>

<body>
    <a-scene>
        <a-box height="3" width="8" depth="5" position="0 3 -30" animation="property: position; to:0 3 90; dur: 7000; easing: linear; loop: true" color="orange"></a-box>
        <a-box height="5" width="4" depth="5" position="1.5 2.5 -50" animation="property: position; to:1.5 2.5 70; dur: 7000; easing: linear; loop: true" color="orange"></a-box>
        <a-box height="5" width="4" depth="5" position="-1.5 2.5 -70" animation="property: position; to:-1.5 2.5 50; dur: 7000; easing: linear; loop: true" color="orange"></a-box>
        <a-box height="5" width="4" depth="5" position="1.5 2.5 -90" animation="property: position; to:1.5 2.5 30; dur: 7000; easing: linear; loop: true" color="orange"></a-box>
        <a-box height="3" width="8" depth="5" position="0 3 -110" animation="property: position; to:0 3 10; dur: 7000; easing: linear; loop: true" color="orange"></a-box>

        <a-plane position="0 0 -40" rotation="-90 0 0" width="7" depth="5" height="90" color="white"></a-box>

        <a-sky color="#cbded4"></a-sky>
    </a-scene>
</body>

</html>