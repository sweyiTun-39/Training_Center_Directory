<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>

	<div style="margin-top: 50px;">
		<form action="{{route('file.store')}}" method="post">
			@csrf
			<label> File : </label>
			<input type="file" name="filename">
			<button type="submit">Add</button>
		</form>
		<!-- <div class="input-group control-group increment" > -->
			
			<!-- <div class="input-group-btn"> 
				
			</div> -->
		<!-- </div> -->
	<!-- <div class="clone hide">
	  <div class="control-group input-group" style="margin-top:10px">
	    <input type="file" name="filename[]" class="form-control">
	    <div class="input-group-btn"> 
	      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
	    </div>
	  </div>
	</div> -->
	</div>

</body>
</html>