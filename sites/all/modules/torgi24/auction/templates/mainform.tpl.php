<!--<div id="auction" >
	<fieldset>
		<legend>Ставки</legend>
		<div id="last_bid">
			<p><b>Текущая цена:</b> <span id="current_price"><?//php print number_format($price, 0, '', ' ').' бел.руб.'; ?></span></p>
			<p><b>Ставка пользователя:</b> <span id="bid_user">Нет ставок</span></p>
			<p><b>Следующая ставка:</b> <span id="next_price"><?//php print number_format($price+$price/100*5, 0, '', ' ').' бел.руб.'; ?></span></p>
			<p><b>Всего ставок:</b> <span id="all_rates">0</p>
		</div>
	</fieldset>
	<div >
		<input type="button" value="Сделать ставку" id="bet_button" />
	</div>
</div>-->

<div style='display:none' id='id_user'><?= $user->uid?></div>
<div class="current-price">
    <p>Текущая цена:</p>
    <p class="price-text current_price"></p>
</div>

<div class="next-bet">
    <p>Следующая ставка:</p>
    <p  class="price-text next_price"></p>
</div>

<div class="count-bet">
	<p>Всего ставок:</p>
    <p class="price-text bet-text"></p>
</div>
<div class="my-bets" style ='display:none'>
    <p>Мои ставки:</p>
    <p class="price-text"></p>
</div>
<div class="timeout">
    <p>Время до окончания торгов:</p>
    <p class="price-text time-text"></p>
</div>
<div class="bet-btn">
    
	<input type="button" value="Сделать ставку" id="bet_button" class="btn bet-success" />
	
</div>

