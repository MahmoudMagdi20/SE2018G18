<?php
  include_once('./models/grade.php');
  include_once('./models/course.php');
  include_once('./models/student.php');
  include_once('./controllers/common.php');
  include_once('./components/head.php');
  Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
?>
<div class="./grades" style="width: 18rem; ">
  <div class="card-body">
    <form action="<?php echo $url ;?>" >
      <input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>">
      <hr class="my-4">
      <div class="radio">
        <label><input type="radio" name="searchopt" checked value="name"><label for="">search by name</label></label>
      </div>
      <div class="radio">
        <label><input type="radio" name="searchopt" value="course"><label for="">search by course</label></label>
      </div>
      <hr class="my-4">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" >Search</button>
    </form>
  </div>
</div>


<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
  <span style="font-size: 125%;">Grades</span>
  <button class="button float-right edit_grade" id="0">Add grade</button>
</div>


<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Student</th>
        <th scope="col">Course</th>
        <th scope="col">Degree</th>
        <th scope="col">Maximum Degree</th>
        <th scope="col">Date</th>
        <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php
    $grades = Grade::all(safeGet('keywords'),safeGet('searchopt'));
    foreach ($grades as $grade) {
      $course = new Course($grade->course_id);
      $student = new Student($grade->student_id);
    ?>
    <tr>
      <td><?=$grade->id?></td>
      <td><?=$student->name?></td>
      <td><?=$course->name?></td>
      <td><?=$grade->degree?></td>
      <td><?=$course->max_degree?></td>
      <td><?=$grade->examine_at?></td>

      <td>
        <button class="button edit_grade" id="<?=$grade->id?>">Edit</button>&nbsp;
        <button class="button delete_grade" id="<?=$grade->id?>">Delete</button>
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('.edit_grade').click(function(event) {
			window.location.href = "editgrade.php?id="+$(this).attr('id');
		});

    $('.delete_grade').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletegrade.php',
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
