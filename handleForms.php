<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertAdvertAgentBtn'])) {

    $query = insertAdvertAgent($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['WorkSpaceNickname'], $_POST['gender'], $_POST['dateOfBirth']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editAdvertAgentBtn'])) {
    $query = updateAdvertAgent($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['workSpaceNickname'], $_POST['gender'], $_POST['dateOfBirth'], 
        $_GET['advertisingAgent_id']);

    if ($query) {
        header("Location: ../index.php");
    }

    else {
        echo "Edit failed";
    }
}

if (isset($_POST['deleteAdvertAgentBtn'])) {
    $query = deleteAdvertAgent($pdo, $_GET['advertisingAgent_id']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Deletion failed";
    }
}

if (isset($_POST['insertNewProjectBtn'])) {
    $query = insertProject($pdo, $_POST['AdvertisingProjectName'], $_POST['kindOfProduct'], $_POST['brandName'], $_POST['targetAudience'], $_GET['advertisingAgent_id']);

    if ($query) {
        header("Location: ../viewprojects.php?advertisingAgent_id=" .$_GET['advertisingAgent_id']);
    }
    else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editProjectBtn'])) {
    $query = updateProject($pdo, $_POST['advertisingProjectName'], $_POST['kindOfProduct'], $_POST['brandName'], $_POST['targetAudience'], $_GET['project_id']);

    if ($query) {
        header("Location: ../viewprojects.php?advertisingAgent_id=" .$_GET['advertisingAgent_id']);
	}

	else {
		echo "Edit failed";;
	}
}


if (isset($_POST['deleteProjectBtn'])) {
    $query = deleteProject($pdo, $_GET['project_id']);

    if ($query) {
        header("Location: ../viewprojects.php?advertisingAgent_id=" .$_GET['advertisingAgent_id']);
    }
    else {
        echo "Deletion failed";
    }
}

?>
