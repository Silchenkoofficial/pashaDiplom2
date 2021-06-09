import get_cookie from './getCookie.js';

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
    console.log(data);
    $('#pictureName').text(data['nameP'])
    $('#pictureDescribe').text(data['describeP'])
    $('#pictureURL').attr('src', `assets/images/pictures/${data['photoP']}`)
    $('#authorName').text(`${data['nameUser']} ${data['lastnameUser']}`)
    $('#authorCity').text(data['city'])
    $('#authorDescribe').text(data['describeArtist'])
    $('#authorURL').attr('src', `assets/images/artists/${data['photoUser']}`)
    $('#pictureType').html(`<b>Тип картины: </b>${data['nameType']}`)
    $('#pictureStyle').html(`<b>Стиль картины: </b>${data['nameStyle']}`)
    $('.loading__wrapper').remove()
}

$(document).ready(() => {
    $('body').append(loadingBlock)
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "imageID": localStorage.getItem("imageID"),
            "requestsType": "selectPictureOnID",
            "queryType": "SELECT"
        },
        success: (data) => {
            data = JSON.parse(data)[0]
            loadPage(data)
            $('#voteBtn').attr('data-pictureID', localStorage.getItem('imageID'));
            $('#voteBtn').attr('data-artistID', data['userID']);
        }
    })

    $('#voteBtn').click((e) => {
        e.preventDefault();
        if (get_cookie('auth') == '1') {
            $.ajax({
                url: 'php/requests.php',
                type: "POST",
                data: {
                    "requestsType": "imageVote",
                    "queryType": "INSERT",
                    "data": {
                        userID: get_cookie('userID'),
                        pictureID: $(e.target).attr('data-pictureID'),
                        artistID: $(e.target).attr('data-artistID')
                    }
                },
                success: (data) => {
                    data = JSON.parse(data)[0]
                    if (!data) return alert("Произошла ошибка! Попробуйте еще раз");
                    if (data == 'Вы уже проголосовали') return alert("Вы уже проголосовали за эту картину")
                    alert("Ваш голос учтен");
                }
            })
        } else return alert('Для голосования необходимо авторизоваться!');
    })

})