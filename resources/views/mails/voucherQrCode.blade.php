<!DOCTYPE html>

<html>

<head>

    <title></title>

</head>

<body>



<img class="visible-print text-center">

    <h1>Laravel 5.7 - QR Code Generator Example</h1>

    <?php
    use  SimpleSoftwareIO\QrCode\Facades\QrCode;
    $q=QrCode::size(300)->format('png')->generate('A basic example of QR code!');
    ?>

    <img src="{{$q}}" alt="ytyt">


    <p>example by ItSolutionStuf.com.</p>

</div>



</body>

</html>