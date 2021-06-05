<?php 

    include 'db.php';
    $data = [];
    $requestType = $_POST['requestsType'];

    switch ($requestType) {
        case 'selectPictures': // Запрос на выборку всех картин из БД со статусом "Активно"
            $query = mysqli_query($link, "
                SELECT
                    `users`.`nameUser`,
                    `users`.`lastnameUser`,
                    `pictures`.`photoP`,
                    `pictures`.`pictureID`
                FROM
                    `users`, `pictures`, `artists`
                WHERE
                    `artists`.`artistID` = `pictures`.`artistID` AND
                    `users`.`userID` = `artists`.`userID`
            ") or die(mysqli_error($link));
            while ($result = mysqli_fetch_array($query)) {
                array_push($data, [
                    "pictureID" => $result['pictureID'],
                    "userFullName" => "$result[nameUser] $result[lastnameUser]",
                    "pictureURL" => $result['photoP']
                ]);
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
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
            while ($result = mysqli_fetch_array($query)) {
                array_push($data, [
                    "pictureName" => $result['nameP'],
                    "pictureURL" => $result['photoP'],
                    "pictureDescribe" => $result['describeP'],
                    "userFullName" => "$result[nameUser] $result[lastnameUser]",
                    "userImageURL" => $result['photoUser'],
                    "userCity" => $result['city'],
                    "userDescribe" => $result['describeArtist'],
                    "pictureType" => $result['nameType'],
                    "pictureStyle" => $result['nameStyle'],
                    "pictureState" => $result['nameState']
                ]);
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            break;
        
        
        
        //
        default:
            echo json_encode(['Нет ответа'], JSON_UNESCAPED_UNICODE);
            break;
    }

?>