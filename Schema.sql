CREATE TABLE advertising_agent(
    advertisingAgent_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    work_space_nickname VARCHAR (50),
    gender VARCHAR (50),
    date_of_birth VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE advertising_projects(
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    advertisingAgent_id INT, 
    advertising_project_name VARCHAR(50),
    kind_of_product VARCHAR(50),
    brand_name VARCHAR (50),
    target_audience VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);