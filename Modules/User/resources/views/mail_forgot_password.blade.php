<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <p>Dear User,</p>
    <p>You have requested to reset your password. Please click the link below to proceed:</p>
    <a href="{{ $data['resetLink'] }}">Click here to reset</a>
    <p>If you did not request a password reset, please ignore this email.</p>
</body>
</html>
