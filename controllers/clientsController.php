<?php
require_once realpath(dirname(__FILE__) . '/../') . '/' . "models/clientsModel.php";

class ClientsController{

	public function clients(){
              
              if ( isset($_SESSION['userData']) && $_SESSION['userData']['status'] == '202') {
                    require_once('./views/includes/header.php');
                    require_once('./views/pages/clients/clients.php');
                    require_once('./views/includes/footer.php');
              } else{
                    header('Location: login');
                    die();
              }
	}

      public function tableClients(){
            
            $data = ClientsModel::tableClients();

            echo json_encode($data);
      }

      public function infoClient(){
            $id = $_POST['id'];

            echo ClientsModel::infoClient($id);
            
      }

      public function saveClientsInfo(){
            
            $id_client = isset($_POST["txtId"]) ? $_POST["txtId"] : '';
            $firstName_client = isset($_POST["firstName_client"]) ? $_POST["firstName_client"] : '';
            $secondName_client = isset($_POST["secondName_client"]) ? $_POST["secondName_client"] : '';
            $phone_client = isset($_POST["phone_client"]) ? $_POST["phone_client"] : '';
            $mail_client = isset($_POST["mail_client"]) ? $_POST["mail_client"] : '';
            $address_client = isset($_POST["address_client"]) ? $_POST["address_client"] : '';
            $organization_client = isset($_POST["organization_client"]) ? $_POST["organization_client"] : '';
            $checkboxActive = isset($_POST["checkboxActive"]) ? $_POST["checkboxActive"] : 1;

            $fields = array(
                  "id_client" => $id_client,
                  "firstName_client" => $firstName_client,
                  "secondName_client" => $secondName_client,
                  "phone_client" => $phone_client,
                  "mail_client" => $mail_client,
                  "address_client" => $address_client,
                  "organization_client" => $organization_client,
                  "checkboxActive" => $checkboxActive,
            );
            
            echo ClientsModel::saveClientsInfo($fields);
      }
        
	
}
    
if (isset($_GET['action']) && $_GET['action'] === 'tableClients') {
      $tableClients = new ClientsController();
      $tableClients->tableClients();
}
    
if (isset($_POST['action']) && $_POST['action'] === 'infoClient') {
      $infoClient = new ClientsController();
      $infoClient->infoClient();
}

if (isset($_POST['action']) && $_POST['action'] === 'saveClientsInfo') {
      $saveClientsInfo = new ClientsController();
      $saveClientsInfo->saveClientsInfo();
}