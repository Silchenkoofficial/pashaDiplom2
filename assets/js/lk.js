const loadPage = (data) => {
    let lkHTML = `
        <div class="row">
            <div class="col-3">
                <div class="d-grid">
                    <img src="assets/images/artists/empty.png" alt="">
                    <button type="button" id="changePhoto" class="btn btn-primary mt-3">Изменить фотографию</button>
                </div>
            </div>
            <div class="col">
                <h2>
                    <span id="lastnameUser">${data['lastnameUser']}</span>
                    <span id="nameUser">${data['nameUser']}</span>
                    <span id="surnameUser">${data['surnameUser'] || ''}</span>
                </h2>
                <p><span style='font-weight: bold;'>E-mail:</span> ${data['email']}</p>
                ${
                    data['ifArtist'] == "1" ?
                    `<p><span style='font-weight: bold;'>Город:</span> <span id="cityUser">${data['city']}</span></p>
                    <p><span style='font-weight: bold;'>О себе:</span> <span id="describeUser">${data['describeArtist']}</span></p>` :
                    `<button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#beArtistModal">Стать художником</button>`
                }
            </div>
        </div>
    `;

    let changeProfileHTML = `
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Фамилия</label>
                        <input type="text" class="form-control" placeholder="Фамилия" aria-label="Фамилия" id="lastnameUser" value="${data['lastnameUser']}">
                    </div>
                    <div class="col">
                        <label class="form-label">Имя</label>
                        <input type="text" class="form-control" placeholder="Имя" aria-label="Имя" id="nameUser" value="${data['nameUser']}">
                    </div>
                    <div class="col">
                        <label class="form-label">Отчество</label>
                        <input type="text" class="form-control" placeholder="Отчество" aria-label="Отчество" id="surnameUser" value="${data['surnameUser'] || ''}">
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" placeholder="Введите Ваш E-mail" aria-label="Введите Ваш E-mail" id="emailUser" value="${data['email']}">
                </div>
                ${
                    data['ifArtist'] == '1' ?
                    `
                    <div class="mt-3">
                        <label class="form-label">Город</label>
                        <input type="email" class="form-control" placeholder="Введите Ваш город" aria-label="Введите Ваш город" id="cityUser" value="${data['city']}">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">E-mail</label>
                        <textarea class="form-control" placeholder="Напишите о себе" rows="6" id="describeUser" style="resize: none;">${data['describeArtist']}</textarea>
                    </div>
                    ` : ``
                }
            </div>
        </div>
    `;

    $('.lk').html(lkHTML);
    $('#changeProfileForm').html(changeProfileHTML);
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
            console.log(data)
            loadPage(data);
        }
    });
}
const saveUserData = () => {
    $.ajax({
        url: 'php/requests.php',
        type: "POST",
        data: {
            "requestsType": "changeUserData",
            "queryType": "UPDATE",
            "userNewData" : {
                name: $('#nameUser').val(),
                lastname: $('#lastnameUser').val(),
                surname: $('#surnameUser').val(),
                email: $('#emailUser').val(),
                city: $('#cityUser').val(),
                describe: $('#describeUser').val()
            }
        },
        success: (data) => {
            data = JSON.parse(data)[0]
            console.log(data)
            if (data) {
                alert("Успешно");
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
        saveUserData()
    })
    $('#beArtist').click(() => {
        saveUserData()
        document.cookie = "ifArtist=1"
        location.reload()
    })
})