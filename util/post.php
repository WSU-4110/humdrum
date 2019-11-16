<div class="post">
		
			<div class="postDiv">
				<?php
				include 'profile_pic.php';
				?>
				<b><?=$user[$i]?> </b>
			</div>
			
			<br>
			
			<div class="postDiv">
				<?php //$spotify[$i]?>
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
			
           <?php// print_r ($postid[$i]) ?>
    
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
			//$postid = $_SESSION['postID'];
			//$sql = "SELECT * FROM comments WHERE PostID = " . $postid . "";
			//$result = $mysqli->query($sql);
			//$row = $result->fetch_assoc();

			//while($row = $result->fetch_assoc()) {

			//echo( $row["Username"] . " commented: ". $row["Content"] . "<br>");}
			?>
			
		</div>