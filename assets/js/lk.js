const loadPage = (data) => {
    let lkHTML = `
        <div class="row">
            <div class="col-3">
                <div class="d-grid">
                    <img src="assets/images/artists/${data['photoUser'] || 'empty.png'}" alt="">
                    <button type="button" id="changePhoto" class="btn btn-primary mt-3">Изменить фотографию</button>
                </div>
            </div>
            <div class="col">
                <h2>
                    ${data['lastnameUser']}
                    ${data['nameUser']}
                    ${data['surnameUser'] || ''}
                </h2>
                <p><span style='font-weight: bold;'>E-mail:</span> ${data['email']}</p>
                ${
                    data['ifArtist'] == "1" ?
                    `<p><span style='font-weight: bold;'>Город:</span> ${data['city']}</p>
                    <p><span style='font-weight: bold;'>О себе:</span> ${data['describeArtist']}</p>` :
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
                        <input type="text" class="form-control" placeholder="Фамилия" aria-label="Фамилия" id="inputLastname" value="${data['lastnameUser']}">
                    </div>
                    <div class="col">
                        <label class="form-label">Имя</label>
                        <input type="text" class="form-control" placeholder="Имя" aria-label="Имя" id="inputName" value="${data['nameUser']}">
                    </div>
                    <div class="col">
                        <label class="form-label">Отчество</label>
                        <input type="text" class="form-control" placeholder="Отчество" aria-label="Отчество" id="inputSurname" value="${data['surnameUser'] || ''}">
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" placeholder="Введите Ваш E-mail" aria-label="Введите Ваш E-mail" id="inputEmail" value="${data['email']}">
                </div>
                ${
                    data['ifArtist'] == '1' ?
                    `
                    <div class="mt-3">
                        <label class="form-label">Город</label>
                        <input type="email" class="form-control" placeholder="Введите Ваш город" aria-label="Введите Ваш город" id="inputCity" value="${data['city']}">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">E-mail</label>
                        <textarea class="form-control" placeholder="Напишите о себе" rows="6" id="inputDescribe" style="resize: none;">${data['describeArtist']}</textarea>
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
                name: $('#inputLastname').val(),
                lastname: $('#inputName').val(),
                surname: $('#inputSurname').val(),
                email: $('#inputEmail').val(),
                city: $('#inputCity').val(),
                describe: $('#inputDescribe').val()
            }
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
        saveUserData()
    })
    $('#newArtist').click(() => {
        // document.cookie = "ifArtist=1"
        // location.reload()
        // saveUserData()
    })
})