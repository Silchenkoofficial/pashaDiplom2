<?php include 'components/header.php'; ?>
<!-- SLIDER -->
<div class="container mt-4">
    <div id="top-slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#top-slider" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#top-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#top-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style='height: 300px; color: #000; background-color: #f8d6d0;'>
            <div class="carousel-item active">
                <div
                    class="d-flex align-items-center justify-content-center">
                    <img src="assets/images/slider/slide1.png" alt="">
                </div>
            </div>
            <div class="carousel-item">
            <div
                    class="">
                    <h1>SLIDE 2</h1>
                </div>
            </div>
            <div class="carousel-item">
                <div
                    class="">
                    <h1>SLIDE 3</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#top-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#top-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <button class="btn btn-secondary my-4">Перейти в галерею</button>
</div>

<!-- Section with works of artists -->
<section class="works">
    <div class="container">
        <h1>Авторские работы</h1>
        <div class="works__grid row"></div>
    </div>
</section>

<script src="assets/js/main.js"></script>
<?php include 'components/footer.php'; ?>