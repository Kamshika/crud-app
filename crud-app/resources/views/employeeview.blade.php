<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Employee add</title>
</head>

<body>
  <h5 style="margin-left: 50px; margin-top: 50px;">Employee View</h5>
  <div class="content">
    <form style="margin-left: 50px; margin-top: 50px;" method="get" action="/employee-view/{id}">
    {{csrf_field()}}
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="first_name">First Name</label>
          <input readonly type="name" class="form-control" id="first_name" placeholder="First Name" value="{{$employee->first_name}}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="last_name">Last Name</label>
          <input readonly readonly type="name" class="form-control" id="last_name" placeholder="First Name" value="{{$employee->last_name}}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="salary">Salary</label>
          <input readonly type="date" class="form-control" id="salary" placeholder="Salary" value="{{$employee->salary}}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" value="{{$employee->title}}" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="hire_date">Hire Date</label>
          <input readonly type="date" class="form-control" id="hire_date" value="{{$employee->hire_date}}">
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="birth_date">Birth Date</label>
        <input readonly type="date" class="form-control" id="birth_date" value="{{$employee->birth_date}}">
      </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="gender">Gender</label>
          <input readonly type="text" class="form-control" id="gender" value="{{$employee->gender}}">
        </div>
      </div>
    </form>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>