<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label for="numberPhone">Phone Number</label>
            <input type="text" name="numberPhone" required>
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" required>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>