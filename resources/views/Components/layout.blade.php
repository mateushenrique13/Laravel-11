<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/meet-the-team">Team</a>
    </nav>

    {{--em blade isso {{$slot}} é o msm q isso <?php echo $slot; ?> --}}

    {{$slot}}
</body>

</html>