(function  () {
		$('.bxslider').bxSlider({
		  minSlides: 4,
		  maxSlides: 4,
		  slideWidth: 170,
		  slideMargin: 10,
		  ticker: true,
		  speed: 6000
		});
		var books = [
		{title : 'Civil Engineering', author : 'S. Chand', src : 'images/books/civil/civil1.jpeg', sub : 'Questions', dept : 'Civil', edition : '2nd Edition\n3rd Edition'},
		{title : 'Contracts and Estimates', author : 'B S Patil', src : 'images/books/civil/civil2.jpg', sub : 'Structural', dept : 'Civil', edition : '1st Edition\n2nd Edition'},
		{title : 'Structural Pocket Book', author : 'Fiona Cobb', src : 'images/books/civil/civil3.jpg', sub : 'Structural', dept : 'Civil', edition : '4th Edition'},
		{title : 'Objective Type questions', author : 'S.P. Gupta', src : 'images/books/civil/civil4.jpeg', sub : 'Questions', dept : 'Civil', edition : ''},
		{title : 'Basic Civil Engineering', author : 'S.S. Bhavikatti', src : 'images/books/civil/civil5.png', sub : 'Basic', dept : 'Civil', edition : '8th Edition'},
		{title : 'Java Programming', author : 'Brett Programming', src : 'images/books/CSE/cse1.jpg', sub : 'Algorithm', dept : 'Computer Science', edition : '3rd Edition\n4th Edition\n5th Edition'},
		{title : 'Gate Papers', author : '-', src : 'images/books/CSE/cse2.jpg', sub : 'Questions', dept : 'Computer Science', edition : 'Latest Edition'},
		{title : 'MATLAB', author : 'Vasllos', src : 'images/books/CSE/cse3.jpg', sub : 'Image processing', dept : 'Computer Science', edition : 'Volume 1'},
		{title : 'Software Engineering', author : 'Deepak Jain', src : 'images/books/CSE/cse4.jpg', sub : 'Software', dept : 'Computer Science', edition : '12th Edition'},
		{title : 'Computer Architecture', author : 'William Stallings', src : 'images/books/CSE/cse5.png', sub : 'Hardware', dept : 'Computer Science', edition : '7th Edition\n8th Edition'},
		{title : 'Engineering Drawing', author : 'Surjit Singh', src : 'images/books/elec/elec1.jpg', sub : 'Drawing', dept : 'Electrical', edition : 'Part 2'},
		{title : 'Electrical Engineering', author : 'D P Kothari', src : 'images/books/elec/elec2.png', sub : 'Basic', dept : 'Electrical', edition : '3rd Edition'},
		{title : 'Power Engineering', author : 'K.C. Agarwal', src : 'images/books/elec/elec3.gif', sub : 'Power', dept : 'Electrical', edition : ''},
		{title : 'Electrical Engineering', author : 'J.B. Gupta', src : 'images/books/elec/elec4.jpg', sub : 'Basic', dept : 'Electrical', edition : 'Latest Edition'},
		{title : 'Data Communication', author : 'Dr. Sanjay Sharma', src : 'images/books/IT/it1.jpg', sub : 'Networks', dept : 'Information Technology', edition : '7th Edition'},
		{title : 'Computer Architecture', author : 'Amit kumar Mishra', src : 'images/books/IT/it2.jpg', sub : 'Hardware', dept : 'Information Technology', edition : '6th Edition'},
		{title : 'Theory of Machines', author : 'Dr. R.K. Singal', src : 'images/books/IT/it3.jpg', sub : 'Machines', dept : 'Information Technology', edition : '3rd Edition\n4th Edition'},
		{title : 'Software Engineering', author : 'Bali Bali', src : 'images/books/IT/it4.jpg', sub : 'Software', dept : 'Information Technology', edition : '4th Edition'},
		{title : 'Engineering Mathematics', author : 'Anthony Croft', src : 'images/books/IT/it5.jpg', sub : 'Mathematics', dept : 'Information Technology', edition : '2nd Edition\n5th Edition'},
		{title : 'Automobile Engineering', author : 'P.S. Gill', src : 'images/books/mech/mech1.JPG', sub : 'Automobile', dept : 'Mechanical', edition : '2nd Edition'},
		{title : 'Mechanical Engineering', author : 'Basant Agarwal', src : 'images/books/mech/mech2.jpg', sub : 'Basic', dept : 'Mechanical', edition : '7th Edition\n8th Edition'},
		{title : 'Engineering Design', author : 'Joseph E. Shigley', src : 'images/books/mech/mech3.jpg', sub : 'Design', dept : 'Mechanical', edition : '6th Edition\n8th Edition'},
		{title : 'Foundry Engineering', author : 'Robert B. Tuttle', src : 'images/books/met/met1.jpg', sub : 'Foundry', dept : 'Metelurgy', edition : '3rd Edition'},
		{title : 'Principles of Welding', author : 'Robert W. Messler', src : 'images/books/met/met2.jpg', sub : 'Welding', dept : 'Metelurgy', edition : '5th Edition'},
		{title : 'Metallurgical Engineering', author : 'Mohammad Nusheh', src : 'images/books/met/met3.jpg', sub : 'Basic', dept : 'Metelurgy', edition : '10th Edition'},
		{title : 'Mining  Analysis', author : 'Christopher ', src : 'images/books/min/min1.jpg', sub : 'Analysis', dept : 'Mining', edition : '5th Edition'},
		{title : 'Mining Engineering', author : 'Howard L', src : 'images/books/min/min2.jpg', sub : 'Basic', dept : 'Mining', edition : '4th Edition'},
		{title : 'Engineering Mechanics', author : 'U.C. Jindal', src : 'images/books/min/min3.jpg', sub : 'Mechanics', dept : 'Mining', edition : '7th Edition'}
		];
		// {title : '', author : '', src : '', sub : '', dept : '', edition : ''},

		function compare(a,b) {
 			if (a.author.toLowerCase() < b.author.toLowerCase())
     			return -1;
  			if (a.author.toLowerCase() > b.author.toLowerCase())
    			return 1;
  			return 0;
		}
		books.sort(compare);
		function display_all_elements (argument) {
			for (var i = 0; i < books.length-1; i++) {
				var s; 			
				if(books[i].edition != ''){
					s = '<div class="thumbnail"><img src="'+ books[i].src +'" alt=""><div class="caption text-center"><h3 data-toggle="tooltip" data-placement="top" title="'+ books[i].edition +'">'+ books[i].title +'</h3><p>'+ books[i].author +'</p><p class="text-center"><a href="#" class="btn btn-primary" role="button">Issue</a><a href="#" class="btn btn-default" role="button">View</a></p></div></div>';				
				}else{
					s = '<div class="thumbnail"><img src="'+ books[i].src +'" alt=""><div class="caption text-center"><h3>'+ books[i].title +'</h3><p>'+ books[i].author +'</p><p class="text-center"><a href="#" class="btn btn-primary" role="button">Issue</a><a href="#" class="btn btn-default" role="button">View</a></p></div></div>';
				}
				var t = '<div class="col-md-6 col-lg-4 demo">' + s + '</div>';
				if( i%3 == 0 ){
					var nw = '<div class="row'+ i/3 + '"></div>';
					$('.bookcontainer').append(nw);
				}
				$('.row' + Math.floor(i/3)).append(t).hide().fadeIn(1000);
			};
		}
		display_all_elements();
		function display_subject_elements (value) {
			var count=0;
			for (var i = 0; i < books.length; i++) {
				var s;
				console.log(books[i].dept == value); 			
				if( books[i].dept == value){
					console.log('entered');
					if(books[i].edition != ''){
						s = '<div class="thumbnail"><img src="'+ books[i].src +'" alt=""><div class="caption text-center"><h3 data-toggle="tooltip" data-placement="top" title="'+ books[i].edition +'">'+ books[i].title +'</h3><p>'+ books[i].author +'</p><p class="text-center"><a href="#" class="btn btn-primary" role="button">Issue</a><a href="#" class="btn btn-default" role="button">View</a></p></div></div>';				
					}else{
						s = '<div class="thumbnail"><img src="'+ books[i].src +'" alt=""><div class="caption text-center"><h3>'+ books[i].title +'</h3><p>'+ books[i].author +'</p><p class="text-center"><a href="#" class="btn btn-primary" role="button">Issue</a><a href="#" class="btn btn-default" role="button">View</a></p></div></div>';
					}
					var t = '<div class="col-md-6 col-lg-4 demo">' + s + '</div>';
					if( count%3==0 ){
						var nw = '<div class="row'+ Math.floor(count/3) + '"></div>';
						$('.bookcontainer').append(nw);
					}
					$('.row' + Math.floor(count/3)).append(t).hide().fadeIn(1000);
					count++;					
				}
			};
		}
		$('[data-toggle="tooltip"]').tooltip();
		$('.department').change(function(event) {
			var element;
			switch($(this).val()){
				case 'Computer Science' 		: element = '<option value="Algorithm">Algorithm</option><option value="Image processing">Image processing</option><option value="Hardware">Hardware</option><option value="Software">Software</option><option value="Questions">Questions</option>';
										  		  break;
				case 'Information Technology'	: element = '<option value="Hardware">Hardware</option><option value="Machines">Machines</option><option value="Mathematics">Mathematics</option><option value="Networks">Networks</option><option value="Software">Software</option>';
												  break;
				case 'Mechanical'				: element = '<option value="Automobile">Automobile</option><option value="Basic">Basic</option><option value="Design">Design</option>';
												  break;
				case 'Electrical'				: element = '<option value="Basic">Basic</option><option value="Drawing">Drawing</option><option value="Power">Power</option>';
												  break;
				case 'Civil'					: element = '<option value="Basic">Basic</option><option value="Structural">Structural</option><option value="Questions">Questions</option>';
												  break;
				case 'Mining'					: element = '<option value="Analysis">Analysis</option><option value="Basic">Basic</option><option value="Mechanics">Mechanics</option>';
												  break;			  	
				case 'Metelurgy'				: element = '<option value="Basic">Basic</option><option value="Foundry">Foundry</option><option value="Welding">Welding</option>';
								  				  break;
			}
			$('select.subject').empty();
			$('select.subject').append('<option value="" default selected>Select Subject</option>');
			$('select.subject').append(element);
			$('.selectpicker').selectpicker('refresh');
			$('.bookcontainer').empty();
			if($(this).val() != ""){
				display_subject_elements($(this).val());
			}else{
				display_all_elements();
			}
			$('[data-toggle="tooltip"]').tooltip();
		});
		$('.selectpicker').selectpicker();
		$('select.subject').change(function(event) {
			$('.bookcontainer').empty();
			if ($(this).val() != "") {
				var count=0;
				for (var i = 0; i < books.length; i++) {
					var s;	
					if( books[i].sub == $(this).val() && books[i].dept == $('select.department').val()){
						if(books[i].edition != ''){
							s = '<div class="thumbnail"><img src="'+ books[i].src +'" alt=""><div class="caption text-center"><h3 data-toggle="tooltip" data-placement="top" title="'+ books[i].edition +'">'+ books[i].title +'</h3><p>'+ books[i].author +'</p><p class="text-center"><a href="#" class="btn btn-primary" role="button">Issue</a><a href="#" class="btn btn-default" role="button">View</a></p></div></div>';				
						}else{
							s = '<div class="thumbnail"><img src="'+ books[i].src +'" alt=""><div class="caption text-center"><h3>'+ books[i].title +'</h3><p>'+ books[i].author +'</p><p class="text-center"><a href="#" class="btn btn-primary" role="button">Issue</a><a href="#" class="btn btn-default" role="button">View</a></p></div></div>';
						}
						var t = '<div class="col-md-6 col-lg-4 demo">' + s + '</div>';
						if( count%3==0 ){
							var nw = '<div class="row'+ Math.floor(count/3) + '"></div>';
							$('.bookcontainer').append(nw);
						}
						$('.row' + Math.floor(count/3)).append(t).hide().fadeIn(1000);
						count++;					
					}
				};
			}else{
				display_subject_elements($('select.department').val());
			}
			$('[data-toggle="tooltip"]').tooltip();
		});
})();