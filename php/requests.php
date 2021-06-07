<?php 

    include 'db.php';
    $data = [];
    $queryType = $_POST['queryType'];
    $requestType = $_POST['requestsType'];

    switch ($requestType) {
        case 'selectPictures': // Запрос на выборку 10 картин из БД со статусом "Активно"
            $query = mysqli_query($link, "
                SELECT
                    `users`.`nameUser`,
                    `users`.`lastnameUser`,
                    `pictures`.`photoP`,
                    `pictures`.`nameP`,
                    `pictures`.`pictureID`
                FROM
                    `users`, `pictures`, `artists`
                WHERE
                    `artists`.`artistID` = `pictures`.`artistID` AND
                    `users`.`userID` = `artists`.`userID`
                ORDER BY RAND() LIMIT 8
            ") or die(mysqli_error($link));
            break;

        case 'selectPictureOnID': // Запрос на выборку определенной картину по ее ID
            $query = mysqli_query($link, "
                SELECT
                    `pictures`.`nameP`,
                    `pictures`.`photoP`,
                    `pictures`.`describeP`,
                    `users`.`nameUser`,
                    `users`.`lastnameUser`,
                    `users`.`photoUser`,
                    `artists`.`city`,
                    `artists`.`describeArtist`,
                    `type`.`nameType`,
                    `style`.`nameStyle`,
                    `states`.`nameState`
                FROM
                    `pictures`, `type`, `style`, `states`, `users`, `artists`
                WHERE
                    `pictures`.`pictureID` = $_POST[imageID] AND
                    `type`.`typeID` = `pictures`.`typeID` AND
                    `style`.`styleID` = `pictures`.`styleID` AND
                    `states`.`stateID` = `pictures`.`stateID` AND
                    `artists`.`artistID` = `pictures`.`artistID` AND
                    `users`.`userID` = `artists`.`userID`
            ") or die(mysqli_error($link));
            break;
        
        case "auth": // Запрос на авторизацию пользователь
            $query = mysqli_query($link, "SELECT `userID`, `login`, `password` FROM users WHERE `login`='$_POST[userLogin]' AND `password`='$_POST[userPassword]'");
            break;

        case "getUser": //
            $query = mysqli_query($link, "
                SELECT
                    `users`.`userID`,
                    `users`.`login`,
                    `users`.`password`,
                    `users`.`nameUser`,
                    `users`.`surnameUser`,
                    `users`.`lastnameUser`,
                    `users`.`email`,
                    `users`.`photoUser`,
                    `users`.`ifArtist`,
                    `artists`.`city`,
                    `artists`.`describeArtist`
                FROM 
                    `users`, `artists`
                WHERE
                    `users`.`userID` = $_COOKIE[userID] AND
                    `artists`.`userID` = `users`.`userID`
            ");
            break;

        case: // Изменение данные о пользователе
            $query = mysqli_query($link, "
                UPDATE `users`
                SET
                    
                WHERE `userID`=$_COOKIE[userID]
            ")
            break;
        
        default:
            echo json_encode(['Нет ответа'], JSON_UNESCAPED_UNICODE);
            break;
    }

    if ($queryType == "SELECT") {
        if (mysqli_num_rows($query) > 0) {
            while ($result = mysqli_fetch_array($query)) {
                array_push($data, $result);
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([
                "data" => null
            ], JSON_UNESCAPED_UNICODE);
        }
        exit();
    }
    if ($queryType == "INSERT" || $queryType == "UPDATE" || $queryType == "DELETE") {
        if ($query) {
            echo json_encode([true], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([false], JSON_UNESCAPED_UNICODE);
        }
        exit();
    }

?>