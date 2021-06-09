import get_cookie from './getCookie.js';

$(document).ready(() => {

    if (get_cookie('auth') != '1') {
        $('#modalAddPictureBody').empty()
        $('#modalAddPictureFooter').empty()
        $('#modalAddPictureBody').append(`<p>Для добавления картины необходимо авторизоваться и стать художником!</p>`)
    }

});