<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtStore</title>

    <!-- FONTS -->
    <!-- ICON FONT -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- FONT FOR LOGO -->
    <link href="https://fonts.googleapis.com/css?family=Caveat:regular,500,600,700" rel="stylesheet" />
    <!-- MAIN FONT -->
    <link href="https://fonts.googleapis.com/css?family=Cuprum:regular,500,600,700,italic,500italic,600italic,700italic"
        rel="stylesheet" />

    <!-- STYLES -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- SCRIPTS -->
    <script src="libs/bootstrap/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid top">
        <header class="header">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="index.php">
                        <img style="width: 60px; height: 60px" src="assets/images/logo.png" alt="Logo">
                        <span style='font-family: "Caveat", sans-serif; font-size: 32px;' class='ms-1'>ArtStore</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav m-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item me-2">
                                <a class="nav-link" href="#">Галерея</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="#">Авторы</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="#">О нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank"
                                    href="https://www.artstorespb.ru/">Интернет-магазин</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <?php if($_COOKIE['auth'] == '1') { ?>
                            <a href='lk.php' class="btn btn-outline-primary me-2" type="submit">
                                <i class="fas fa-user"></i>
                                Личный кабинет
                            </a>
                            <?php } else { ?>

                            <a href='auth.php' class="btn btn-outline-primary me-2" type="submit">
                                <i class="fas fa-user"></i>
                                Войти в систему
                            </a>
                            <?php } ?>
                            <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Добавить
                                работу</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
    </div>