import get_cookie from './getCookie.js';

$(document).ready(() => {

    if (get_cookie('auth') == '1') {
        console.log('OK');
    } else {
        console.log("NO");
    }

});