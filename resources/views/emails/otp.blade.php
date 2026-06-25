<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; text-align: center; padding: 20px;">
        <h2>Verify Your Email Address</h2>
        <p>Please use the following OTP code to complete your verification process:</p>
        <div style="font-size: 24px; font-weight: bold; padding: 10px; background-color: #f4f4f5; display: inline-block; border-radius: 5px; margin: 20px 0;">
            {{ $otpCode }}
        </div>
        <p>This code will expire in 10 minutes.</p>
        <p>If you did not request this, please ignore this email.</p>
    </div>
</body>
</html>
