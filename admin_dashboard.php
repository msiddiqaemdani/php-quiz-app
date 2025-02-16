<?php
// admin_dashboard.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}
include 'config.php';

// Retrieve all questions from the database ordered by id DESC
$sql = "SELECT * FROM questions ORDER BY id DESC";
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
  <title>Admin Panel - Manage PHP Quiz Questions</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
  <style>
    body {
      background: #E0E5EC;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background: #4F5B93;
    }
    .navbar-brand, .navbar-nav .nav-link {
      color: #fff !important;
    }
    .container {
      margin-top: 30px;
      margin-bottom: 80px;
    }
    table.dataTable thead {
      background: #4F5B93;
      color: #fff;
    }
    .btn-custom {
      min-width: 100px;
    }
    footer {
      text-align: center;
      padding: 10px;
      background: #4F5B93;
      color: #fff;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  
  <div class="container">
    <div class="mb-3">
      <h3>Manage PHP Quiz Questions</h3>
      <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add New Question</button>
    </div>
    
    <table id="questionDataTable" class="table table-bordered">
      <thead>
        <tr>
          <th>Sr</th>
          <th>Question</th>
          <th>Options</th>
          <th>Answer</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="questionTable">
        <?php foreach($questions as $question): ?>
          <tr id="row_<?php echo $question['id']; ?>">
            <td><?php echo $question['id']; ?></td>
            <td><?php echo htmlspecialchars($question['question']); ?></td>
            <td>
              <ul>
                <li>1. <?php echo htmlspecialchars($question['option1']); ?></li>
                <li>2. <?php echo htmlspecialchars($question['option2']); ?></li>
                <li>3. <?php echo htmlspecialchars($question['option3']); ?></li>
                <li>4. <?php echo htmlspecialchars($question['option4']); ?></li>
              </ul>
            </td>
            <td><?php echo $question['answer']; ?></td>
            <td>
              <button class="btn btn-primary btn-sm editBtn" 
                      data-id="<?php echo $question['id']; ?>" 
                      data-question="<?php echo htmlspecialchars($question['question']); ?>" 
                      data-option1="<?php echo htmlspecialchars($question['option1']); ?>" 
                      data-option2="<?php echo htmlspecialchars($question['option2']); ?>" 
                      data-option3="<?php echo htmlspecialchars($question['option3']); ?>" 
                      data-option4="<?php echo htmlspecialchars($question['option4']); ?>" 
                      data-answer="<?php echo $question['answer']; ?>">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="btn btn-danger btn-sm deleteBtn" data-id="<?php echo $question['id']; ?>">
                <i class="fas fa-trash"></i> Delete
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  
  <!-- Add Question Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="addQuestionForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
            <div class="form-group">
              <label for="question">Question</label>
              <input type="text" class="form-control" name="question" id="question" required>
            </div>
            <div class="form-group">
              <label for="option1">Option 1</label>
              <input type="text" class="form-control" name="option1" id="option1" required>
            </div>
            <div class="form-group">
              <label for="option2">Option 2</label>
              <input type="text" class="form-control" name="option2" id="option2" required>
            </div>
            <div class="form-group">
              <label for="option3">Option 3</label>
              <input type="text" class="form-control" name="option3" id="option3" required>
            </div>
            <div class="form-group">
              <label for="option4">Option 4</label>
              <input type="text" class="form-control" name="option4" id="option4" required>
            </div>
            <div class="form-group">
              <label for="answer">Correct Answer (1-4)</label>
              <input type="number" class="form-control" name="answer" id="answer" min="1" max="4" required>
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add Question</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
      </form>
    </div>
  </div>
  
  <!-- Edit Question Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="editQuestionForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">
            <div class="form-group">
              <label for="edit_question">Question</label>
              <input type="text" class="form-control" name="question" id="edit_question" required>
            </div>
            <div class="form-group">
              <label for="edit_option1">Option 1</label>
              <input type="text" class="form-control" name="option1" id="edit_option1" required>
            </div>
            <div class="form-group">
              <label for="edit_option2">Option 2</label>
              <input type="text" class="form-control" name="option2" id="edit_option2" required>
            </div>
            <div class="form-group">
              <label for="edit_option3">Option 3</label>
              <input type="text" class="form-control" name="option3" id="edit_option3" required>
            </div>
            <div class="form-group">
              <label for="edit_option4">Option 4</label>
              <input type="text" class="form-control" name="option4" id="edit_option4" required>
            </div>
            <div class="form-group">
              <label for="edit_answer">Correct Answer (1-4)</label>
              <input type="number" class="form-control" name="answer" id="edit_answer" min="1" max="4" required>
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Question</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
      </form>
    </div>
  </div>
  
  <!-- jQuery, Bootstrap, DataTables, SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <script>
  $(document).ready(function(){
    // Initialize DataTable for questions
    $('#questionDataTable').DataTable();

    // Use delegated events for dynamically loaded elements
    $(document).on('click', '.editBtn', function(){
      var id = $(this).data('id');
      var question = $(this).data('question');
      var option1 = $(this).data('option1');
      var option2 = $(this).data('option2');
      var option3 = $(this).data('option3');
      var option4 = $(this).data('option4');
      var answer = $(this).data('answer');
      
      $('#edit_id').val(id);
      $('#edit_question').val(question);
      $('#edit_option1').val(option1);
      $('#edit_option2').val(option2);
      $('#edit_option3').val(option3);
      $('#edit_option4').val(option4);
      $('#edit_answer').val(answer);
      
      $('#editModal').modal('show');
    });
    
    $(document).on('submit', '#editQuestionForm', function(e){
      e.preventDefault();
      var formData = $(this).serialize() + '&action=edit';
      $.ajax({
        url: 'admin_action.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response){
          if(response.status == 'success'){
            Swal.fire('Success', response.message, 'success').then(function(){
              location.reload();
            });
          } else {
            Swal.fire('Error', response.message, 'error');
          }
        }
      });
    });
    
    $(document).on('click', '.deleteBtn', function(){
      var id = $(this).data('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: 'admin_action.php',
            type: 'POST',
            data: {action: 'delete', id: id},
            dataType: 'json',
            success: function(response){
              if(response.status == 'success'){
                Swal.fire('Deleted!', response.message, 'success').then(function(){
                  location.reload();
                });
              } else {
                Swal.fire('Error', response.message, 'error');
              }
            }
          });
        }
      });
    });
    
    // Add Question Form Submission
    $('#addQuestionForm').on('submit', function(e){
      e.preventDefault();
      var formData = $(this).serialize() + '&action=add';
      $.ajax({
        url: 'admin_action.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response){
          if(response.status == 'success'){
            Swal.fire('Success', response.message, 'success').then(function(){
              location.reload();
            });
          } else {
            Swal.fire('Error', response.message, 'error');
          }
        }
      });
    });
    
  });
  </script>
  
  <footer>
    <p>Designed and Developed by M. Siddiq Aemdani &copy; <?php echo date("Y"); ?></p>
  </footer>
</body>
</html>
