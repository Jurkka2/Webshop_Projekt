<?php

class Database
{
    /**
     * get Data of Table
     *
     * @param string $table
     * @param string|array|null $limit
     *          string = Limit
     *          array  = Offset, Limit
     * @return array
     */
    public function getTableData(string $table, string|array|null $limit = null) : array
    {
        $mysql = new mysqli('localhost', 'root', '', 'webshop');

        if(gettype($limit) === "array") {
            if(!empty($limit)) {
                if(count($limit) > 1) {
                    $stmt = $mysql->query("SELECT * FROM ".$table." LIMIT ".$limit[1]." OFFSET ".$limit[0]);
                }
            }
        } elseif(!empty($limit)) {
            $stmt = $mysql->query("SELECT * FROM ".$table." LIMIT ".$limit);
        } else {
            $stmt = $mysql->query("SELECT * FROM ".$table);
        }

        $tableData = $stmt->fetch_all();

        $mysql->close();

        return $tableData;
    }

    /**
     * get Specific Data of Table
     *
     * @param string $table
     * @param string $whereCondition
     * @param string $searchString
     * @return array
     */
    public function getTableRowData(string $table, string $whereCondition, string $searchString) : array
    {
        $mysql = new mysqli('localhost', 'root', '', 'webshop');

        $stmt = $mysql->query("SELECT * FROM ".$table." WHERE ".$whereCondition." = ".$searchString);

        $tableData = $stmt->fetch_all();

        $mysql->close();

        return $tableData;
    }

    /**
     * delete specific table Row
     *
     * @param string $table
     * @param string $whereCondition
     * @param string $searchString
     */
    public function deleteTableRow(string $table, string $whereCondition, string $searchString) : void
    {
        $mysql = new mysqli('localhost', 'root', '', 'webshop');

        $mysql->query("DELETE FROM ".$table." WHERE ".$whereCondition." = ".$searchString);

//        $mysql->close();
//        $stmt = $mysql->prepare("DELETE FROM ? WHERE ? = ?");
//        $stmt->bind_param('sss', $table, $whereCondition, $searchString);
//        $stmt->execute();

        $mysql->close();
    }



    /**
     * insert Entry into Table
     *
     * @param string $table
     * @param array $insertValues
     */
//    public function insertIntoTable(string $table, array $insertValues)
//    {
//        $mysql = new mysqli('localhost', 'root', '', 'webshop');
//
//        $stmt = $mysql->prepare("
//            INSERT INTO userdata (
//                username,
//                password
//            ) VALUES (
//                ?,
//                ?
//            )
//        ");git
//
//        $mysql->close();
//    }
}