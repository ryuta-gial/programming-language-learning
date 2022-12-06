<?php

// CSRF対策
// Token発行してSessionに格納
// フォームからもTokenを発行、送信
// Check

namespace MyApp;

class Todo {
  private $_db;

  public function __construct() {
    $this->_createToken();

    try {
      $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      //エラーメッセージ
    } catch (\PDOException $e) {
        //例外のメッセージを返します
      echo $e->getMessage();
      exit;
    }
  }

  private function _createToken() {
    if (!isset($_SESSION['token'])) {
        //疑似乱数のバイト文字列を生成する
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
  }

  public function getAll() {
    $stmt = $this->_db->query("select * from todos order by id desc");
    //PDOStatement::fetchAll — 全ての結果行を含む配列を返す
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
  }

  public function post() {
    $this->_validateToken();

    if (!isset($_POST['mode'])) {
      throw new \Exception('mode not set!');
    }

    switch ($_POST['mode']) {
      case 'update':
        return $this->_update();
      case 'create':
        return $this->_create();
      case 'delete':
        return $this->_delete();
    }
  }

  private function _validateToken() {
    if (
      !isset($_SESSION['token']) ||
      !isset($_POST['token']) ||
      $_SESSION['token'] !== $_POST['token']
    ) {
      throw new \Exception('error mm');
    }
  }

  private function _update() {
    if (!isset($_POST['id'])) {
      throw new \Exception('[アップデート] id not set!');
    }

    $this->_db->beginTransaction();

    $sql = sprintf("update todos set state = (state + 1) %% 2 where id = %d", $_POST['id']);
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();

    $sql = sprintf("select state from todos where id = %d", $_POST['id']);
    $stmt = $this->_db->query($sql);
    $state = $stmt->fetchColumn();

    $this->_db->commit();

    return  array(
      'state' => $state
    );
  }

  private function _create() {
    if (!isset($_POST['title']) || $_POST['title'] === '') {
      throw new \Exception('[クリエイト] title not set!');
    }

    $sql = "insert into todos (title) values (:title)";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute(array('title' => $_POST['title']));

    return array(
      'id' => $this->_db->lastInsertId()
    );
  }

  private function _delete() {
    if (!isset($_POST['id'])) {
      throw new \Exception('[消去] id not set!');
    }

    $sql = sprintf("delete from todos where id = %d", $_POST['id']);
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
$test = array();
    return $test;

  }
}