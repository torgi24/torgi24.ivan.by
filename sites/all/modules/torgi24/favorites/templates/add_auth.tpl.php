<div class="fav">
    <a class='btn add-to-favorite'>Добавить в избранное</a>
</div>

<div class="modal-container-Favorite" style='display:none'>
      <div class="modal">
        <div class="modal-body">
          <span class="close-btn" onclick='close_modal();'>
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
          <div class="modal-content-win">
            <div class="modal-content-tedocument.location = '/add/favorites/<?php print $nid; ?>'av">
              <p>Лот добавлен в "Избранное"</p>
            </div>
            <div class="favorite">
              <div class="fav">
                <a onclick = 'favorite()' class="modal-btn">Перейти в "Избранное"</a>
              </div>
              <div class="back">
                <a onclick ='close_modal()' class="modal-btn">Вернуться на страницу</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<script>

    function add_favorite(){
        var request = new XMLHttpRequest();
        request.open('GET','/add/favorites/<?php print $nid; ?>',true);
        request.send();
    }

    document.querySelector('.add-to-favorite').onclick = function(){
        document.querySelector('.modal-container-Favorite').style.display = 'flex';
    }
        
    
    function close_modal(){
        add_favorite();
        document.querySelector(".modal-container-Favorite").style.display="none";
        
    }

    function favorite(){    
        add_favorite();
        document.location = '/user/';
    }
    
</script>