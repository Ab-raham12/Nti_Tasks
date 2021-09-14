<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require 'connection.php';
}
//add task
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
	//delete task
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
			//show task
if (isset($_POST['show'])) {
echo "<form method='POST'> 
		Enter task name <input type='text' name = 'showed'>
		<button name='sh'>show </button>
	</form>
	" ;
}
			if(isset($_POST['sh'])){
				$showone =  $_POST['showed'];
				$sql = " SELECT * FROM dairy WHERE title = '$showone'";
				$result = mysqli_query($conn,$sql);
				if ($result) {
					$data = mysqli_fetch_assoc($result);
					echo "*" . $data['title'] . '<br>';
					echo "*" . $data['task'] . '<br>';
					echo "*" . $data['start_date'] . '<br>';
					echo "*" . $data['end_date'] . '<br>';
				}
			}
?>