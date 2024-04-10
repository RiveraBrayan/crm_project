<?php
require_once realpath(dirname(__FILE__) . '/../') . '/' . "config/connection.php";

class ClientsModel
{

    /**********************************************
    * Clients Functions
    **********************************************/
	static public function tableClients()
	{


		$db = DBConexion::connection();

		$sql = 'SELECT * FROM clients';

		$stmt = $db->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$counter = 1;
			while ($row = $result->fetch_assoc()) {
				$id_client = $row['id_client'];
				$firstName_client = $row['firstName_client'];
				$secondName_client = $row['secondName_client'];
				$fullName = $firstName_client . ' ' . $secondName_client;
				$phone_client = $row['phone_client'];
				$mail_client = $row['mail_client'];
				$address_client = $row['address_client'];
				$organization_client = $row['organization_client'];

				$actions = "
					<div >
					<a type='button' href='clients&edition=$id_client' class='btn btn-icon btn-2 btn-info'>
						<span class='btn-inner--icon'><i class='fas fa-edit'></i></span>
					</a>
					<a type='button' href='clients&interaction=$id_client' class='btn btn-icon btn-2 btn-success'>
						<span class='btn-inner--icon'><i class='far fa-clipboard'></i></span>
					</a>
					<button class='btn btn-icon btn-2 btn-danger deleteRegister' type='button' data-id='$id_client' data-table='clients' data-suffix='client' data-page='clients'>
						<span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span>
					</button>
				</div>
								";

				$data[] = array(
					"counter" => $counter,
					"fullName" => $fullName,
					"phone_client" => $phone_client,
					"mail_client" => $mail_client,
					"address_client" => $address_client,
					"organization_client" => $organization_client,
					"actions" => $actions
				);

				$counter++;
			}

			return json_encode($data);
		} else {
			$data = array();
			return json_encode($data);
		}


