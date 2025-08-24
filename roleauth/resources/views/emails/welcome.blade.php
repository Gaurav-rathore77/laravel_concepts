<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>Welcome to our website! 🎉</p>
    <p>We’re glad to have you onboard.</p>
    <br>
    <p>Regards,<br>Team {{ config('app.name') }}</p>
</body>
</html>
