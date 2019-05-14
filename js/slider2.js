$(document).ready(function(){
 function batdauchuyendong()
 {
		chuyendong=setInterval(function(){
			// chuyen dong sang trai 248
			$('#slider ul').animate({'marginLeft':'-=248px'},1000,function(){
				$('#slider ul li:first').appendTo('#slider ul');
				$('#slider ul').css('marginLeft',0);
			});
		},3000);
  };
  function dungchuyendong(){
  	clearInterval(chuyendong);
  };
  $('silder ul').on('mouseenter',dungchuyendong).on('mouseleave',batdauchuyendong);
  batdauchuyendong();
});