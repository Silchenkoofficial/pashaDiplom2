<?php include 'components/header.php'; ?>

<section class="image-detail">
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-4">
                <img class="image-picture" id="pictureURL" src="assets/images/empty.png" alt="picture">
            </div>
            <div class="col">
                <div class="about__picture">
                    <h3 id="pictureName"></h3>
                    <p id="pictureDescribe"></p>
                    <hr class="dropdown-divider">
                    <p id="pictureType"></p>
                    <p id="pictureStyle"></p>
                    <div class="row">
                        <div class="d-grid col-lg-6">
                            <button type="button" id='voteBtn' class="btn btn-primary btn-block">Проголосовать за картину</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="dropdown-divider">
        <div class="row">
            <div class="col-sm-4">
                <img class="image-author" id="authorURL" src="assets/images/empty.png" alt="">
            </div>
            <div class="col">
                <div class="about__author">
                    <h3 id="authorName"></h3>
                    <p id="authorCity"></p>
                    <p id="authorDescribe"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/imageDetail.js" type="module"></script>
<?php include 'components/footer.php'; ?>