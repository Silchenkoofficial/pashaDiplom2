<?php include 'components/header.php';?>

<div class="container mt-5">
    <h1>Регистрация</h1>
    <form>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    <div id="emailHelp" class="form-text">Уже есть аккаунт? <a href="auth.php">Войти!</a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid col-sm-4">
                <button type="submit" class="btn btn-secondary btn-lg">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>

<?php include 'components/footer.php';?>