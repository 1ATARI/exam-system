<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $exam->name }} Result</title>
</head>
<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6em;">
    <tr>
        <td style="padding: 20px 0; text-align: center; background-color: #f7f7f7;">
            <h1 style="font-size: 36px; margin: 0; font-weight: bold;">{{ $exam->name }} Result</h1>
        </td>
    </tr>
    <tr>
        <td style="padding: 30px;">
            <p>Dear {{ $user->name }},</p>
            <p>Your result for {{ $exam->name }} is as follows:</p>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size: 16px; line-height: 1.6em;">
                <tr>
                    <td style="padding: 10px 0;">Score:</td>
                    <td style="padding: 10px 0; text-align: right;">{{ $score }} out of {{ $exam->questions->count() }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px 0;">Percentage:</td>
                    <td style="padding: 10px 0; text-align: right;">{{ $percentage }}%</td>
                </tr>
            </table>
            <p> Thank you for taking the exam. We hope to see you again soon.</p>
        </td>
    </tr>
    <tr>
        <td style="padding: 20px 0; text-align: center; background-color: #f7f7f7;">
            <p style="margin: 0;"> &copy; {{ date('Y') }} {{ config('app.name') }}</p>
        </td>
    </tr>
</table>
</body>
</html>
