<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'header.php'; ?>
  </head>
  <body>
    <h1>Submit a form</h1>

	<div id="my_form" class="bs-example" style="width:600px;">
		<form class="form-horizontal" role="form" action="result.php" method="POST">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
			  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <div class="checkbox">
				<label>
				  <input type="checkbox" name="remme"/> Remember me
				</label>
			  </div>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
	</div>

  </body>
</html>
