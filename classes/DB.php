<?php


namespace classes;
include_once 'Routing.php';
include_once 'Authentication.php';

use PDO;
use PDOException;
use classes\Authentication;

class DB {

    private $conn = null;
    private const SQL_GET_USER_BY_USERNAME = 'SELECT * FROM users WHERE userName = :userName';
    private const SQL_GET_USER_BY_EMAIL = 'SELECT * FROM users WHERE email = :email';
    private const SQL_INSERT_USER = 'INSERT INTO users ( userName, email, password, created_at) VALUES ( :userName, :email, :password, :created_at)';
    private const SQL_UPDATE_CONTENT_ACTIVITY = 'UPDATE activities SET content = :content WHERE id = :actID  AND user_id = :userid';
    private const SQL_UPDATE_POSITION_ACTIVITY = 'UPDATE activities SET x_position = :xPos, y_position = :yPos WHERE id = :ActID  AND user_id = :userid';
    private const SQL_UPDATE_COLOR_ACTIVITY = 'UPDATE activities SET color = :color WHERE id = :actID  AND user_id = :userid';
    private const SQL_RESET_ACTIVITY = 'UPDATE activities SET is_trashed = 0 WHERE id = :actID  AND user_id = :userid';
    private const SQL_TRASH_ACTIVITY = 'UPDATE activities SET is_trashed = 1 WHERE id = :actID  AND user_id = :userid';
    private const SQL_GET_TRASHED_ACTIVITIES = 'SELECT * FROM activities WHERE user_id = :userID AND is_trashed = 1 AND created_at = :createdAt';
    private const SQL_SETUP_ACTIVITIES = 'SELECT * FROM activities WHERE user_id = :userID AND created_at = :createdAt AND is_trashed = 0';
    private const SQL_INSERT_ACTIVITY = 'INSERT INTO activities (user_id, x_position, y_position, color, content, created_at, is_trashed) VALUES (:userID, :xPos, :yPos, :color, :content, :created_at, :trashed)';
    private const SQL_REMOVE_ACTIVITY = 'DELETE FROM activities WHERE id = :actID  AND user_id = :userid';

    private const SQL_DELETE_USERS = 'DELETE FROM users';
    private const SQL_DELETE_ACTIVITIES = 'DELETE FROM activities';
    private const SQL_ALTER_TABLE_USERS = 'ALTER TABLE users AUTO_INCREMENT = 1';
    private const SQL_ALTER_TABLE_ACTIVITIES = 'ALTER TABLE activities AUTO_INCREMENT = 1';

    /**
     * DB constructor.
     */
    public function __construct() {

        try {

            $this->conn = new PDO('mysql:host=localhost;dbname=2do_projekt', "root", "");
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die('Something wrong with DB');
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function alive() {
        // Inactive more than 5 min.
        if ( isset($_SESSION['time']) && (time() - $_SESSION['time'] > 300) ) {
            Authentication::clear_session();
            Routing::redirect('login');
            die();
        }

        $_SESSION['time'] = time();

    }

    /**
     * @return PDO|null
     */
    public function getConn(): ?PDO {
        return $this->conn;
    }

    public function is_connected($path) {
        if ( empty($this->conn) ) {
            Routing::redirect($path, Error::ERR_DB_ISSUE);
        }
    }

    public function start_session() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get_user_by_username($userName) {
        $statement = $this->conn->prepare(self::SQL_GET_USER_BY_USERNAME);
        $statement->execute(['userName' => $userName]);

        return $statement->fetch();
    }

    public function insert_user($userName, $email, $password) {
        $date = date('Y-m-d H:i:s');
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

        $statement = $this->conn->prepare(self::SQL_INSERT_USER);
        return  $statement->execute(['userName' => $userName, 'email' => $email, 'password' => $hashedPassword, 'created_at' => $date]);
    }

    public function get_user_by_email($email) {
        $statement = $this->conn->prepare(self::SQL_GET_USER_BY_EMAIL);
        $statement->execute(['email' => $email]);
        return $statement->fetch();
    }

    public function insert_activity($date) {
        $statement = $this->conn->prepare(self::SQL_INSERT_ACTIVITY);
        $newDate = date("Y-m-d", strtotime($date));
        return $statement->execute(['userID' => Authentication::get_current_user_id(),
            'xPos' => 100,
            'yPos' => 100,
            'color' => '#bec32f',
            'content' => 'New note',
            'created_at' => $newDate,
            'trashed' => 0]);
    }

    public function update_position_activity($xPos, $yPos, $id): void {
        $statement = $this->conn->prepare(self::SQL_UPDATE_POSITION_ACTIVITY);
        $statement->execute(['xPos' => $xPos, 'yPos' => $yPos, 'ActID' => $id, 'userid' => Authentication::get_current_user_id()]);
    }

    public function update_content_activity($content, $id): void {
        $statement = $this->conn->prepare(self::SQL_UPDATE_CONTENT_ACTIVITY);
        $statement->execute(['actID' => $id, 'content' => $content, 'userid' => Authentication::get_current_user_id()]);
    }

    public function update_color_activity($color, $id): void {
        $statement = $this->conn->prepare(self::SQL_UPDATE_COLOR_ACTIVITY);
        $statement->execute(['color' => $color, 'actID' => $id, 'userid' => Authentication::get_current_user_id()]);
    }

    public function remove_activity($id): void {
        $statement = $this->conn->prepare(self::SQL_REMOVE_ACTIVITY);
        $statement->execute(['actID' => $id, 'userid' => Authentication::get_current_user_id()]);
    }

    public function reset_activity($id): void {
        $statement = $this->conn->prepare(self::SQL_RESET_ACTIVITY);
        $statement->execute(['actID' => $id, 'userid' => Authentication::get_current_user_id()]);
    }

    public function trash_activity($id): void {
        $statement = $this->conn->prepare(self::SQL_TRASH_ACTIVITY);
        $statement->execute(['actID' => $id, 'userid' => Authentication::get_current_user_id()]);
    }

    public function get_trashed_activities($date) {
        $newDate = date("Y-m-d", strtotime($date));
        $statement = $this->conn->prepare(self::SQL_GET_TRASHED_ACTIVITIES);
        $statement->execute(['userID' => Authentication::get_current_user_id(), 'createdAt' => $newDate]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function setup_activities($date) {
        $newDate = date("Y-m-d", strtotime($date));
        $statement = $this->conn->prepare(self::SQL_SETUP_ACTIVITIES);
        $statement->execute(['userID' => Authentication::get_current_user_id(), 'createdAt' => $newDate]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_users() {
        $statement = $this->conn->prepare(self::SQL_DELETE_USERS);
        $statement->execute();
    }

    public function delete_activities() {
        $statement = $this->conn->prepare(self::SQL_DELETE_ACTIVITIES);
        $statement->execute();
    }

    public function alter_users() {
        $statement = $this->conn->prepare(self::SQL_ALTER_TABLE_USERS);
        $statement->execute();
    }

    public function alter_activities() {
        $statement = $this->conn->prepare(self::SQL_ALTER_TABLE_ACTIVITIES);
        $statement->execute();
    }

}