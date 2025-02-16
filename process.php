<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['answer']) && is_array($_POST['answer'])) {
        $userAnswers = $_POST['answer']; // Array: question_id => selected_option
        $score = 0;
        $total = 0;

        // Loop through each submitted answer
        foreach ($userAnswers as $question_id => $selected_option) {
            // Sanitize input values
            $question_id    = (int)$question_id;
            $selected_option = (int)$selected_option;
            
            // Prepare statement to get the correct answer
            $stmt = $conn->prepare("SELECT answer FROM questions WHERE id = ?");
            $stmt->bind_param("i", $question_id);
            $stmt->execute();
            $stmt->bind_result($correct_answer);
            if ($stmt->fetch()) {
                $total++;
                if ($selected_option === (int)$correct_answer) {
                    $score++;
                }
            }
            $stmt->close();
        }
        
        // Return result as JSON
        echo json_encode([
            'status' => 'success',
            'score'  => $score,
            'total'  => $total
        ]);
        exit;
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'No answers received.'
        ]);
        exit;
    }
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid request method.'
    ]);
    exit;
}
?>
