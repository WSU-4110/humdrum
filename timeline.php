<!--?php
  if(isset($_POST['save'])){
		$conn = new mysqli('localhost','root','','ratingSystem');
    $uID = $conn->real_escape_string($_POST['uID']);
    $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
    $ratedIndex++;

    if(uID == 0){
      $conn->query("INSERT INTO stars (rateIndex) VALUES ('$ratedIndex')");
      $sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
      $uData = $sql->fetch_assoc();
      $uID = $uData['id'];
    }else
      $conn->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID'");
    exit (json_encode(array('id' => $uID)));
  }


?-->
<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<script src="https://kit.fontawesome.com/5704b8a73a.js" crossorigin="anonymous"></script>
<div class= "page">


		<?php

			include "db_connect.php";
		// search for keyword
		$sql = "SELECT * FROM user_posts";
		$result = $mysqli->query($sql);

		$user = array();
		$content = array();
		$spotify = array();

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {

			array_push($user, $row["User"]);
			array_push($content, $row["Content"]);
			array_push($spotify, $row["Spotify"]);
		}


		// looping thru the results backwards
		$i=sizeof($user) - 1;
		foreach($user as $value){
		echo "<div class=\"post\">
			<div class=\"postDiv\">
			<img src=\"images/ProfileTest.jpg\" alt=\"Profile Picture.\" width=\"32\" height=\"32\">
			". $user[$i] . "</b>
			</div>
			<div class=\"postDiv\">
				". $spotify[$i] . "
				</div>
			<div class=\"postDiv\">
			<div>". $content[$i] ." </div>
			Average Rating: <i class=\"far fa-star\" data-index=\"0\"></i>
      <i class=\"far fa-star\" data-index=\"1\"></i>
      <i class=\"far fa-star\" data-index=\"2\"></i>
      <i class=\"far fa-star\" data-index=\"3\"></i>
      <i class=\"far fa-star\" data-index=\"4\"></i>
			</div>
			<script
		  src=\"https://code.jquery.com/jquery-3.4.1.min.js\"
		  integrity=\"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=\"
		  crossorigin=\"anonymous\"></script>
			<script>
			var ratedIndex = -1, uID = 0;
			$(document).ready(function(){
				resetStarColors();

				if(localStorage.getItem('ratedIndex') != null){
					setStars(parseInt(localStorage.getItem('ratedIndex')));
				}

				$('.fa-star').on('click', function(){
					ratedIndex = parseInt($(this).data('index'));
					localStorage.setItem('ratedIndex', ratedIndex);
					saveToTheDB();
				});

				$('.fa-star').mouseover(function(){
					resetStarColors();
					var currentIndex = parseInt($(this).data('index'));
					setStars(currentIndex);
				});

				$('.fa-star').mouseleave(function(){
					resetStarColors();
					if(ratedIndex != -1){
						setStars(ratedIndex);
					}
				});
			});
			function saveToTheDB(){
				$.ajax({
					url:\"timeline.php\",
					method:\"POST\",
					dataType:'json',
					data:{
						save:1,
						uID: uID,
						ratedIndex: ratedIndex
					}, success: function(r){
						uID = r.id;
					}
				});
			}
			function setStars(max){
				for(var i=0; i<= max; i++){
					$('.fa-star:eq('+i+')').css('color', 'green');
				}
			}
			function resetStarColors(){
				$('.fa-star').css('color','black')
			}
		</script>


		</form>
			</div>
		";

		$i--;
		}
		}
		 else {
		echo "no results";
		}
		?>
		<br><br>
		<?php include "comment.php" ?>
		</div>

	</div>
