<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h2>Details</h2>
    <p>Name: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Phone: {{ $data['phone'] ?? '' }}</p>
    <p>Comment: {{ $data['comment'] ?? '' }}</p>
</body>

</html>
