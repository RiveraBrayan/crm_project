<?php
require_once realpath(dirname(__FILE__) . '/../') . '/' . "models/usersModel.php";

class UsersController
{

      /** 
       * The `users` function checks if a user is logged in and has a specific status before displaying the
       * users page, otherwise it redirects to the login page.
       */
      public function users()
      {

            if (isset($_SESSION['userData']) && $_SESSION['userData']['status'] == '202') {
                  require_once('./views/includes/header.php');
                  require_once('./views/pages/users/users.php');
                  require_once('./views/includes/footer.php');
            } else {
                  header('Location: login');
                  die();
            }
      }

      /**
       * The function `usersTable` is used to obtain the information for the table
       *  in a Json
       */
      public function usersTable()
      {

            // Filters for the table
            $txtNameFilter = isset($_GET["txtNameFilter"]) ? $_GET["txtNameFilter"] : '';
            $txtUsernameFilter = isset($_GET["txtUsernameFilter"]) ? $_GET["txtUsernameFilter"] : '';
            $txtEmailFilter = isset($_GET["txtEmailFilter"]) ? $_GET["txtEmailFilter"] : '';
            $txtStatusUser = isset($_GET["txtStatusUser"]) ? $_GET["txtStatusUser"] : '';

            // Array with the filters
            $fields = array(
                  "txtNameFilter" => $txtNameFilter,
                  "txtUsernameFilter" => $txtUsernameFilter,
                  "txtEmailFilter" => $txtEmailFilter,
                  "txtStatusUser" => $txtStatusUser,
            );


            /* Save in `data` variale the petition to the Model to obtain the data*/
            $data = UsersModel::usersTable($fields);

            echo $data;
      }

      /**
       * The function retrieves role data for a specific user and returns it in JSON format.
       */
      public function rolesTable()
      {

            $id_user = isset($_GET["id_user"]) ? $_GET["id_user"] : '';

            // Array with the filters
            $fields = array(
                  "id_user" => $id_user,
            );

            $data = UsersModel::rolesTable($fields);

            echo $data;
      }

      /**
       * The function `usersInfo` retrieves user information based on the provided user ID.
       */
      public function usersInfo()
      {
            // variable for the users id
            $id_user = $_POST['id_user'];

            echo UsersModel::usersInfo($id_user);
      }

      /**
       * The function `saveUsersInfo` is use to create o update a user in the system
       */
      public function saveUsersInfo()
      {

            // Obtain the data of the form
            $id_user = isset($_POST["txtId"]) ? $_POST["txtId"] : '';
            $username_user = isset($_POST["txtUsername"]) ? $_POST["txtUsername"] : '';
            $password_user = isset($_POST["txtPassword"]) ? $_POST["txtPassword"] : '';
            $name_user = isset($_POST["txtFullname"]) ? $_POST["txtFullname"] : '';
            $email_user = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : '';
            $phone_user = isset($_POST["txtPhone"]) ? $_POST["txtPhone"] : '';
            $deparment_user = isset($_POST["txtDeparment"]) ? $_POST["txtDeparment"] : '';
            $position_user = isset($_POST["txtPosition"]) ? $_POST["txtPosition"] : '';
            $checkboxSuperSu = isset($_POST["checkboxSuperSu"]) ? $_POST["checkboxSuperSu"] : '';
            $checkboxActive = isset($_POST["checkboxActive"]) ? $_POST["checkboxActive"] : '';

            // Array with the data
            $fields = array(
                  "id_user" => $id_user,
                  "username_user" => $username_user,
                  "password_user" => $password_user,
                  "name_user" => $name_user,
                  "email_user" => $email_user,
                  "phone_user" => $phone_user,
                  "deparment_user" => $deparment_user,
                  "position_user" => $position_user,
                  "checkboxSuperSu" => $checkboxSuperSu,
                  "checkboxActive" => $checkboxActive,
            );

            /* The line `echo UsersModel::saveUsersInfo();` is calling the `saveUsersInfo`
                  method from the `UsersModel` class and passing the `` array as a parameter.
                  The method likely processes the data in the `` array to create or update a
                  user in the system, and then returns a response which is being echoed out. */
            echo UsersModel::saveUsersInfo($fields);
      }

      /**
       * The function `saveRolesinfo` is use to give to the user a rol
       */
      public function saveRolesinfo()
      {
            // Obtain the data of the form
            $id_user = isset($_POST["id_user"]) ? $_POST["id_user"] : '';
            $id_rol = isset($_POST["id_rol"]) ? $_POST["id_rol"] : '';

            // Array with the data
            $fields = array(
                  "id_user" => $id_user,
                  "id_rol" => $id_rol,
            );

            /* The line `echo UsersModel::saveRolesinfo();` is calling the `saveRolesinfo`
                  method from the `UsersModel` class and passing the `` array as a parameter.
                  The method likely processes the data in the `` array to save role
                  information for a specific user in the system, and then returns a response which
                  is being echoed out. */
            echo UsersModel::saveRolesinfo($fields);
      }
}

/* This block of code is checking for specific actions in the request parameters and
then instantiating the `UsersController` class to call different methods based on the action
specified. */
if (isset($_GET['action']) && $_GET['action'] === 'tableUsers') {
      $tableUsers = new UsersController();
      $tableUsers->usersTable();
}

if (isset($_GET['action']) && $_GET['action'] === 'tableRoles') {
      $tableRoles = new UsersController();
      $tableRoles->rolesTable();
}

if (isset($_POST['action']) && $_POST['action'] === 'infoUsers') {
      $infoUsers = new UsersController();
      $infoUsers->usersInfo();
}

if (isset($_POST['action']) && $_POST['action'] === 'saveUsersInfo') {
      $saveUsersInfo = new UsersController();
      $saveUsersInfo->saveUsersInfo();
}

if (isset($_POST['action']) && $_POST['action'] === 'saveRolesinfo') {
      $saveRolesinfo = new UsersController();
      $saveRolesinfo->saveRolesinfo();
}
