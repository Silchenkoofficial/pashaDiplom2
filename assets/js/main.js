const images = []
const loadingBlock = `
    <style>
        .loading__wrapper {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .loading__wrapper .loading__title {
            color: #fff;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }

        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div class="loading__wrapper">
        <div class="lds-dual-ring"></div>
        <h1 class="loading__title">Загрузка...</h1>
    </div>
`;

const drawPictures = () => {
    let columns = []
    let columnsLength = 0
    let width = $(window).width()
    columnsLength = width < 1000 && width > 700 ? 3 : width < 700 && width > 570 ? 2 : width < 570 ? 1 : 4

    for (let i = 0; i < columnsLength; i++) {
        let div = document.createElement('div');
        div.className = "col"
        columns.push(div);
    }

    images.map((item, i) => {
        let div = document.createElement('div')
        div.className = "works__grid--item"
        div.setAttribute('data-id', item.id)
        div.innerHTML = `
        <img src="${item.imageName}" alt="" />
        <div class="image-desc">${item.pictureName}</div>
        <p class="author" title="${item.authorName}">${item.authorName}</p>
    `
        columns[i % columnsLength].append(div)
    })

    for (let i = 0; i < columnsLength; i++) {
        $('.works__grid').append(columns[i])
    }
}

const loadImages = () => {
    images.length = 0
    $('body').append(loadingBlock)
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "selectPictures"
        },
        success: (data) => {
            console.log(images);
            data = JSON.parse(data);
            data.map((item, i) => {
                images.push({
                    id: parseInt(item['pictureID']),
                    pictureName: item['pictureName'],
                    imageName: "assets/images/pictures/" + item['pictureURL'],
                    authorName: item['userFullName']
                })
            })
            drawPictures()
            $('.loading__wrapper').remove()
        }
    })
}

const loadImageDetail = (e) => {

}

$(document).ready(() => {
    loadImages()

    $(document).on('click', '.works__grid--item', (e) => {
        localStorage.setItem("imageID", $(e.target).attr('data-id'))
        location.href = 'imageDetail.html';
    })
});