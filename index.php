<?php
include 'config.php';
// Select 10 random questions from the questions table
$sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
$result = $conn->query($sql);
$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        $questions[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Quiz - General Knowledge</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    body {
      background: linear-gradient(135deg, #4F5B93, #6D83B2);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      position: relative;
    }
    .admin-button {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    .admin-button a {
      color: #fff;
      background: rgba(0,0,0,0.2);
      padding: 8px 12px;
      border-radius: 5px;
      text-decoration: none;
    }
    .main-container {
      height: 92%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    .wizard-container, #startScreen {
      width: 100%;
      max-width: 800px;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      position: relative;
    }
    .wizard-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .wizard-header h2 {
      font-weight: bold;
      color: #4F5B93;
      margin-bottom: 10px;
    }
    .wizard-step {
      display: none;
    }
    .wizard-step.active {
      display: block;
    }
    .question-title {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }
    .wizard-nav {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
    }
    .btn-custom {
      min-width: 100px;
    }
    .progress {
      height: 20px;
      margin-bottom: 20px;
    }
    .progress-bar {
      background-color: #4F5B93;
    }
    /* Timer style */
    #timer {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 1.2rem;
      font-weight: bold;
      color: #4F5B93;
    }
    /* Start screen */
    #startScreen h2 {
      color: #4F5B93;
      margin-bottom: 20px;
    }
    #startScreen button {
      min-width: 150px;
    }
    footer {
        height: 8%;;
      text-align: center;
      padding: 10px;
      background: #4F5B93;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="admin-button">
    <a href="admin_login.php"><i class="fas fa-user-shield"></i> Admin Login</a>
  </div>
  <div class="main-container">
    <!-- Start Screen -->
    <div id="startScreen">
      <h2>Welcome to the PHP Quiz</h2>
      <p>Test your PHP knowledge with 10 random questions. You have 10 minutes to complete the quiz. Good luck!</p>
      <button id="startQuiz" class="btn btn-primary"><i class="fas fa-play"></i> Start Quiz</button>
    </div>
    <!-- Quiz Container (hidden initially) -->
    <div id="quizContainer" class="wizard-container" style="display: none;">
      <div id="timer">10:00</div>
      <div class="wizard-header">
        <h2>
          PHP Quiz 
          <img src="https://www.php.net/images/logos/php-logo.svg" alt="PHP Logo" style="width:50px; vertical-align:middle; margin-left:10px;">
          <i class="fas fa-code"></i>
        </h2>
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 10%;" id="progressBar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <form id="quizForm">
        <?php foreach($questions as $index => $question): ?>
          <div class="wizard-step <?php echo $index == 0 ? 'active' : ''; ?>" data-step="<?php echo $index; ?>">
            <div class="question-title">
              <h5><?php echo ($index + 1) . ". " . $question['question']; ?> <i class="fas fa-question-circle"></i></h5>
            </div>
            <?php 
              $options = [
                $question['option1'], 
                $question['option2'], 
                $question['option3'], 
                $question['option4']
              ];
              foreach($options as $opt_index => $option): 
            ?>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="answer[<?php echo $question['id']; ?>]" 
                       id="q<?php echo $question['id']; ?>_option<?php echo $opt_index; ?>" 
                       value="<?php echo $opt_index + 1; ?>">
                <label class="form-check-label" for="q<?php echo $question['id']; ?>_option<?php echo $opt_index; ?>">
                  <?php echo $option; ?>
                </label>
              </div>
            <?php endforeach; ?>
            <div class="wizard-nav">
              <?php if($index > 0): ?>
                <button type="button" class="btn btn-secondary btn-custom prevBtn"><i class="fas fa-arrow-left"></i> Previous</button>
              <?php else: ?>
                <div></div>
              <?php endif; ?>
              <?php if($index < count($questions) - 1): ?>
                <button type="button" class="btn btn-primary btn-custom nextBtn">Next <i class="fas fa-arrow-right"></i></button>
              <?php else: ?>
                <button type="button" class="btn btn-success btn-custom submitBtn"><i class="fas fa-check"></i> Submit</button>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </form>
    </div>
  </div>
  <footer>
    <p>Designed and Developed by M. Siddiq Aemdani &copy; <?php echo date("Y"); ?></p>
  </footer>
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <script>
  $(document).ready(function(){
    var currentStep = 0;
    var totalSteps = $('.wizard-step').length;
    var timerInterval;
    var timeRemaining = 600; // 10 minutes in seconds

    function updateProgressBar() {
      var percent = ((currentStep + 1) / totalSteps) * 100;
      $('#progressBar').css('width', percent + '%').attr('aria-valuenow', percent);
    }

    function startTimer() {
      updateTimerDisplay();
      timerInterval = setInterval(function(){
        timeRemaining--;
        updateTimerDisplay();
        if(timeRemaining <= 0) {
          clearInterval(timerInterval);
          autoSubmitQuiz();
        }
      }, 1000);
    }

    function updateTimerDisplay() {
      var minutes = Math.floor(timeRemaining / 60);
      var seconds = timeRemaining % 60;
      $('#timer').text((minutes < 10 ? '0' + minutes : minutes) + ":" + (seconds < 10 ? '0' + seconds : seconds));
    }

    function autoSubmitQuiz() {
      Swal.fire({
        title: 'Time\'s up!',
        text: 'Your time has expired. The quiz will be submitted automatically.',
        icon: 'warning',
        confirmButtonText: 'OK'
      }).then(function(){
        submitQuiz();
      });
    }

    function submitQuiz() {
      $.ajax({
        url: 'process.php',
        type: 'POST',
        data: $('#quizForm').serialize(),
        dataType: 'json',
        success: function(response){
          if(response.status === 'success'){
            Swal.fire({
              title: 'Quiz Completed!',
              html: '<p>Your Score: <strong>' + response.score + '</strong></p>' +
                    '<p>Total Questions: ' + response.total + '</p>',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(function(){
              window.location.href = "index.php";
            });
          } else {
            Swal.fire({
              title: 'Error!',
              text: response.message,
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        },
        error: function(){
          Swal.fire({
            title: 'Error!',
            text: 'There was an error processing your quiz.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    }

    $('.nextBtn').click(function(){
      if(currentStep < totalSteps - 1){
        $('.wizard-step').eq(currentStep).removeClass('active');
        currentStep++;
        $('.wizard-step').eq(currentStep).addClass('active');
        updateProgressBar();
      }
    });

    $('.prevBtn').click(function(){
      if(currentStep > 0){
        $('.wizard-step').eq(currentStep).removeClass('active');
        currentStep--;
        $('.wizard-step').eq(currentStep).addClass('active');
        updateProgressBar();
      }
    });

    $('.submitBtn').click(function(){
      clearInterval(timerInterval);
      submitQuiz();
    });

    $('#startQuiz').click(function(){
      $('#startScreen').hide();
      $('#quizContainer').show();
      startTimer();
    });
  });
  </script>
</body>
</html>
