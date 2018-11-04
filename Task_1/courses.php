<?php
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/student.php');
  include_once('./models/course.php');

	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
?>
	<div class="card text-center mx-auto" style="width: 18rem;">
		<div class="card-body">
			<form action="./courses" >
				<input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>">
				<hr class="my-4">
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</div>


	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Courses</span>
		<button class="button float-right edit_course" id="0">Add course</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
            <th scope="col">Max</th>
	      		<th scope="col">Year</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php
				$courses = Course::all(safeGet('keywords'));
				foreach ($courses as $course) {
			?>
    		<tr>
    			<td><?=$course->id?></td>
    			<td><?=$course->name?></td>
          <td><?=$course->max_degree?></td>
          <td><?=$course->study_year?></td>
    			<td>
    				<button class="button edit_course" id="<?=$course->id?>">Edit</button>&nbsp;
    				<button class="button delete_course" id="<?=$course->id?>">Delete</button>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_course').click(function(event) {
			window.location.href = "editcourse.php?id="+$(this).attr('id');
		});

		$('.delete_course').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletecourse.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.attr('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			})
		});
	});
</script>
