<?php include 'components/header.php';?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Вход в систему</h1>
            <form>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name='userLogin' id="userLogin" placeholder="Ваш логин">
                            <label for="userLogin">Логин</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name='userPassword' id="userPassword" placeholder="Ваш пароль">
                            <label for="userPassword">Пароль</label>
                        </div>
                        <p id="error-auth" style="margin: 0; color: red;"></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 d-grid">
                        <button type="button" class="btn btn-secondary btn-lg auth-btn">Войти</button>
                    </div>
                    <div class="col d-grid">
                        <button type="button" class="btn btn-secondary btn-lg">Регистрация</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/auth.js"></script>
<?php include 'components/footer.php';?>