		$stmt->close();
		$db->close();
	}

	static public function infoClient($id_client)
	{

		$db = DBConexion::connection();

		$sql = "SELECT * FROM clients WHERE id_client = ?";
		$stmt = $db->prepare($sql);

		$stmt->bind_param("i", $id_client);

		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$data = $result->fetch_assoc();
			$arrayDatos = array('status' => 202, 'JsonData' => $data);
		} else {
			$data = array();
			$arrayDatos = array('status' => 404, 'JsonData' => $data);
		}


		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($arrayDatos, JSON_PRETTY_PRINT);

		$stmt->close();
		$db->close();
	}

	static public function saveClientsInfo($fields)
	{
		$db = DBConexion::connection();

		$id_client = $fields['id_client'];
		$firstName_client = $fields['firstName_client'];
		$secondName_client = $fields['secondName_client'];
		$phone_client = $fields['phone_client'];
		$mail_client = $fields['mail_client'];
		$address_client = $fields['address_client'];
		$organization_client = $fields['organization_client'];
		$status_client = $fields['checkboxActive'];

		if (isset($id_client) && $id_client != '') {

			$sql = "UPDATE clients SET firstName_client = ?, secondName_client = ?, phone_client = ?, mail_client = ?, address_client = ?, organization_client = ?, status_client = ? WHERE id_client = ?";

			$stmt = $db->prepare($sql);

			$stmt->bind_param("ssssssss", $firstName_client, $secondName_client, $phone_client, $mail_client, $address_client, $organization_client, $status_client, $id_client);

			if ($stmt->execute()) {
				$arrayDatos = array('status' => 202, 'message' => 'Client Updated');
			} else {
				$arrayDatos = array('status' => 404, 'message' => 'Error');
			}

			$stmt->close();
		} else {

			$sql = "INSERT INTO clients (firstName_client,secondName_client,phone_client,mail_client,address_client,organization_client) 
				VALUES (?,?,?,?,?,?)";

			$stmt = $db->prepare($sql);

			$stmt->bind_param("ssssss", $firstName_client, $secondName_client, $phone_client, $mail_client, $address_client, $organization_client);

			if ($stmt->execute()) {
				$arrayDatos = array('status' => 202, 'message' => 'Client Created');
			} else {
				$arrayDatos = array('status' => 404, 'message' => 'Error');
			}

			$stmt->close();
		}

		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($arrayDatos, JSON_PRETTY_PRINT);


		$db->close();
	}

    /**********************************************
    * Interactions Functions
    **********************************************/

	static public function tableInteractions($fields)
	{

		$id_client = $fields['id_client'];

		$db = DBConexion::connection();

		$sql = 'SELECT * FROM interactions WHERE id_client = ?';

		$stmt = $db->prepare($sql);

		$stmt->bind_param("i", $id_client);

		if ($stmt) {

			$stmt->execute();

			$result = $stmt->get_result();

			if ($result->num_rows > 0) {

				$counter = 1;
				while ($row = $result->fetch_assoc()) {
					$id_client = $row['id_client'];
					$id_interaction = $row['id_interaction'];
					$type_interaction = $row['type_interaction'];
					$date_interaction = $row['date_interaction'];
					$description_interaction = $row['description_interaction'];

					$actions = "
									<a type='button' href='javascript:;' class='btn btn-icon btn-2 btn-info btnModalClients' id='btnModalClients' data-toggle='modal' data-target='#editionInformationModal' data-id='$id_interaction' data-type_interaction='$type_interaction' data-date='$date_interaction' data-description='$description_interaction'>
										<i style='color: white !important;' class='fas fa-edit text-secondary text-sm modalEditUser' ></i><span class='sr-only'>Edit Profile</span>
									</a>
									<button class='btn btn-icon btn-2 btn-danger deleteRegister' type='button' data-id='$id_interaction' data-table='interactions' data-suffix='interaction' data-page='clients&interaction=$id_client'>
										<span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span>
									</button>
								";

					$data[] = array(
						"counter" => $counter,
						"type_interaction" => $type_interaction,
						"date_interaction" => $date_interaction,
						"description_interaction" => $description_interaction,
						"actions" => $actions
					);

					$counter++;
				}


				return json_encode($data);
			} else {
				$data = array();
				return json_encode($data);
			}

			$stmt->close();
		} else {
			echo "Error en la preparación de la consulta.";
		}

		$db->close();
	}
	static public function saveInteractionsInfo($fields)
	{
		$db = DBConexion::connection();

		$id_client = $fields['id_client'];
		$id_interaction = $fields['id_interaction'];
		$type_interaction = $fields['type_interaction'];
		$date_interaction = $fields['date_interaction'];
		$description_interaction = $fields['description_interaction'];

		if (isset($id_interaction) && $id_interaction != '') {

			$sql = "UPDATE interactions SET id_client = ?, type_interaction = ?, date_interaction = ?, description_interaction = ? WHERE id_interaction = ?";

			$stmt = $db->prepare($sql);

			$stmt->bind_param("sssss", $id_client, $type_interaction, $date_interaction, $description_interaction, $id_interaction);

			if ($stmt->execute()) {
				$arrayDatos = array('status' => 202, 'message' => 'Interaction Updated', 'id' => $id_client);
			} else {
				$arrayDatos = array('status' => 404, 'message' => 'Error');
			}

			$stmt->close();
		} else {

			$sql = "INSERT INTO interactions (id_client,type_interaction,date_interaction,description_interaction) 
				VALUES (?,?,?,?)";

			$stmt = $db->prepare($sql);

			$stmt->bind_param("ssss", $id_client, $type_interaction, $date_interaction, $description_interaction);

			if ($stmt->execute()) {
				// $lastInsertedId = $db->insert_id;
				$arrayDatos = array('status' => 202, 'message' => 'Interaction Created', 'id' => $id_client);
			} else {
				$arrayDatos = array('status' => 404, 'message' => 'Error');
			}

			$stmt->close();
		}

		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($arrayDatos, JSON_PRETTY_PRINT);


		$db->close();
	}


}
