<?php

function insertAdvertAgent($pdo, $first_name, $last_name, $work_space_nickname, $gender, $date_of_birth){

    $sql = "INSERT INTO advertising_agent (first_name, last_name, work_space_nickname, gender, date_of_birth) VALUES(?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $work_space_nickname, $gender, $date_of_birth]);

    if ($executeQuery) {
        return true;
    }
}

function getAllAdvertAgent ($pdo){
    $sql = "SELECT * FROM advertising_agent";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getAdvertAgentByID ($pdo, $advertisingAgent_id){
    $sql = "SELECT * FROM advertising_agent WHERE advertisingAgent_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$advertisingAgent_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}


function updateAdvertAgent($pdo, $first_name, $last_name, $work_space_nickname, $gender, $date_of_birth, $advertisingAgent_id) {
    $sql = "UPDATE advertising_agent
                SET first_name = ?,
                    last_name = ?,
                    work_space_nickname = ?,
                    gender = ?,
                    date_of_birth = ?
                WHERE advertisingAgent_id = ?
            ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $work_space_nickname, $gender, $date_of_birth, $advertisingAgent_id]);

    if ($executeQuery) {
        return true;
    }
}

function deleteAdvertAgent($pdo, $advertisingAgent_id) {
    $deleteAdvertProj = "DELETE FROM advertising_projects WHERE advertisingAgent_id = ?";
    $deleteStmt = $pdo->prepare($deleteAdvertProj);
    $executeDeleteQuery = $deleteStmt->execute([$advertisingAgent_id]);

    if ($executeDeleteQuery) {
        $sql = "DELETE FROM advertising_agent WHERE advertisingAgent_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$advertisingAgent_id]);

        if ($executeQuery) {
            return true;
        }
    }
}

function getProjectsByAdvertAgent($pdo, $advertisingAgent_id) {

    $sql = "SELECT
                advertising_projects.project_id AS Project_ID,
                advertising_agent.advertisingAgent_id AS Advertising_Agent_ID,
                advertising_projects.advertising_project_name AS Advertising_Project_Name,
                advertising_projects.kind_of_product AS Kind_Of_Product,
                advertising_projects.brand_name AS Brand_Name,
                advertising_projects.target_audience AS Target_Audience,
                advertising_projects.date_added AS Date_Added
            FROM advertising_projects
            JOIN advertising_agent ON advertising_projects.advertisingAgent_id = advertising_agent.advertisingAgent_id
            WHERE advertising_projects.advertisingAgent_id = ?
            ";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$advertisingAgent_id]);
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function insertProject($pdo, $advertising_project_name, $kind_of_product, $brand_name, $target_audience, $advertisingAgent_id) {
    $sql = "INSERT INTO advertising_projects (advertising_project_name, kind_of_product, brand_name, target_audience, advertisingAgent_id) VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$advertising_project_name, $kind_of_product, $brand_name, $target_audience, $advertisingAgent_id]);
    if ($executeQuery) {
        return true;
    }
}

function getProjectByID($pdo, $project_id) {
    $sql = "SELECT
                advertising_projects.project_id AS project_id,
                advertising_agent.advertisingAgent_id AS Advertising_Agent_ID,
                advertising_projects.advertising_project_name AS Advertising_Project_Name,
                advertising_projects.kind_of_product AS Kind_Of_Product,
                advertising_projects.brand_name AS Brand_Name,
                advertising_projects.target_audience AS Target_Audience,
                advertising_projects.date_added AS Date_Added
            FROM advertising_projects
            JOIN advertising_agent ON advertising_projects.advertisingAgent_id = advertising_agent.advertisingAgent_id
            WHERE advertising_projects.project_id = ?
            ";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function updateProject($pdo, $advertising_project_name, $kind_of_product, $brand_name, $target_audience, $project_id) {
    $sql = "UPDATE advertising_projects
            SET Advertising_Project_Name = ?,
                Kind_Of_Product = ?,
                Brand_Name = ?,
                Target_Audience = ?
            WHERE project_id = ?
            ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$advertising_project_name, $kind_of_product, $brand_name, $target_audience, $project_id]);

    if ($executeQuery) {
        return true;
    }
}

function deleteProject($pdo, $project_id) {
    $sql = "DELETE FROM advertising_projects WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_id]);
    if ($executeQuery) {
        return true;
    }
}
?>