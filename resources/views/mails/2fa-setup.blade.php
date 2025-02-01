<!DOCTYPE html>
<html>
<head>
    <title>Your Two-Factor Authentication Code</title>
</head>
<body>
    <p>Hello {{ ucfirst($user->firstname) }}, your Two-Factor Authentication code is: <strong><u>{{ $code }}</u></strong>. Please enter this code to complete your 2FA setup.</p>
    <p>Thank you,</p>
    <p>The {{ config('app.name') }} Team</p>
</body>
</html>
