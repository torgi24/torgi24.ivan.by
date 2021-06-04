jQuery(document).ready(function($) {
	Array.prototype.last = function() {
		return this[this.length - 1];
	}

	setInterval(function() {
		$.ajax({
			url: '/auction/info/'+$('.field-name-field-lot-number .field-item').html(),
			timeout: 3000,
			success: function(data) {
				
				
	
				try {
					var info = jQuery.parseJSON(data);
					if(info['status'] == 0 && info['status'] != 1 || data == null || info['status'] == 'status5'){
						document.location.reload();
					}
					if(info['status'] != 0){
						$('.current_price').html(info['current_price']);
						$('.next_price').html(info['next_price']);
						if(jQuery('#id_user').text() == info['bids'].last()['uid']){
							$('#bet_button').removeClass('bet-success');
							$('#bet_button').addClass('bet-warning');
						}else{
							$('#bet_button').removeClass('bet-warning');
							$('#bet_button').addClass('bet-success');
						}
						$('.bet-text').html(info['bids'].length);
						var bets = '';
						info['bids'].forEach(element => {
							let date = new Date( Number(element['timestamp'])* 1000);
							bets += "<tr><td>"+date.getHours()+':'+('0'+date.getMinutes()).slice(-2)   + "</td><td> Участник №"+ element['uid'] + "</td><td>"+element['current_price']+"</td></tr>";
						});
	
						$( "#user-table" ).html(bets);
						if(info['current_time']){
							$('.time-text').html(info['current_time']);
	
						} else{
							document.location.reload();
						}
						$('#user_bet-container').css('display', 'block')
					}
					
					
				
					if (info['status'] == 1) {
						$('#current_price').html(info['current_price']);
						$('#next_price').html(info['next_price']);
						$('#bid_user').html(info['user']);
						if ($('#all_rates').html() != info['count']) {
							$('#auction').animate({"color": "#CB2A33"}, 1000);
							$('#auction').animate({"color": "#000"}, 2000);
						}
						$('#all_rates').html(info['count']);
					} 
	
					
					
	
					if ($('#auction').css('display') == 'none')
						$('#auction').show();
				} catch (error) {
					document.location.reload();
					return true;
				}
			},
			error: function() {
				//document.location.href = '/node/'+$('.field-name-field-lot-number .field-item').html();
				window.location.reload(true);
				return true;
			}
		});
	}, 1000);
	$('#bet_button').click(function() {
		$.ajax({
			url: '/auction/bet/'+$('.field-name-field-lot-number .field-item').html()
		});
	});
});