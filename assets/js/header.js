import get_cookie from './getCookie.js';

$(document).ready(() => {

    if (get_cookie('auth') != '1') {
        $('#modalAddPictureBody').empty()
        $('#modalAddPictureFooter').empty()
        $('#modalAddPictureBody').append(`<p>Для добавления картины необходимо авторизоваться и стать художником!</p>`)
    }

    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "getTypes",
            "queryType": "SELECT"
        },
        success: (data) => {
            data = JSON.parse(data)
            $('#addType').empty()
            data.map((item, i) => {
                $('#addType').append(`
                    <option value="${item['typeID']}">${item['nameType']}</option>
                `)
            })
        }
    })
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "getStyles",
            "queryType": "SELECT"
        },
        success: (data) => {
            data = JSON.parse(data)
            $('#addStyle').empty()
            data.map((item, i) => {
                $('#addStyle').append(`
                    <option value="${item['typeID']}">${item['nameStyle']}</option>
                `)
            })
        }
    })

    $('#addPicture').click((e) => {
        $.ajax({
            url: 'php/requests.php',
            type: "POST",
            data: {
                "requestsType": "addPicture",
                "queryType": "INSERT"
            }
        })
        console.log($('#pictureName').val());
    });

});