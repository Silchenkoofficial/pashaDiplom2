<?php include 'components/header.php';?>

<div class="container mt-5">
    <h1>Регистрация</h1>
    <form enctype="multipart/form-data" method="POST">
        <div id="emailHelp" class="form-text mb-2">Уже есть аккаунт? <a href="auth.php">Войти!</a></div>
        <div class="row">
            <div class="col">
                <label class="form-label">Фамилия</label>
                <input type="text" class="form-control" placeholder="Фамилия" aria-label="Фамилия" id="lastnameUser" required>
            </div>
            <div class="col">
                <label class="form-label">Имя</label>
                <input type="text" class="form-control" placeholder="Имя" aria-label="Имя" id="nameUser" required>
            </div>
            <div class="col">
                <label class="form-label">Отчество</label>
                <input type="text" class="form-control" placeholder="Отчество" aria-label="Отчество" id="surnameUser" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label class="form-label">Логин</label>
                <input type="text" class="form-control" placeholder="Логин" aria-label="Логин" id="loginUser" required>
            </div>
            <div class="col">
                <label class="form-label">Пароль</label>
                <input type="password" class="form-control" placeholder="Пароль" aria-label="Имя" id="passwordUser" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" placeholder="test@test.ru" aria-label="email" id="emailUser" required>
            </div>
        </div>
        <div class="row">
            <div class="mt-3">
                <label for="photoUser" class="form-label">Загрузите фотографию</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input class="form-control form-control-sm" id="photoUser" type="file">
            </div>
        </div>
        <div class="row">
            <div class="d-grid col-sm-2 mt-3">
                <button type="submit" id="regBtn" class="btn btn-secondary">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>

<script src="assets/js/reg.js"></script>
<?php include 'components/footer.php';?>