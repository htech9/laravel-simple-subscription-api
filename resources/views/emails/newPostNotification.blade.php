<!DOCTYPE html>
<html>
<head>
    <title>New post have been published on {{ $details['website_url'] }}</title>
</head>
<body>
    <p>This is a summary of the post:</p>
    <br>
    <br>
    <h4>Title: {{ $details['title'] }}</h4>
    <p>Description{{ $details['description'] }}</p>

    <p>Thank you</p>
</body>
</html>