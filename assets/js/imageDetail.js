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

const loadPage = (data) => {
    $('#pictureName').text(data['pictureName'])
    $('#pictureDescribe').text(data['pictureDescribe'])
    $('#pictureURL').attr('src', `assets/images/pictures/${data['pictureURL']}`)
    $('#authorName').text(data['userFullName'])
    $('#authorCity').text(data['userCity'])
    $('#authorDescribe').text(data['userDescribe'])
    $('#authorURL').attr('src', `assets/images/artists/${data['userImageURL']}`)
    $('#pictureType').html(`<b>Тип картины: </b>${data['pictureType']}`)
    $('#pictureStyle').html(`<b>Стиль картины: </b>${data['pictureStyle']}`)
    $('.loading__wrapper').remove()
}

$(document).ready(() => {
    $('body').append(loadingBlock)
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "imageID": localStorage.getItem("imageID"),
            "requestsType": "selectPictureOnID"
        },
        success: async (data) => {
            loadPage(JSON.parse(data)[0])
        }
    })

})