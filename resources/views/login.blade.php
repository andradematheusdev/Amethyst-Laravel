<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Amethyst - Login</title>
</head>

<body>
    <main>
        <section>

            <div class="container">
                <div class="row align-items-center justify-content-center">

                    <div class="col-12 col-md-4 text-center">
                        <img src="img/Logo-alt.svg" alt="Logo" id="logo">
                        <form action="/login/auth" method="post">
                            @csrf
                            <input type="text" name="username" class="form-control bg-transparent text-white rounded-pill mb-5 ps-5 user-login-input" placeholder="USUÁRIO" aria-label="Usuário" aria-describedby="basic-addon1" autocomplete="off">
                            <input type="password" name="password" class="form-control bg-transparent text-white rounded-pill mb-5 ps-5 user-pass-input" placeholder="SENHA" aria-label="Senha" aria-describedby="basic-addon1" autocomplete="off">
                            <div class="d-grid gap-2">
                                <input type="submit" value="ENTRAR" class="btn btn-outline-light btn-block rounded-pill">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>
    </main>
</body>

</html>
