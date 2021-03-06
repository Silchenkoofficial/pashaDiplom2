<?php 

    include 'db.php';
    $data = [];
    $queryType = $_POST['queryType'];
    $requestType = $_POST['requestsType'];

    switch ($requestType) {
        case 'selectPictures': // Запрос на выборку 10 картин из БД со статусом "Активно"
            $queryText = "
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
                    `users`.`userID` = `artists`.`userID` AND
                    `pictures`.`stateID` = 2
                ORDER BY RAND()  
            ";
            if (!isset($_POST['isGallery'])) {
                $queryText .= "LIMIT 8";
            }
            $query = mysqli_query($link, $queryText) or die(mysqli_error($link));
            break;

        case 'selectPictureOnID': // Запрос на выборку определенной картину по ее ID
            $query = mysqli_query($link, "
                SELECT
                    `pictures`.`nameP`,
                    `pictures`.`photoP`,
                    `pictures`.`describeP`,
                    `users`.`userID`,
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
            $query = mysqli_query($link, "SELECT `userID`, `login`, `password`, `ifArtist` FROM users WHERE `login`='$_POST[userLogin]' AND `password`='$_POST[userPassword]'");
            break;

        case "reg": // Запрос на авторизацию пользователь
            $query = mysqli_query($link, "SELECT `userID`, `login`FROM users WHERE `login`='$_POST[userLogin]'");
            break;

        case "getUser": //
            $query = mysqli_query($link, "SELECT `users`.`ifArtist` FROM `users` WHERE `users`.`userID` = $_COOKIE[userID]");
            $result = mysqli_fetch_array($query);
            if ($result['ifArtist'] == '1') {
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
            } else {
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
                        `users`.`ifArtist`
                    FROM 
                        `users`
                    WHERE
                        `users`.`userID` = $_COOKIE[userID]
                ");
            }
            break;

        case "changeUserData": // Изменение данные о пользователе
            $userData = $_POST['userNewData'];
            $queryText = "
                UPDATE `users`
                SET
                    `nameUser` = '$userData[name]',
                    `surnameUser` = '$userData[surname]',
                    `lastnameUser` = '$userData[lastname]',
                    `email` = '$userData[email]'
                WHERE userID=$_COOKIE[userID]
            ";
            $query = mysqli_query($link, $queryText);
            if ($query) {
                if ($_COOKIE['ifArtist'] == '1') {
                    $queryText = "
                        UPDATE `artists`
                        SET `city` = '$userData[city]', `describeArtist`='$userData[describe]'
                        WHERE `userID` = $_COOKIE[userID]
                    ";
                    $query = mysqli_query($link, $queryText);
                }
            }
            break;
        
        case "newUser": // Запрос на добавление нового пользователя
            $userData = $_POST['userNewData'];
            $query = mysqli_query($link, "
                INSERT INTO `users` VALUES (
                    NULL,
                    '$userData[login]',
                    '$userData[password]',
                    '$userData[name]',
                    '$userData[surname]',
                    '$userData[lastname]',
                    '$userData[email]',
                    '$userData[photoUser]',
                    0
                )
            ");
            break;
        
        case "newArtist": //
            $userData = $_POST['userNewData'];
            $query = mysqli_query($link, "
                INSERT INTO `artists` VALUES (
                    NULL,
                    '$_COOKIE[userID]',
                    '$userData[city]',
                    '$userData[describe]',
                    0
                )
            ");
            if ($query) {
                $query = mysqli_query($link, "UPDATE `users` SET `ifArtist` = TRUE WHERE `userID`='$_COOKIE[userID]'");
            }
            break;
        
        case "filter": //
            $optionSelected = $_POST['optionSelected'];
            $queryText = "SELECT * FROM $optionSelected";
            $query = mysqli_query($link, $queryText);
            break;
        
        case "filterSecond": //
            $optionSelected = $_POST['optionSelected'];
            $optionSecondSelected = $_POST['optionSecondSelected'];
            $queryText = "
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
                    `users`.`userID` = `artists`.`userID` AND
                    `pictures`.`stateID` = 2 AND 
            ";
            if ($optionSelected == 'type') {
                $queryText .= "`pictures`.`typeID` = $optionSecondSelected ORDER BY RAND()";
            } else if ($optionSelected == 'style') {
                $queryText .= "`pictures`.`styleID` = $optionSecondSelected ORDER BY RAND()";
            }
            $query = mysqli_query($link, $queryText);
            break;

        case "imageVote": //
            $dataPost = $_POST['data'];
            $querySelect = mysqli_query($link, "SELECT * FROM votes WHERE userID = $_COOKIE[userID] AND pictureID = $dataPost[pictureID]");
            if (mysqli_num_rows($querySelect) == 0) {
                $alreadyVotes = false;
                $queryText = "INSERT INTO votes VALUES(
                    NULL,
                    $dataPost[userID],
                    $dataPost[pictureID],
                    '" . date("Y-m-d") . "'
                )";
                $query = mysqli_query($link, $queryText);

                $queryText = "UPDATE `pictures` SET `pointsPictures` = `pointsPictures` + 1 WHERE `pictureID` = $dataPost[pictureID]";
                $query = mysqli_query($link, $queryText);
    
                $queryText = "UPDATE `artists` SET `pointsArtist` = `pointsArtist` + 1 WHERE `userID` = $dataPost[artistID]";
                $query = mysqli_query($link, $queryText);
    
            } else {
                $alreadyVotes = true;
            }
            break;
        
        // case "": //
        //     $queryText = "INSERT INTO pictures VALUES (
        //         NULL,
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         ''
        //     )";
        //     $query = mysqli_query($link, $queryText);
        //     break;
        
        case "getTypes": //
            $query = mysqli_query($link, "SELECT * FROM `type`");
            break;

        case "getStyles": //
            $query = mysqli_query($link, "SELECT * FROM `style`");
            break;

        default:
            echo json_encode([false], JSON_UNESCAPED_UNICODE);
            break;
    }

    if ($queryType == "SELECT") {
        if (mysqli_num_rows($query) > 0) {
            while ($result = mysqli_fetch_array($query)) {
                array_push($data, $result);
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([false], JSON_UNESCAPED_UNICODE);
        }
        exit();
    }
    if ($queryType == "INSERT" || $queryType == "UPDATE" || $queryType == "DELETE") {
        if ($alreadyVotes) {
            echo json_encode(['Вы уже проголосовали'], JSON_UNESCAPED_UNICODE);
            exit();
        }
        if ($query) {
            echo json_encode([true], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['falses'], JSON_UNESCAPED_UNICODE);
        }
        exit();
    }

?>