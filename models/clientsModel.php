<?php
require_once realpath(dirname(__FILE__) . '/../') . '/' . "config/connection.php";

class ClientsModel
{

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
				$fullName = $firstName_client.' '.$secondName_client;
				$phone_client = $row['phone_client'];
				$mail_client = $row['mail_client'];
				$address_client = $row['address_client'];
				$organization_client = $row['organization_client'];

				$actions = "
					<div >
					<a type='button' href='clients&edition=$id_client' class='btn btn-icon btn-2 btn-info'>
						<span class='btn-inner--icon'><i class='fas fa-edit'></i></span>
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

			return $data;
		} else {
			$data = array();
			return $data;
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

			$stmt->bind_param("ssssss", $firstName_client, $secondName_client, $phone_client, $mail_client,$address_client,$organization_client);

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
}
