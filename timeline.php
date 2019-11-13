<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<script src="https://kit.fontawesome.com/5704b8a73a.js" crossorigin="anonymous"></script>
<div class= "page">

	<?php
	
	include "db_connect.php";
	
	//set session if its not already set
    if(!isset($_SESSION))
    {
	session_start();
    }
	
	// search for keyword
	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);

	// initialize arrays to store search results
	$user = array();
	$content = array();
	$spotify = array();
    $postid = array();

	// loop thru sql result to save the results in arrays
	if ($result->num_rows > 0) {
		
		// output data of each row
		// add data to arrays
		while($row = $result->fetch_assoc()) {

			array_push($user, $row["User"]);
			array_push($content, $row["Content"]);
			array_push($spotify, $row["Spotify"]);
            array_push($postid, $row["PostID"]);
		}


		// looping thru the results backwards
		
		// ========================================================================================
		// Start of for loop
		// ========================================================================================
		echo "<h2>Timeline</h2>";
		$i=sizeof($user) - 1;
		foreach($user as $value): ?>
		<div class="post">
		
			<div class="postDiv">
				<img src="images/ProfileTest.jpg" alt="Profile Picture." width="32" height="32">
				<b><?=$user[$i]?> </b>
			</div>
			
			<br>
			
			<div class="postDiv">
				
				<!-- this prints the spotify embed -->
				<iframe src="https://open.spotify.com/embed/artist/<?php echo $spotify[$i];?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe> 
			</div>

			
			<div class="postDiv">
				<?=$content[$i]?>

			<script   src=\"https://code.jquery.com/jquery-3.4.1.min.js\"   integrity=\"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=\"   crossorigin=\"anonymous\"></script>
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


		</form>

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
			
			<!-- Star System -->
			<script   src=\"https://code.jquery.com/jquery-3.4.1.min.js\"   integrity=\"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=\"   crossorigin=\"anonymous\"></script>
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
			<?php 
			// this is the tentative comment section
			
			/*$postid = $_SESSION['postID'];
			$sql = "SELECT * FROM comments WHERE PostID = " . $postid . "";
		$result = $mysqli->query($sql);
    //$row = $result->fetch_assoc();

		while($row = $result->fetch_assoc()) {

		echo( $row["Username"] . " commented: ". $row["Content"] . "<br>");}*/
			?>
			
		</div>
		
		<?php 
		// =============================================================
		// end of the for loop
		// =============================================================
		$i--;
		
		endforeach;
	}
	
	else {
		echo "no results";
	}
	?>

</div>

