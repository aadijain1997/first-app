<?php
//intialize the config file
include '../../config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../../user/assets/CSS/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="../../validation.js"></script>
</head>
<body>
<!-- navbar section -->
		<section class="header">
             <nav class="navbar  dashadminn">
                         <a class="navbar-brand col-sm-3 col-md-2  dashboard" href="../dashboard.php">DASHBOARD</a>
              </nav>
      	</section> 
<!-- side navbar -->
		  <section>
        <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-2 sidebar py-5 users">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column edit">
                        <li><a href="user-data.php"><b>EDIT USERS</b></a></li>
                        <li class="mail"><a href="../email/mail.php"><b>Send mail</b></a></li>
						<li class="mail"><a href="../profile/profiles.php"><b>Profile</b></li>
						<li class="mail"><a href="../learn-ajax/index.php"><b>Learn ajax</b></li>
						<li class="out"><a href="../../logout.php"><b>Logout</b></a></li>
                    </ul>
                </div>
            </nav>
            <div class="col-sm-10 creating">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus" style="font-size:16px"></i> <span>Add New User</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="fa fa-remove" style="font-size:16px"></i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
						
						</th>
						<th>SL NO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
						<th>Password</th>
                        <th>User Type</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($link,"SELECT * FROM users");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["password"]; ?></td>
					<td><?php echo $row["user_type"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class=" fa fa-edit material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-username="<?php echo $row["username"]; ?>"
							data-email="<?php echo $row["email"]; ?>"
							data-password="<?php echo $row["password"]; ?>"
							data-user_type="<?php echo $row["user_type"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="fa fa-remove"></i> </a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
				<div id="form-status"></div>
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i> </button>
					</div>
					<div class="modal-body">					
						<div class="form-group user-name">
							<label>NAME</label><span id="username-info"></span><br>
							<input type="text" id="username" name="username" class="form-control" required>
						</div>
						<div class="form-group user-email">
							<label>EMAIL</label><span id="email-info" class="info"></span>
							<input type="email" id="email" name="email" class="form-control " required>
						</div>
						<div class="form-group user-pass">
							<label>Password</label><span id="password-info" class="info"></span>
							<input type="password" id="password" name="password" class="form-control"  required>
						</div>
						<div class="form-group users-user-type">
							<label>User Type</label><span id="user_type-info" class="info"></span>
						
                            <select id="user_type" name="user_type" class="form-control" required>		
                            <option value=""></option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            </select>
                        </div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" onclick="checkform()" id="btn-add">Add</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i> </button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group user-name-e">
							<label>Name</label><span id="usernamee-info" class="info"></span><br>
							<input type="text" id="username_u" name="username" class="form-control" required>
						</div>
						<div class="form-group user-email-e">
							<label>Email</label><span id="emaill-info" class="info"></span>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
						<div class="form-group user-pass-e">
							<label>Password</label><span id="passwordd-info" class="info"></span>
							<input type="password" id="password_u" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>User Type</label>
                            <select id="user_type_u" name="user_type" class="form-control" required>		
                            <option value=""></option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            </select>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" onclick="checkform1()" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>
	</section>

</body>
</html>    