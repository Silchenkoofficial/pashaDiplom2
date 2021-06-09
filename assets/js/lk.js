import get_cookie from './getCookie.js';

const loadPage = (data) => {
    console.log(data);
    $('#lastnameUserText').text(data['lastnameUser'])
    $('#lastnameUser').val(data['lastnameUser'])

    $('#nameUserText').text(data['nameUser'])
    $('#nameUser').val(data['nameUser'])

    $('#surnameUserText').text(data['surnameUser'])
    $('#surnameUser').val(data['surnameUser'])

    $('#emailUserText').text(data['email'])
    $('#emailUser').val(data['email'])

    $('#cityUserText').text(data['city'])
    $('#cityUser').val(data['city'])

    $('#describeUserText').text(data['describeArtist'])
    $('#describeUser').val(data['describeArtist'])

}

const loadUserData = () => {
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "getUser",
            "queryType": "SELECT"
        },
        success: (data) => {
            data = JSON.parse(data)[0]
            document.cookie = `ifArtist=${data['ifArtist']}`;
            loadPage(data);
        }
    });
}
const saveUserData = (data) => {
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "changeUserData",
            "queryType": "UPDATE",
            "userNewData": data
        },
        success: (data) => {
            data = JSON.parse(data)[0]
            console.log(data)
            if (data) {
                alert("Успешно");
                location.reload();
            } else {
                alert("Ошибка");
            }
        }
    });
}
const newArtist = () => {

}

$(document).ready(() => {
    loadUserData();
    $('#logoutBtn').click(() => {
        document.cookie = `userID=null`
        document.cookie = `ifArtist=null`
        document.cookie = `auth=0`
        location.href = 'index.php'
    })
    $('#saveUserData').click(() => {
        let data = {
            name: $('#nameUser').val(),
            lastname: $('#lastnameUser').val(),
            surname: $('#surnameUser').val(),
            email: $('#emailUser').val(),
            city: $('#cityUser').val(),
            describe: $('#describeUser').val()
        }
        saveUserData(data)
    })
    $('#beArtist').click(() => {
        let data = {
            userID: get_cookie("userID"),
            city: $('#newCityUser').val(),
            describe: $('#newDescribeUser').val()
        }
        $.ajax({
            url: 'php/requests.php',
            type: "POST",
            data: {
                "requestsType": "newArtist",
                "queryType": "INSERT",
                "userNewData": data
            },
            success: (data) => {
                data = JSON.parse(data)[0]
                console.log(data)
                if (data) {
                    alert("Успешно");
                    location.reload();
                } else {
                    alert("Ошибка");
                }
            }
        });
        // saveUserData(data)
        // document.cookie = "ifArtist=1"
        // location.reload()
    })
})