jQuery(document).ready(function($) {
	$('.delete_request').click(function() {
		if (!confirm('Вы действительно хотите удалить данную заявку?'))
			return false;
	});
	$('.change_status').click(function() {
		if (!confirm('Вы действительно хотите переключить статус данной заявки?'))
			return false;
	});
});