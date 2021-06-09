<?php include 'components/header.php';?>

<div class="container mt-5">
    <div class="row">
        <div class="col lk__buttons d-flex justify-content-end align-items-center gap-2">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#changeProfileModal">Редактировать профиль</button>
            <button type="button" id="logoutBtn" class="btn btn-outline-primary">Выйти</button>
        </div>
    </div>
    <!-- <div class="lk__buttons" style="float: right;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#changeProfileModal">Редактировать профиль</button>
        <button type="button" id="logoutBtn" class="btn btn-primary">Выйти</button>
    </div> -->
    <section class="lk">
        <div class="row">
            <div class="col-3">
                <div class="d-grid">
                    <img src="assets/images/artists/empty.png" alt="">
                    <button type="button" id="changePhoto" class="btn btn-primary mt-3">Изменить фотографию</button>
                </div>
            </div>
            <div class="col">
                <h2>
                    <span id="lastnameUserText"></span>
                    <span id="nameUserText"></span>
                    <span id="surnameUserText"></span>
                </h2>
                <p><span style='font-weight: bold;'>E-mail:</span> <span id="emailUserText"></span></p>
                <?php if ($_COOKIE['ifArtist'] == '1') { ?>
                <p><span style='font-weight: bold;'>Город:</span> <span id="cityUserText"></span></p>
                <p><span style='font-weight: bold;'>О себе:</span> <span id="describeUserText"></span></p>
                <?php } else { ?>
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                    data-bs-target="#beArtistModal">Стать художником</button>
                <?php } ?>
            </div>
        </div>
    </section>
</div>



<script src="assets/js/lk.js"></script>
<?php include 'components/footer.php';?>

<!-- Modal Update Profile Data -->
<div class="modal fade" id="changeProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование профиля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body" id="changeProfileForm">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Фамилия</label>
                                    <input type="text" class="form-control" placeholder="Фамилия" aria-label="Фамилия"
                                        id="lastnameUser">
                                </div>
                                <div class="col">
                                    <label class="form-label">Имя</label>
                                    <input type="text" class="form-control" placeholder="Имя" aria-label="Имя"
                                        id="nameUser">
                                </div>
                                <div class="col">
                                    <label class="form-label">Отчество</label>
                                    <input type="text" class="form-control" placeholder="Отчество" aria-label="Отчество"
                                        id="surnameUser">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" placeholder="Введите Ваш E-mail"
                                    aria-label="Введите Ваш E-mail" id="emailUser">
                            </div>
                            <?php if ($_COOKIE['ifArtist'] == '1') { ?>
                                <div class="mt-3">
                                    <label class="form-label">Город</label>
                                    <input type="email" class="form-control" placeholder="Введите Ваш город"
                                        aria-label="Введите Ваш город" id="cityUser">
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">О себе</label>
                                    <textarea class="form-control" placeholder="Напишите о себе" rows="6" id="describeUser" style="resize: none;"></textarea>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveUserData">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="beArtistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Расскажите о себе</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Из какого вы города?</label>
                        <input type="email" class="form-control" placeholder="Например, Санкт-Петербург" id="newCityUser">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">О себе</label>
                        <textarea class="form-control" placeholder="Расскажите о себе" rows="6" id="newDescribeUser"
                            style="resize: none;"></textarea>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="beArtist">Стать художником</button>
            </div>
        </div>
    </div>
</div>