<?php
require_once realpath(dirname(__FILE__) . '/../') . '/' . "models/includesModel.php";

class IncludesController
{

    public function MenuSidebar()
    {
        $navbaArray = IncludesModel::MenuSidebar();

        if (isset($_SESSION['userData']['su_user']) && $_SESSION['userData']['su_user'] == 1) {
            $adminArray = array(
                array(
                    'id_page' => '',
                    'name_page' => 'Users',
                    'urlpage_page' => 'users',
                    'clase_page' => 'fas fa-users',
                    'id_parent_page' => '',
                    'catalogue_page' => '',
                ),
                array(
                    'id_page' => '',
                    'name_page' => 'Roles',
                    'urlpage_page' => 'roles',
                    'clase_page' => 'fas fa-user-tag',
                    'id_parent_page' => '',
                    'catalogue_page' => '',
                ),
                array(
                    'id_page' => '',
                    'name_page' => 'Pages',
                    'urlpage_page' => 'pages',
                    'clase_page' => 'fas fa-bars',
                    'id_parent_page' => '',
                    'catalogue_page' => '',
                ),
            );

            $arrayNavbar = array_merge($navbaArray, $adminArray);
            $menu = '';

            foreach ($arrayNavbar as $pagina) {
                $id_page = $pagina['id_page'];
                $name_page = $pagina['name_page'];
                $urlpage_page = $pagina['urlpage_page'];
                $clase_page = $pagina['clase_page'];
                $id_parent_page = $pagina['id_parent_page'];
                $catalogue_page = $pagina['catalogue_page'];

                if ($_GET['page'] == $urlpage_page) {
                    $active = 'active';
                } else {
                    $active = '';
                }

                if ($name_page == 'Users') {
                    $menu .= '<li class="nav-item mt-3">
                                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Settings</h6>
                              </li>';
                }

                $menu .= '<li class="nav-item">
                            <a class="nav-link text-white ' . $active . '" href="' . $urlpage_page . '">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="' . $clase_page . '"></i>
                                </div>  
                                <span class="nav-link-text ms-1">' . $name_page . '</span>
                            </a>
                          </li>
                ';
            }

            return $menu;
        }
    }

    public function userInfo($id_user)
    {
        return IncludesModel::userInfo($id_user);
    }
}
