		<form method="post" action="" id="form">
		  <div class="form-group">
		    <label>Name </label>
		    <input type="text" name="name" class="form-control">
		  
		  </div> 


		  <div class="form-group">
		    <label>Mobile </label>
		    <input type="text" name="mobile" class="form-control">
		  
		  </div>

		  <div class="form-group">
		    <label>Email </label>
		    <input type="text" name="email" class="form-control">
		  
		  </div>

		  <div class="form-group">
		    <label>Username </label>
		    <input type="text" name="username" class="form-control">
		  
		  </div>

		  <div class="form-group">
		    <label>Expire </label>
		    <input type="text" name="expire" id="expire" class="form-control">
		  
		  </div>

		  <div class="form-group">
		    <label>Concurrent  </label>
		    <input type="text" name="concurrent" class="form-control" value="1">
		  
		  </div>


		  <div class="form-group">
		    <label>Active </label>
		    <select class="form-control" name="status">
		    	<option value="1">Active</option>
		    	<option value="0">Deactive</option>
		    </select>
		  
		  </div>

			<?
			if( basename($_SERVER['REQUEST_URI']) === 'add.php' ) {?> 
		
		  <div class="form-group">
		    <label>Password</label>
		    <input type="password"  name="password" class="form-control" placeholder="Password">
		  </div>
		 <? } ?>

		  <button type="submit" class="btn btn-primary">Save</button>
		</form>

	
		<script type="text/javascript">
			$('#expire').datepicker({
				
				 todayHighlight: true		
			})
		</script>