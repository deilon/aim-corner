<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">   
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
</head>
<body>
    <section class="d-flex align-items-center" style="height: 100vh">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-6 offset-lg-3">
                    <div class="d-flex mb-5 justify-content-between">
                        <h4 class="align-self-center text-center">Welcome to Aim Corner</h4>
                        <img src="{{ asset('images/logo-dark.png') }}" alt="logo" class="img-responsive" height="70px">
                    </div>
                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address or username</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="mb-3">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>