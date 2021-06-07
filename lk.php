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
    <section class="lk"></section>
</div>



<script src="assets/js/lk.js"></script>
<?php include 'components/footer.php';?>

<!-- Modal -->
<div class="modal fade" id="changeProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование профиля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body" id="changeProfileForm"></div>
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
                        <input type="email" class="form-control" placeholder="Например, Санкт-Петербург" id="cityUser">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">О себе</label>
                        <textarea class="form-control" placeholder="Расскажите о себе" rows="6" id="describeUser" style="resize: none;"></textarea>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="beArtist">Стать художником</button>
            </div>
        </div>
    </div>
</div>