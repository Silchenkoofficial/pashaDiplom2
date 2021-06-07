const addNewUser = () => {
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "newUser",
            "queryType": "INSERT",
            "userNewData": {
                'name': $('#nameUser').val(),
                'lastname': $('#lastnameUser').val(),
                'surname': $('#surnameUser').val(),
                'email': $('#emailUser').val(),
                'login': $('#loginUser').val(),
                'password': $('#passwordUser').val(),
                'photoUser': $('#photoUser').val()
            }
        },
        success: (data) => {
            data = JSON.parse(data)
            console.log(data);
            alert("Вы успешно зарегестрированы!");
            location.href = 'index.php';
        }
    })
}

$(document).ready(() => {

    $('#regBtn').click(function (e) { 
        e.preventDefault();
        let login = $('#loginUser').val();
        let password = $('#passwordUser').val();
        console.log($('#photoUser').val());
        if (login !== '' && password !== '') {
            // $.ajax({
            //     url: "php/requests.php",
            //     type: "POST",
            //     data: {
            //         "requestsType": "reg",
            //         "queryType": "SELECT",
            //         "userLogin": login
            //     },
            //     success: (data) => {
            //         data = JSON.parse(data)[0];
            //         console.log(data);
            //         if (!data) {
            //             addNewUser();
            //         } else {
            //             alert('Логин уже занят');
            //         }
            //     }
            // });
        } else {
            alert('Заполните все поля');
        }

    });

})