<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>Dewi Tilam | Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet" />
</head>

<body class="text-center">
    <main class="form-signin border rounded bg-white shadow">
        <form action="/login" method="post">
            @csrf
            <div class="d-flex mb-4 gap-2">
                <img src="/assets/images/logo-kab-banjar.png" width="72" />
                <div class="d-flex flex-column">
                    <h2>Desa Wisata</h2>
                    <h2>Tiwingan Lama</h2>
                </div>
            </div>
            @if (session()->has('failed'))
                <div class="alert alert-danger" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username"
                    autocomplete="off" required />
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password" required />
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
    </main>
</body>

</html>
