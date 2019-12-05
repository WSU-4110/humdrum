<div class="page">
<div class="post">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<?php
	include "db_connect.php";
	//include "util\simpleSpotifyApp.php";

    if(!isset($_SESSION))
    {
        session_start();
    }
	?>
	<h2> Create a Post </h2>

	<form action="util/simpleSpotifyApp.php" method="post" id = "spotifySearchForm">
	Search for a song/artist:<br>
	<input type="text" name="SearchVal" ><br>
	<select name = "searchType">
		<option value = "artist">Artists</option>
		<option value = "album">Albums</option>
		<option value = "playlist"> Playlists</option>
	</select>

	<select name = "searchResultList" id = "searchList" onchange ="updateSession()">
	<?php
	$musicId = $_SESSION['SpotifyResultId'];
	$i = 0;
	if(isset($_SESSION["SpotifyResult"])){
	foreach($_SESSION['SpotifyResult'] as $key=>$value)
    {
		?>
		<option value = "<?=$musicId[$i]?>">
		<?php
			// and print out the values
			echo $value;

			?>
		</option>

		<?php
		$i++;
    }}

	?>
	</select>
	<input type="submit" value="Submit">

	</form>

	<script>
		var x;
		function updateSession(){

			x = document.getElementById("searchList").value;
			//alert(x);

			document.getElementById("embedId").value = x;
			//'<%Session["Spotify"] = "' + x + '"; %>';

		}

	</script>

	<!-- testing out this ajax call -->
	<script>
		 var frm = $('#'); // disabling this feature

			frm.submit(function (e) {

				e.preventDefault();

				$.ajax({
					type: frm.attr('method'),
					url: frm.attr('action'),
					data: frm.serialize(),
					success: function (data) {
						alert('Submission was successful.');
						var sessionArray = '<%= Session["SpotifyResult"] %>';
						var container = document.getElementById("searchResultList");

						var $el = $("#searchResultList");
						$el.empty(); // remove old options
						$el.append($("<option></option>")
								.attr("value", '').text('Please Select'));
						$.each(sessionArray, function(value, key) {
							$el.append($("<option></option>")
									.attr("value", value).text(key));
						});
							console.log(data);
						},
					error: function (data) {
							console.log('An error occurred.');
							console.log(data);
						},
				});
			});

	</script>

	<br>

<?php

?>
	<div>
		<style>

		label{
			width: 30%;
		}
		ul li{
			list-style-type: none;
			display: inline-block;
			color: black;
			text-shadow: 2px 2px 7px grey;
			font-size: 15px !important;
		}
		ul li:hover{
			color: green;
		}
		ul li.active,ul li.secondary-active{
			color: green;
		}
		input[type="radio"]{
			display: none
		}]

		</style>
	<!-- type your post here -->

	<form action="util/add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	Add your own genre:<br>
	<textarea id="msg" name="tag_hash"></textarea>
	<input type = "hidden" name="musicId" id = "embedId" value = "0">
	<br>
	User rating:
	<ul>
      <li><label for="rating_1"><i class="far fa-star" aria-hidden="true"></i></label><input type = "radio" name = "rating" id = "rating_1"value = "1"/></li>
      <li><label for="rating_2"><i class="far fa-star" aria-hidden="true"></i></label><input type = "radio" name = "rating" id = "rating_2" value = "2"/></li>
      <li><label for="rating_3"><i class="far fa-star" aria-hidden="true"></i></label><input type = "radio" name = "rating" id = "rating_3" value = "3"/></li>
			<li><label for="rating_4"><i class="far fa-star" aria-hidden="true"></i></label><input type = "radio" name = "rating" id = "rating_3" value = "4"/></li>
			<li><label for="rating_5"><i class="far fa-star" aria-hidden="true"></i></label><input type = "radio" name = "rating" id = "rating_3" value = "5"/></li>
  </ul>
	<input type="submit" value="Submit">
	</form>
	</div>
</div>
</div>
<script>
$('li').on('click', function(){
	$('li').removeClass('active');
	$(this).addClass('active');
	$(this).prevAll().addClass('secondary-active');
})
</script>
