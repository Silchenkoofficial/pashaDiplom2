<?php include 'components/header.php';?>

<!-- Section with works of artists -->
<section class="works">
    <div class="container">
        <h1>Авторские работы</h1>
        <div class="d-flex flex-column">
            <p>Фильтр</p>
            <div class="d-flex align-items-center mb-3 gap-2">
                <select class="form-select" id="filterType" aria-label="Default select example">
                    <option value="" disabled selected>Выберите фильтр</option>
                    <option value="type">По типу</option>
                    <option value="style">По стилю</option>
                </select>
            </div>
        </div>
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center mb-3 gap-2">
                <select class="form-select" id="filterSecond" aria-label="Default select example">
                    <option value="" disabled selected>Выберите сначала тип фильтрации</option>
                </select>
                <button type="button" class="btn btn-primary" id="filterBtn" disabled>Фильтровать</button>
            </div>
        </div>
        <div class="works__grid row"></div>
    </div>
</section>

<script src="assets/js/gallery.js"></script>
<?php include 'components/footer.php';?>