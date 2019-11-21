<div class="page">
<div class="post">
	<?php
	include "db_connect.php";
	//include "util\simpleSpotifyApp.php";

    if(!isset($_SESSION))
    {
        session_start();
    }
	?>
	<h2> Create a Post </h2>

	<form action="util/simpleSpotifyApp" method="post">
	Search for a song/artist:<br>
	<input type="text" name="SearchVal"><br>
	<select name = "searchType">
		<option value = "artist">Artists</option>
		<option value = "album">Albums</option>
		<option value = "playlist"> Playlists</option>
	</select>

	<select>
	<?php
	if(isset($_SESSION["SpotifyResult"])){
	foreach($_SESSION['SpotifyResult'] as $key=>$value)
    {
		?>
		<option>
		<?php
			// and print out the values
			echo $value;
			?>
		</option>

		<?php
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

	<div>
	<!-- type your post here -->

	<form action="util/add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	Add your own genre:<br>
	<textarea id="msg" name="tag_hash"></textarea>
	<br>
	<input type="submit" value="Submit">
	</form>



	</div>
</div>
</div>
