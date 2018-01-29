
	$(document).ready(function()
	{		
		$(".botonServicio").click(function()
		{
			$('html, body').animate(
			{
				scrollTop: ($("#contact-form").offset().top)
			}, 400, 'swing');			
		});		
	});
	