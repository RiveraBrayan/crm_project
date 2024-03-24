<?php
require_once realpath(dirname(__FILE__) . '/../') . '/' . "models/clientsModel.php";

class ClientsController{

    /**********************************************
    * Clients Functions
    **********************************************/
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

            echo $data;
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

    /**********************************************
    * Interactions Functions
    **********************************************/
      public function tableInteractions(){

            
            $id_client = $_GET['id_client'];

            $fields = array(
                  "id_client" => $id_client
            );
                  
            $data = ClientsModel::tableInteractions($fields);

            echo $data;
      }

      public function saveInteractionsInfo(){
            
            $id_client = isset($_POST["id_client"]) ? $_POST["id_client"] : '';
            $id_interaction = isset($_POST["id_interaction"]) ? $_POST["id_interaction"] : '';
            $type_interaction = isset($_POST["txtTypeInteraction"]) ? $_POST["txtTypeInteraction"] : '';
            $date_interaction = isset($_POST["txtDate"]) ? $_POST["txtDate"] : '';
            $description_interaction = isset($_POST["txtDescription"]) ? $_POST["txtDescription"] : '';
            $fields = array(
                  "id_client" => $id_client,
                  "id_interaction" => $id_interaction,
                  "type_interaction" => $type_interaction,
                  "date_interaction" => $date_interaction,
                  "description_interaction" => $description_interaction,
            );
            
            echo ClientsModel::saveInteractionsInfo($fields);
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
    
if (isset($_GET['action']) && $_GET['action'] === 'tableInteractions') {
      $tableInteractions = new ClientsController();
      $tableInteractions->tableInteractions();
}

if (isset($_POST['action']) && $_POST['action'] === 'saveInteractionsInfo') {
      $saveInteractionsInfo = new ClientsController();
      $saveInteractionsInfo->saveInteractionsInfo();
}