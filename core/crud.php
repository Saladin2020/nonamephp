<?php

class crud {

    public static function create($conn, $tbl, $data) {
        $sql = "SHOW COLUMNS FROM " . $tbl;
        $result = $conn->query($sql, 'NAME');
        if (count($result) == count($data)) {
            $field = "";
            $value = "";
            foreach ($result as $dat) {
                $field .= ", " . $dat['Field'];
                if (isset($data[$dat['Field']])) {
                    $value .= ", '" . $data[$dat['Field']] . "'";
                } else {
                    return "key <>";
                }
            }
            $field = trim($field, ",");
            $value = trim($value, ",");
            $sqlInsert = "INSERT INTO " . $tbl . " (" . $field . ") VALUES (" . $value . ")";
            if ($conn->execQuery($sqlInsert)) {
                return "Complete";
            } else {
                return "Fail";
            }
        } else {
            return "key length <>";
        }
    }

    public static function read($conn, $tbl, $colname = "*", $conditon = []) {
        $col = "";
        $cond = "";
        foreach ($colname as $dat) {
            $col .= ", " . $dat;
        }
        $col = trim($col, ",");
        foreach ($conditon as $dat) {
            $cond .= " " . $dat;
        }
        $sql = "SELECT " . $col
                . " FROM " . $tbl
                . " WHERE 1"
                . $cond;
        //echo $sql;
        return $conn->query($sql, 'NAME');
    }

    public static function update($conn, $tbl, $colname, $conditon) {
        $col = "";
        $cond = "";
        foreach ($colname as $dat) {
            $col .= ", " . $dat;
        }
        $col = trim($col, ",");
        foreach ($conditon as $dat) {
            $cond .= " " . $dat;
        }
        $sqlUpdate = "UPDATE " . $tbl . ""
                . " SET " . $col . ""
                . " WHERE "
                . $cond;
        //echo $sqlUpdate;
        if ($conn->execQuery($sqlUpdate)) {
            return "Complete";
        } else {
            return "Fail";
        }
    }

    public static function delete($conn, $tbl, $condition) {
        $sqlDelete = "DELETE FROM " . $tbl . " WHERE " . $condition;
        echo $sqlDelete;
        if ($conn->execQuery($sqlDelete)) {
            return "Complete";
        } else {
            return "Fail";
        }
    }

    public static function colstatus($conn, $tbl) {
        $sql = "SHOW COLUMNS FROM " . $tbl;
        return $conn->query($sql, 'NAME');
    }

    public static function setup_pagination($pageSelection, $rowFetch) {
        if ($pageSelection == '') {
            $pageSelection = 0;
        } else {
            if (!is_numeric($pageSelection)) {
                $pageSelection = 0;
            }
        }
        $rowStart = ($rowFetch * $pageSelection);
        $d['P'] = $pageSelection;
        $d['COND'] = 'LIMIT ' . $rowStart . ', ' . $rowFetch;
        return $d;
    }

    public static function count_pagination($rowData, $rowFetch) {
        $rowAll = count($rowData);
        return ceil($rowAll / $rowFetch);
    }

}
