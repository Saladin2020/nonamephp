<?php

class builderCRUD {

    public static function CREATE(
            $projectfolder,
            $conn,
            $tablename,
            $result,
            $ROUTE,
            $MENU
    ) {
        $result['NAMEPOST'] = crud::colstatus($conn, $tablename);
        if (method::postAllOrigin() != null) {
            $namepost = array();
            foreach (method::postAllOrigin() as $key => $value) {
                $namepost[$key] = $value;
            }
            $result['STATUSINSERT'] = crud::create($conn, $tablename, $namepost);
        }
        $data = array(
            'TITLE' => 'yNotification',
            'BASEURL' => $ROUTE['BASEURL'],
            'HEADERNAME' => 'yNotification',
            'CRUDROUTE' => $ROUTE['BASEURL'] . '/index.php/' . $projectfolder . '/',
            'RESULT' => $result,
            'SIDEBAR' => $MENU['SIDEBAR']
        );
        view::renderCRUDOnLayout(array('nav', 'menu', 'crud/vcreate', 'footer'), 's001', $data);
    }

    public static function READ(
            $projectfolder,
            $conn,
            $tablename,
            $rowFetch,
            $result,
            $ROUTE,
            $MENU
    ) {

        $col = array(
            '*'
        );
//process
        $pageSelection = crud::setup_pagination(method::get('pg'), $rowFetch);
        $condfind = "";
        if (method::postAll() != null) {

            foreach (method::postAll() as $value) {
                $condfind .= " AND " . $value;
            }
            $condfind = trim($condfind, " AND");
            $condfind = "AND (" . $condfind . ")";
            $pageSelection['COND'] = $condfind;
        }
        $condition = array(
            $pageSelection['COND']
        );

        $result['COLSTATUS'] = crud::colstatus($conn, $tablename);
        $result['DATA'] = crud::read($conn, $tablename, $col, $condition);
        $paginationShow = crud::count_pagination(crud::read($conn, $tablename, $col, []), $rowFetch);

        $data = array(
            'TITLE' => 'yNotification',
            'BASEURL' => $ROUTE['BASEURL'],
            'HEADERNAME' => 'yNotification',
            'CRUDROUTE' => $ROUTE['BASEURL'] . '/index.php/' . $projectfolder . '/',
            'RESULT' => $result,
            'SIDEBAR' => $MENU['SIDEBAR'],
            'ROWNUMBER' => ($pageSelection['P'] * $rowFetch) + 1,
            'PAGENUMBER' => $paginationShow,
            'STATEFIND' => $condfind,
        );
        view::renderCRUDOnLayout(array('nav', 'menu', 'crud/vread', 'footer'), 's001', $data);
    }

    public static function PREPARE_UPDATE(
            $projectfolder,
            $conn,
            $tablename,
            $result,
            $ROUTE,
            $MENU
    ) {
        if (method::postAll() != null) {
            $condfind = "";
            foreach (method::postAll() as $value) {
                $condfind .= " AND " . $value;
            }
            $condfind = trim($condfind, " AND");
            $condfind = "AND (" . $condfind . ")";
            $result['DATA'] = crud::read($conn, $tablename, ['*'], [$condfind])[0];
            $result['NAMEPOST'] = crud::colstatus($conn, $tablename);
        } else {
            redirect::page($ROUTE['BASEURL'], $projectfolder . '/read');
        }

        $data = array(
            'TITLE' => 'yNotification',
            'BASEURL' => $ROUTE['BASEURL'],
            'HEADERNAME' => 'yNotification',
            'CRUDROUTE' => $ROUTE['BASEURL'] . '/index.php/' . $projectfolder . '/',
            'RESULT' => $result,
            'SIDEBAR' => $MENU['SIDEBAR']
        );
        view::renderCRUDOnLayout(array('nav', 'menu', 'crud/vupdate', 'footer'), 's001', $data);
    }

    public static function UPDATE(
            $projectfolder,
            $conn,
            $tablename,
            $ROUTE
    ) {
        if (method::postAll() != null) {
            $setpost = array();
            $wherepost = "";
            $keyset = array();
            foreach (crud::colstatus($conn, $tablename) as $keypri) {
                if ($keypri['Key'] === 'PRI') {
                    $keyset[$keypri['Field']] = $keypri['Field'];
                }
            }
            $ii = 0;
            foreach (method::postAllOrigin() as $key => $value) {
                print_r(isset($keyset[$key]));
                echo '<br>';
                if (isset($keyset[$key]) != null) {
                    if ($keyset[$key] === $key) {
                        $wherepost .= "AND " . $key . "='" . $value . "' ";
                    } else {
                        $setpost[$ii] = $key . "='" . $value . "'";
                        $ii++;
                    }
                } else {
                    $setpost[$ii] = $key . "='" . $value . "'";
                    $ii++;
                }
            }
            $wherepost = trim($wherepost, "AND");
            crud::update($conn, $tablename, $setpost, [$wherepost]);
            redirect::page($ROUTE['BASEURL'], $projectfolder . '/read');
        } else {
            redirect::page($ROUTE['BASEURL'], $projectfolder . '/read');
        }
    }

    public static function DELETE(
            $projectfolder,
            $conn,
            $ROUTE
    ) {
        if (method::postAll() != null) {
            $condition = "";
            foreach (method::postAll() as $value) {
                $condition .= " AND " . $value;
            }
            $condition = trim($condition, " AND");
            echo crud::delete($conn, 'patient', $condition);
        }
        redirect::page($ROUTE['BASEURL'], $projectfolder . '/read');
    }

}
