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

const authCheck = (userLogin, userPassword) => {
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "auth",
            "queryType": "SELECT",
            "userLogin": `${userLogin}`,
            "userPassword": `${userPassword}`
        },
        success: (data) => {
            data = JSON.parse(data)[0];
            if (data && data['userID']) {
                document.cookie = `userID=${data['userID']}`;
                document.cookie = `auth=1`;
                document.cookie = `ifArtist=${data['ifArtist']}`;
                location.href = 'index.php';
            } else {
                $('#error-auth').text('Упс... Неправильный логин или пароль')
            }
        },
        error: (e) => {
            console.log(e);
        }
    })
}

$(document).ready(() => {
    $('.auth-btn').click(() => {
        $('body').append(loadingBlock)
        let login = $('#userLogin').val();
        let password = $('#userPassword').val();

        if (login != '' && password != '') {
            authCheck(login, password);
        } else {
            $('#error-auth').text('Введите данные!')
        }
        $('.loading__wrapper').remove()
    })

})