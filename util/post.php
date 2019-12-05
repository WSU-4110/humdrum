<div class="post">

			<a href="profile.php?user=<?=$user[$i]?>">
			<div class="pic_padd">
				<?php
				$pic = "profile_pics/". $user[$i] . ".jpeg";
				?>
				<img src=<?=$pic?> alt=" " width="48" height="48">
				<b><?=$user[$i]?> </b>
			</div>
			</a>

			<br>

			<div class="postDiv">

				<iframe src="https://open.spotify.com/embed/<?php echo $musicType[$i];?>/<?php echo $spotify[$i];?>" width="300" height="280" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
			</div>


			<div class="postDiv">
				<?=$content[$i]?>
				<?php
				if (isset($tag[$i]))
					echo $tag[$i];
				?>
				<br>
				<button onclick="alert('You liked the post!')"><i class="fas fa-thumbs-up"></i></button>

			<script   src=\"https://code.jquery.com/jquery-3.4.1.min.js\"   integrity=\"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=\"   crossorigin=\"anonymous\"></script>


		</form>

			</div>

			<br>

			<div class="postDiv">
				User Rating: <?=$rating[$i]?>/5

			</div>

			<!-- Star System -->
			<script   src=\"https://code.jquery.com/jquery-3.4.1.min.js\"   integrity=\"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=\"   crossorigin=\"anonymous\"></script>


			<br>

			<!-- Comment -->

           <?php// print_r ($postid[$i]) ?>

			<form action="util/add_comment.php" method="post">
			<?php
			//$postid = $_SESSION['postID'];
			$sql = "SELECT * FROM comments WHERE PostID = " . $postid[$i]. "";
			$result = $mysqli->query($sql);
			//$row = $result->fetch_assoc();

			while($row = $result->fetch_assoc()) {

			echo $row["Username"] . " commented: ". $row["Content"] . "<br>";}
			?>
				Comment:<br>
				<input type="text" name="comment">
                <input type='hidden' name='var' value='<?php echo "$postid[$i]";?>'/>
				<input type="submit" value="Submit" onclick="alert('You commented on their post!')">
			</form>

            <form action="util/view_post_request.php" method="post">
                <input type='hidden' name='var' value='<?php echo "$postid[$i]";?>'/>
				<input type="submit" value="View Post">
			</form>


		</div>
