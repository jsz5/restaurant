<!DOCTYPE html>
<html>
<head>
    <title>Prospector theater</title>

</head>

<body>
<p>Witaj,</p>

<p>
Otrzymujesz kupon o wartości {{$discount}} na całą ofertę w naszej restauracji!<br>
Pamiętaj, żeby pokazać poniższy email przy składaniu zamówienia w restauracji. Zniżka obowiązuje także na zamówienia online.<br>
Oferta ważna do {{$date}}.
</p>
<br />
{{$qr = QrCode::format('png')->size(200)->generate($token)}}
<img src="{!!$message->embedData($qr, 'QrCode.png', 'image/png')!!}">
{{--{!! $qr !!}--}}

<p>Zapraszamy,
<br />
System restauracji Smart Restaurant<br><br>
</p>
</body>
</html>
