<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require 'connection.php';
}
if (isset($_POST['add'])) {
	$title = htmlspecialchars($_POST['title']);
	$desc = htmlspecialchars($_POST['desc']);
	$start = htmlspecialchars($_POST['sdate']);
	$end = htmlspecialchars($_POST['edate']);
	$id = $_POST['id'];
	$sql = "INSERT INTO dairy (id, title, task, start_date, end_date) VALUES($id,'$title','$desc','$start','$end')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
			echo " ADD Compeleted";
		}else{
			echo "erorr : please try again";
		}
}
if (isset($_POST['del'])) {
echo "<form method='POST'> 
		Enter task name <input type='text' name = 'deleted'>
		<button name='dele'>Remove </button>
	</form>
	" ;
}
			if(isset($_POST['dele'])){
				$delone =  $_POST['deleted'];
				$sql = "DELETE  FROM dairy WHERE title='$delone' ";
	$result = mysqli_query($conn,$sql);
	if ($result) {
			echo " DELETE Compeleted";
		}else{
			echo "erorr : please try again";
		}
			}
?>