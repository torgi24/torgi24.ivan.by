
<div class="request">
	<a class="btn" id='open_modal'>Подать заявку на участие</a>
</div>
		   

<div class="modal-container" style='display:none'>
      <div class="modal">
        <div class="modal-body">
          <span class="close-btn remove">
            <svg
              width="13"
              height="13"
              viewBox="0 0 13 13"
              fill="#3686CD"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M13 1.31394L11.6861 0L6.49998 5.18608L1.31394 0L0 1.31394L5.18608 6.49998L0 11.6861L1.31394 13L6.49998 7.81392L11.6861 13L13 11.6861L7.81392 6.49998L13 1.31394Z"
                fill="#3686CD"
                fill-opacity="0.65"
              />
            </svg>
          </span>
          <div class="modal-content">
            <div class="modal-content-text">
              <p>Участник</p>
              <p>Ваша заявка на участие подана</p>
            </div>
            <div class="modal-btn-container">
              <a  class="modal-btn remove" style='color:white'>Вернуться на страницу</a>
            </div>
          </div>
        </div>
      </div>
    </div>

	<script>
		document.querySelector('.modal-btn.remove').onclick = function(){
			document.location = "/auction/participate/<?= $nid; ?>";
		}

		document.querySelector('.close-btn.remove').onclick = function(){
			document.location = "/auction/participate/<?= $nid; ?>";
		}
		
		document.getElementById('open_modal').onclick = function() {
			document.querySelector('.modal-container').style.display = 'flex';
		}
	</script>