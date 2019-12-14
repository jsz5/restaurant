<!DOCTYPE html>
<html>
<head>
    <title>Prospector theater</title>

</head>

<body>
<h3>Hello ,</h3>

<p>This email serves as a ticket for a free . <br />
    Please bring a printed version of this email with you in order to redeem it on-site.</p>

<br />
<br />
<br />
<img src="{!!$message->embedData($qr, 'QrCode.png', 'image/png')!!}">
{{--{!! $qr !!}--}}

<p>Thank you,</p>
<br />
<p>Prospector theater</p>
</body>
</html>
