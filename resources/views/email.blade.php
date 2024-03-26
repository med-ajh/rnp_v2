<!DOCTYPE html>
<html>
<head>
	<title>OTP in JS</title>
	<link rel="stylesheet" href="{{ asset('assets/css/email.css') }}">
    <script src="https://smtpjs.com/v3/smtp.js"></script>

</head>
<body>
	<div class="form">
		<h1>OTP Using JavaScript</h1>
		<input type="email" id="email" placeholder="Enter Email...">
		<div class="otpverify">
			<input type="text" id="otp_inp" placeholder="Enter the OTP sent to your Email...">
			<button class="btn" id="otp-btn">Verify</button>
		</div>
		<button class="btn" onclick="sendOTP()">Send OTP</button>
	</div>
    <script src="{{ asset('assets/js/email.js') }}"></script>


</body>
</html>
