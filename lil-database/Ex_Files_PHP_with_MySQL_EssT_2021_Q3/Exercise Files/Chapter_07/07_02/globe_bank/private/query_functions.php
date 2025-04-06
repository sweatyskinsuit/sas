<?php

function find_all_subjects()
{
  global $db;

  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_subject_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM subjects ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}

function inser_subject($menu_name, $positiion, $visible)
{
  global $db;
  $sql = "INSERT INTO subjects ";
  $sql .= "(menu_name, position, visible) ";
  $sql .= "VALUES (";
  $sql .= "'" . $menu_name . "',";
  $sql .= "'" . $position . "',";
  $sql .= "'" . $visible . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // for INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    //INSERT failed
    echo mysqli_error($db);
    db_disconect($db);
    exit;
  }

}

function find_all_pages()
{
  global $db;

  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY subject_id ASC, position ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

?>