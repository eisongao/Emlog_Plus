<?php
/**
 * MySQLi数据库操作类
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class MySqlii {

    /**
     * 查询次数
     * @var int
     */
    private $queryCount = 0;

    /**
     * 内部数据连接对象
     * @var mysqli
     */
    private $conn;

    /**
     * 内部数据结果
     * @var mysqli_result
     */
    private $result;

    /**
     * 内部实例对象
     * @var object MySql
     */
    private static $instance = null;

    private function __construct() {
        if (!class_exists('mysqli')) {
            emMsg(langs('mysqli_not_supported'));
        }

        @$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

        if ($this->conn->connect_error) {
            switch ($this->conn->connect_errno) {
                case 1044:
                case 1045:
                    emMsg(langs('db_credential_error'));
                    break;

                case 1049:
                    emMsg(langs('db_not_found'));
                    break;

                case 2003:
                    emMsg(langs('db_port_invalid'));
                    break;

                case 2005:
                    emMsg(langs('db_unavailable'));
                    break;

                case 2006:
                    emMsg(langs('db_server_unavailable'));
                    break;

                default :
                   emMsg(langs('db_error_code') . $this->conn->connect_errno);
                    break;
            }
        }

        $this->conn->set_charset('utf8');
    }

    /**
     * 静态方法，返回数据库连接实例
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new MySqlii();
        }

        return self::$instance;
    }

    /**
     * 关闭数据库连接
     */
    function close() {
        return $this->conn->close();
    }

    /**
     * 发送查询语句
     */
    function query($sql, $ignore_err = FALSE) {
        $this->result = $this->conn->query($sql);
        $this->queryCount++;
        if (!$ignore_err && 1046 == $this->geterrno()) {
           emMsg(langs('db_error_name'));
        }
        if (!$ignore_err && !$this->result) {
            emMsg(langs('db_sql_error'). ": {$sql}<br>" . $this->geterror());
        } else {
            return $this->result;
        }
    }

    /**
     * 从结果集中取得一行作为关联数组/数字索引数组
     */
    function fetch_array(mysqli_result $query, $type = MYSQLI_ASSOC) {
        return $query->fetch_array($type);
    }

    function once_fetch_array($sql) {
        $this->result = $this->query($sql);
        return $this->fetch_array($this->result);
    }

    /**
     * 从结果集中取得一行作为数字索引数组
     */
    function fetch_row(mysqli_result $query) {
        return $query->fetch_row();
    }

    /**
     * 取得行的数目
     *
     */
    function num_rows(mysqli_result $query) {
        return $query->num_rows;
    }

    /**
     * 取得结果集中字段的数目
     */
    function num_fields(mysqli_result $query) {
        return $query->field_count;
    }

    /**
     * 取得上一步 INSERT 操作产生的 ID
     */
    function insert_id() {
        return $this->conn->insert_id;
    }

    /**
     * 获取mysql错误
     */
    function geterror() {
        return $this->conn->error;
    }

    /**
     * 获取mysql错误编码
     */
    function geterrno() {
        return $this->conn->errno;
    }

    /**
     * Get number of affected rows in previous MySQL operation
     */
    function affected_rows() {
        return $this->conn->affected_rows;
    }

    /**
     * 取得数据库版本信息
     */
    function getMysqlVersion() {
        return $this->conn->server_info;
    }

    /**
     * 取得数据库查询次数
     */
    function getQueryCount() {
        return $this->queryCount;
    }

    /**
     *  Escapes special characters
     */
    function escape_string($sql) {
        return $this->conn->real_escape_string($sql);
    }
}
