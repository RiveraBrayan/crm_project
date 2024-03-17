
-- Create Clients Table
CREATE TABLE crm_project.clients (
	id_client INT auto_increment NOT NULL,
	firstName_client varchar(100) NULL,
	secondName_client varchar(100) NULL,
	phone_client varchar(100) NULL,
	mail_client varchar(100) NULL,
	address_client varchar(250) NULL,
	user_creation varchar(100) NULL,
	date_creation DATETIME DEFAULT current_timestamp() NULL,
	user_edition varchar(100) NULL,
	date_edition DATETIME NULL,
	CONSTRAINT clients_pk PRIMARY KEY (id_client)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
