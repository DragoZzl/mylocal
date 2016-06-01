jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

var textObj=''
	$(".language-tg").mouseenter(function () {//公用hover显示带延迟效果
		textObj=$(this).text();
		$(this).text($(this).attr('data-title'))
		$(this).attr('data-title',textObj)
       
    }).mouseleave(function () {//失去焦点延迟消失
		var objbox=$(this);
        setuser = setTimeout(function () {
        	textObj=objbox.text();
			objbox.text(objbox.attr('data-title'))
			objbox.attr('data-title',textObj)
        }, 200)
    });

    $('.zhanshi li').hover(function(){ 
    	$(this).find('.hover-tg').toggle();
    });

});