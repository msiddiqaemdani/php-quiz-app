<?php
// admin_action.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}
include 'config.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == 'add') {
    // Add a new question
    $question = $conn->real_escape_string($_POST['question']);
    $option1 = $conn->real_escape_string($_POST['option1']);
    $option2 = $conn->real_escape_string($_POST['option2']);
    $option3 = $conn->real_escape_string($_POST['option3']);
    $option4 = $conn->real_escape_string($_POST['option4']);
    $answer  = (int) $_POST['answer'];
    $sql = "INSERT INTO questions (question, option1, option2, option3, option4, answer) 
            VALUES ('$question', '$option1', '$option2', '$option3', '$option4', $answer)";
    if ($conn->query($sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Question added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error adding question']);
    }
    exit;
}
if ($action == 'edit') {
    // Update an existing question
    $id = (int) $_POST['id'];
    $question = $conn->real_escape_string($_POST['question']);
    $option1 = $conn->real_escape_string($_POST['option1']);
    $option2 = $conn->real_escape_string($_POST['option2']);
    $option3 = $conn->real_escape_string($_POST['option3']);
    $option4 = $conn->real_escape_string($_POST['option4']);
    $answer  = (int) $_POST['answer'];
    $sql = "UPDATE questions 
            SET question='$question', option1='$option1', option2='$option2', option3='$option3', option4='$option4', answer=$answer 
            WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Question updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating question']);
    }
    exit;
}
if ($action == 'delete') {
    // Delete a question
    $id = (int) $_POST['id'];
    $sql = "DELETE FROM questions WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Question deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting question']);
    }
    exit;
}
?>
