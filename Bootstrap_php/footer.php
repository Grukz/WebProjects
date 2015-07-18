	<div class="befrfoo" style="margin-top: 300px;">
		
	</div>
	<footer>
		<div class="dev">
			<center><h4 style="color: white;">Developers: </h4></center>
		</div>
	<ul class="ch-grid">	
		<li>
    		<div class="ch-item ch-img-2"> 
        		<div class="ch-info">
            		<h3>Ankur Debnath</h3>
            		<p>Web developer</p><a id ="ankfb"href="http://www.facebook.com/ankurdebnath1994" target="_blank"></a>
        		</div>
    		</div>
		</li>
		<li>
    		<div class="ch-item ch-img-1"> 
        		<div class="ch-info">
            		<h3>Mainak Manna</h3>
            		<p>Web developer</p><a id="maifb"href="http://i2.kym-cdn.com/entries/icons/facebook/000/002/252/me-gusta.jpg" target="_blank"></a>
        		</div>
    		</div>
		</li>		
	</ul>
	<p style="margin-bottom: 0px; text-align: center; color: white; margin-top: 20px;">© Mini-Project. All rights reserved.</p>
	</footer>

	<script src="jquery-1.10.2.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
		var cSpeed=2;
		var cWidth=128;
		var cHeight=128;
		var cTotalFrames=12;
		var cFrameWidth=128;
		var cImageSrc='images/sprites.gif';
		
		var cImageTimeout=false;
		var cIndex=0;
		var cXpos=0;
		var cPreloaderTimeout=false;
		var SECONDS_BETWEEN_FRAMES=0;
		
		function startAnimation(){
			
			document.getElementById('loaderImage').style.backgroundImage='url('+cImageSrc+')';
			document.getElementById('loaderImage').style.width=cWidth+'px';
			document.getElementById('loaderImage').style.height=cHeight+'px';
			
			//FPS = Math.round(100/(maxSpeed+2-speed));
			FPS = Math.round(100/cSpeed);
			SECONDS_BETWEEN_FRAMES = 1 / FPS;
			
			cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES/1000);
			
		}
		
		function continueAnimation(){
			
			cXpos += cFrameWidth;
			//increase the index so we know which frame of our animation we are currently on
			cIndex += 1;
			 
			//if our cIndex is higher than our total number of frames, we're at the end and should restart
			if (cIndex >= cTotalFrames) {
				cXpos =0;
				cIndex=0;
			}
			
			if(document.getElementById('loaderImage'))
				document.getElementById('loaderImage').style.backgroundPosition=(-cXpos)+'px 0';
			
			cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES*1000);
		}
		
		function stopAnimation(){//stops animation
			clearTimeout(cPreloaderTimeout);
			cPreloaderTimeout=false;
		}
		
		function imageLoader(s, fun)//Pre-loads the sprites image
		{
			clearTimeout(cImageTimeout);
			cImageTimeout=0;
			genImage = new Image();
			genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};
			genImage.onerror=new Function('alert(\'Could not load the image\')');
			genImage.src=s;
		}
		
		//The following code starts the animation
		new imageLoader(cImageSrc, 'startAnimation()');
	</script>
	<script>
		if (window.location == 'http://localhost/Bootstrap_php/index.php') {
			$('.home').addClass('active');
		}else if(window.location == 'http://localhost/Bootstrap_php/ask.php'){
			$('.aska').addClass('active');
		}
		$('label#subwar').hide();
		$('label#queswar').hide();
		$('center#warning').hide();
		$('center#warning1').hide();
		$('div#loaderImage').hide();
		$(document).ready(function () {
			$('.bxslider').bxSlider({auto: true, slideWidth: 1400});
			$('div#topbar1').hide();
			var menu = $('div#jumb');
			var origOffsetY = menu.offset().top;
			// alert(menu.offset());
			$(document).scroll(function(){
				var relativeY = origOffsetY - $(window).scrollTop(); 
			    if ($(window).scrollTop() >= (relativeY + 200) ) {
			        //$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top').slideDown();
			        $('div#topbar1').fadeIn();
			    } else {
			        //$('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');
			        $('div#topbar1').fadeOut();
			    }
			}); 
		});
		var d = new Date();
		$('button#post').click(function(event) {
			var signedin = '<?php echo $_SESSION['signed_in']; ?>';
			var name = '<?php echo $_SESSION['user_name'];?>';
			var date = d.getDate() + '/' + (d.getMonth()+1) + '/' + d.getFullYear();
			event.preventDefault();
			var reply = $(this).parent().parent().parent().children('textarea').val();
			var get = $(this).val();
			if (!signedin) {
				$('center#warning1').fadeIn();
				$('textarea').val('');
			}else if (reply == ''){
				$('center#warning').fadeIn();
			}else{
				$('center#warning').hide();
				$('center#warning1').hide();				
				$.ajax({
					url: 'topic.php',
					type: 'POST',
					dataType: 'text',
					data: {'reply-content': reply,
							'get' : get},
				})
				.done(function() {
					$('textarea').val('');
					$('div#loaderImage').fadeIn(5000).fadeOut('slow', function() {
						$('div#last').before('<div class="container" id="newpost" style="background: rgba(255,127,85,0.5); color: black; width: 90%; margin-top: 10px; border: 2px solid black; border-radius: 10px;"><div  style="padding: 10px; font-weight: bold;  word-wrap: break-word; text-align: right; border-bottom: 4px solid black;"><p style="float: left; font-size: 1.2em; background: rgba(255,255,255,0.5); padding: 5px; border-radius: 1em;">' + name + '</p><p>' + date + '</p></div><div  style="overflow: hidden; padding: 20px; font-size: 1.25em; line-height: 1.5em;">'	+ reply + '</div></div>');
						$('div#newpost').fadeIn(4000);					
					});
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});		
			}
		});

	$('button#askbtn').click(function(event) {
		event.preventDefault();
		$('center#temp').hide();
		var cattop = $('select').val();
		var subject = $('#asksub').val();
		var question = $('textarea#asktxt').val();
		if (question == '' || subject == '') {
			if(question == ''){
				$('label#queswar').fadeIn();
			}
			else{
				$('label#queswar').hide();			
			}
			if(subject == ''){
				$('label#subwar').fadeIn();
			}
			else{
				$('label#subwar').hide();
			}			
		}else{
			$.ajax({
				url: 'ask.php',
				type: 'POST',
				dataType: 'text',
				data: {'topic_subject': subject,
						'post_content': question,
						'topic_cat': cattop},
			})
			.done(function() {
				$('select').val('1');
				$('#asksub').val('');
				$('textarea#asktxt').val('');
				$('form').append('<center id="temp"><div class="alert alert-success" style="width: 40%;">Topic successfully created. Check it out <a href="http://localhost/Bootstrap_php/category.php?id=' + cattop + '">here</a></div></center>');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}

	});



		// $('button#signin-button').click(function(event) {
		// 	event.preventDefault();
		// 	if ($('input#username').val() == '') {
		// 		alert('username field empty');
		// 	}else if ($('input#password').val() == '') {
		// 		alert('password field empty');
		// 	}else{
		// 		window.location.replace('signin.php');
		// 		console.log('submitted');
		// 	}
		// });
	</script>	
</body>
</html>