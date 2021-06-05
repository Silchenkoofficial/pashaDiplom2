const loadPage = (data) => {
    $('#pictureName').text(data['pictureName'])
    $('#pictureDescribe').text(data['pictureName'])
    $('#pictureURL').text(data['pictureName'])
    $('#authorName').text(data['pictureName'])
    $('#authorCity').text(data['pictureName'])
    $('#authorDescribe').text(data['pictureName'])
    $('#authorURL').text(data['pictureName'])
}

$(document).ready(() => {
    $.ajax({
        url: 'php/requests.php',
        type: "POST",

        data: {
            "imageID": localStorage.getItem("imageID"),
            "requestsType": "selectPictureOnID"
        },
        success: (data) => {
            loadPage(JSON.parse(data)[0])
        }
    })

})