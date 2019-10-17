
<div class="post">
<!--
	<div class="postDiv">
	<img src="images/ProfileTest.jpg" alt="Profile Picture." width="32" height="32">
	<b>Manny Calavera</b> shared at 11:32 a.m.<br>
	<b>Weird Part of the Night<br>
	Louis Cole</b>
	</div>
	<div class="postDiv">
		<iframe width=80% height=80% src="https://www.youtube.com/embed/glgPZmSwC4M"></iframe>
		</div>
	<div class="postDiv">
	Average Rating: <i class="far fa-star" data-index="0"></i> <i class="far fa-star" data-index="1"></i> <i class="far fa-star" data-index="2"></i> <i class="far fa-star" data-index="3"></i> <i class="far fa-star" data-index="4"></i>
	</div>
	-->
<script   src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
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
						<div class="postDiv">
						<?php
					include "db_connect.php";

					?>
					<form action="" method="post">
					Comment:<br>
					<input type="text" name="keyword">
					<input type="submit" value="Submit">
					</form>

						</div>




					</div>