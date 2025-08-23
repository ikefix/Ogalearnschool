<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Password Reset</title>
</head>
<body>
    <p>Hello {{ $name }},</p>
    <p>You requested a password reset. Click the link below:</p>
    <p><a href="{{ $url }}">Reset Password</a></p>
    <p>This link will expire soon. If you didn’t request this, ignore this email.</p>
</body>
</html>
