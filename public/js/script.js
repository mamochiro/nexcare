function toggleSidebar(){
	document.getElementById("sidebar").classList.toggle('active');
	$('body').toggleClass('modal-open')
}
$(document).ready(function() {
	$('.choice label').click(function() {
		$('input:not(:checked)').parent().removeClass('boxShadow')
		$(this).addClass('boxShadow')
	})
})