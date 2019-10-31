<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<div class= "page">

<?php

	include "db_connect.php";
	
	// search for keyword
	
	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);

	$user = array();
	$content = array();
	$spotify = array();
    $postid = array();

	if ($result->num_rows > 0) {
		
		// output data of each row
		
		while($row = $result->fetch_assoc()) {

			array_push($user, $row["User"]);
			array_push($content, $row["Content"]);
			array_push($spotify, $row["Spotify"]);
            array_push($postid, $row["PostID"]);
		}

		// looping thru the results backwards
		
		$i=sizeof($user) - 1;
		foreach($user as $value): ?>
		<div class="post">
		
			<div class="postDiv">
				<img src="images/ProfileTest.jpg" alt="Profile Picture." width="32" height="32">
				<b><?=$user[$i]?> </b>
			</div>
			
			<br>
			
			<div class="postDiv">
				<?=$spotify[$i]?>
			</div>
			
			<div class="postDiv">
				<?=$content[$i]?>
			</div>
			
			<br>
			
			<div class="postDiv">
				Average Rating:
				<i class="far fa-star" data-index="0"></i>
				<i class="far fa-star" data-index="1"></i>
				<i class="far fa-star" data-index="2"></i>
				<i class="far fa-star" data-index="3"></i>
				<i class="far fa-star" data-index="4"></i>
			</div>
			
			<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
			</script>
			
			<script>
				var ratedIndex = -1;
				
				$(document).ready(function(){
					if(localStorage.getItem('ratedIndex') != null)
						setStars(parseInt(localStorage.getItem('ratedIndex')));
					$('.fa-star').on('click', function(){
						ratedIndex= parseInt($(this).data('index'));
						localStorage.setItem('ratedIndex', ratedIndex);
				});
				
				$('.fa-star').mouseover(function(){
					var currentIndex = parseInt($(this).data('index'));
					setStars(currentIndex);
				});
				
				$('.fa-star').mouseleave(function(){
					resetStarColors();
					if(ratedIndex != -1)
						setStars(ratedIndex);
					});
				});
				
				function setStars(max){
					for(var i = 0; i <= ratedIndex; i++)
					$('.fa-star:eq('+i+')').css('color', 'green');
				}
				
				function resetStarColors(){
					$('.fa-star').css('color', 'black');
				}
			</script>
			
			<br>
			
			<!-- Comment -->
			
            <?php print_r ($postid[$i]) ?>
            
			<form action="add_comment.php" method="post">
				Comment:<br>
				<input type="text" name="comment">
                <input type='hidden' name='var' value='<?php echo "$postid[$i]";?>'/>
				<input type="submit" value="Submit">
			</form>
    
            <form action="view_post_request.php" method="post">
                <input type='hidden' name='var' value='<?php echo "$postid[$i]";?>'/>
				<input type="submit" value="View Post">
			</form>
			
		</div>
		
		<?php $i--;
		
		endforeach;
	}
	
	else {
		echo "no results";
	}
	?>

</div>