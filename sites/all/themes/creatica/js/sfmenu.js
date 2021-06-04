/*
jQuery(function($){
    $(document).ready(function(){
      // superFish
       $('#main-menu ul.menu').supersubs({
       minWidth:    16, // minimum width of sub-menus in em units
       maxWidth:    40, // maximum width of sub-menus in em units
       extraWidth:  1 // extra width can ensure lines don't sometimes turn over
     })
    .superfish(); // call supersubs first, then superfish
     });
});*/


function openModalLogin(){
  jQuery('#login-user-header').addClass('active');
}

function closeModalLogin(){
  jQuery('#login-user-header').removeClass('active');
}






/*** ***/


jQuery(document).ready(function() {
  // $('#edit-profile-juridical-field-jur-authface-und-0-field-jur-jp-phone-und-0-value').attr('maxlength','13');
  $('#edit-profile-juridical-field-jur-juraddress-und-0-field-jur-ja-fax-und-0-value').attr('maxlength','20');
  $('#edit-profile-juridical-field-jur-bankrecvizites-und-0-field-jur-br-bankcode-und-0-value').attr('maxlength','11');

  $("input.required").prop('required' , true);

// $('.physSubmitDiv #edit-submit').on('hover' , function(e){
  $('.physSubmitDiv #edit-submit').click(function(e){

  if( $('#edit-profile-physical-field-phys-true-und').prop('checked') == true){
    console.log( $('#edit-profile-physical-field-phys-true-und'));
    $('.form-item.form-type-checkbox.form-item-profile-physical-field-phys-true-und').css({'border': '0px solid red'})
  }else{
    window.scrollTo(0, 0);
    e.preventDefault();
    $('.form-item.form-type-checkbox.form-item-profile-physical-field-phys-true-und').css({'border': '2px solid red'})
  }



})

$('.juridicalSSButton #edit-submit').click(function(e){
  if( $('#edit-profile-juridical-field-jur-true-und').prop('checked') == true){
    console.log( $('#edit-profile-juridical-field-jur-true-und'));
    $('.form-item.form-type-checkbox.form-item-profile-juridical-field-jur-true-und').css({'border': '0px solid red'})
  }else{
    window.scrollTo(0, 0);
    e.preventDefault();
    $('.form-item.form-type-checkbox.form-item-profile-juridical-field-jur-true-und').css({'border': '2px solid red'})
  }

})



  $("#edit-profile-juridical-field-jur-juraddress-und-0-field-jur-ja-fax-und-0-value").on("keypress keyup blur",function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
     if ((event.which < 48 || event.which > 57)) {
        //  $(".error").css("display", "inline");
         event.preventDefault();
     }
 });

  jQuery('#menu-toggle').on('click', function(){
    jQuery(this).toggleClass('active');

    if(jQuery(document).width() <= 768){
      jQuery('#main-menu').animate({
        heght:'toggle'
      })
    }else{

      jQuery('.catalog-menu').toggleClass('active')
    }
  })

  jQuery('#cancel-change').on('click', function(){
    document.location.reload();
  })

  jQuery('#upload_photo').on('click',function(){
    jQuery('#edit-field-user-img-und-0-upload').trigger("click");
  });


 /* jQuery('#user-image').bind("DOMSubtreeModified", function () {

    jQuery('#upload_user_photo').attr('src', jQuery('#user-image .image-preview img').attr('src'))

  })*/

  jQuery('#edit-field-user-img-und-0-upload').change(function(){
    Swal.fire(
      'Изображение успешно загружено!',
      '',
      'success'
    )
  })

  jQuery('#menu-toggle').on('click', function(){
    //if(jQuery('#menu-toggle').hasClass('active')){
     /* $(document).width() > 480 jQuery('#main-menu').animate({
        heght:'toggle'
      })*/
    //}
  })


  jQuery('#chek_input').on('click',function(){
    jQuery(this).toggleClass('active');
    jQuery('.shachmatka-product.active').toggle();
  })

  jQuery('input.error').css('border-color', 'red');
  jQuery('select.error').css('border-color', 'red');

//jQuery('')
//localStorage.setItem('output', 'Tom');
/*
  var demo = jQuery("#demo_2");
  demo.ionRangeSlider({
      type: "double",
      min: 0,
      max: 2000000,
      from: 0,
      to: 2000000
  });

jQuery('#edit-field-tovar-price-value-min').val(0);
jQuery('#edit-field-tovar-price-value-max').val(2000000);

demo.on("change", function () {
    let input = jQuery(this);
    let from = input.data("from");
    let to = input.data("to");

    jQuery('#edit-field-tovar-price-value-min').val(from);
    jQuery('#edit-field-tovar-price-value-max').val(to);
});*/

/*
var d5_instance = demo.data("ionRangeSlider");
jQuery('#edit-field-lot-price-value').on('change', function(){
    d5_instance.update({

        from: jQuery(this).val()
    });
})

jQuery('#to').on('change', function(){
    d5_instance.update({

        to: jQuery(this).val()
    });
})*/


jQuery('.close').on('click',function(){
  jQuery(this).parents('.in-ct').toggleClass('active');
});

jQuery('.in-ct ul li').on('click',function(){
  jQuery(this).parents('.in-ct').find('input').val($(this).text());
  jQuery(this).parents('.in-ct').removeClass('active');
})

//console.clear();



  jQuery(function () {
    jQuery(".arrow-btn").click(function () {
      jQuery("#details-panel").slideToggle("slow");
      jQuery(this).toggleClass("active");
      return false;
    });
  });
  jQuery(function () {
    jQuery(".arrow-btn-buy").click(function () {
      jQuery("#details-panel-buy").slideToggle("slow");
      jQuery(this).toggleClass("active");
      return false;
    });
  });
  jQuery(function () {
    jQuery(".arrow-btn-bet").click(function () {
      jQuery("#panel").slideToggle("slow");
      jQuery(this).toggleClass("active");
      return false;
    });
  });

  jQuery(function () {
    jQuery(".arrow-btn-request").click(function () {
      jQuery("#details-panel-request").slideToggle("slow");
      jQuery(this).toggleClass("active");
      return false;
    });
  });

  jQuery("#main-img-container").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    draggable: false,
    adaptiveHeight: true,
    // infinite: true,
    fade: true,
    asNavFor: "#img-container",
  });
  jQuery("#img-container").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    // infinite: true,
    asNavFor: "#main-img-container",
    dots: false,
    centerMode: false,
    focusOnSelect: true,
  });
  jQuery('#favorite-slider').slick({
    slidesToShow: 3,
    //slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    responsive: [{
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });


  /*
  jQuery(".today-slider").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 380,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });*/
});

$('.shachmatka-product .product-price div').each(function(e){
  e = $(this);
  console.log(e.html());
})

$('#edit-profile-juridical-field-jur-bankrecvizites-und-0-field-jur-br-account-test-und-0-value').attr('maxlength', 28);

$('body').on('change', '#edit-profile-juridical-field-jur-bankrecvizites-und-0-field-jur-br-account-test-und-0-value', function(){
  var inputVal = $(this).val();
  var inputLength = inputVal.substring(0, 28);
  // var inputValue = document.getElementById('edit-profile-juridical-field-jur-bankrecvizites-und-0-field-jur-br-account-test-und-0-value').defaultValue;

  $(this).attr('maxlength', 28);
  $(this).val().length > 28 && $(this).val(inputLength);
  // inputValue = inputLength;
  document.getElementById('edit-profile-juridical-field-jur-bankrecvizites-und-0-field-jur-br-account-test-und-0-value').defaultValue = inputLength;
});


if(document.querySelector('.subscribe') || document.querySelector('.contact-form')){

  $( ".subscribe form" ).on( "submit", function( event ) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "/email/mail.php",
      data: $( this ).serialize(),
      success: function(data) {
        if(data == '00'){
          Swal.fire(
            'Вы успешно подписались на наши обновления!',
            '',
            'success'
          )
        }else if(data == '01'){
          Swal.fire(
            'Сообщение успешно отправлено!',
            '',
            'success'
          )
        }

        console.log(data);
      },
      error: function(g) {
          console.log(g)
      }
  })
  });


  $("#send" ).on( "click", function( event ) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "/email/mail.php",
      data: $( this ).closest('form').serialize(),
      success: function(data) {
        if(data == '00'){
          Swal.fire(
            'Вы успешно подписались на наши обновления!',
            '',
            'success'
          )
        }else if(data == '01'){
          Swal.fire(
            'Сообщение успешно отправлено!',
            '',
            'success'
          )
        }else if(data == '1'){
          console.log('no submission');
        }

        console.log(data);
      },
      error: function(g) {
          console.log(g)
      }
  })
  });



}

function toFixedNoRounding(n, valNum) {
  const reg = new RegExp("^-?\\d+(?:\\.\\d{0," + n + "})?", "g")
  const a = valNum.match(reg)[0];
  const dot = a.indexOf(".");
  if (dot === -1) { // integer, insert decimal dot and pad up zeros
      return a + "." + "0".repeat(n);
  }
  const b = n - (a.length - dot) + 1;
  return b > 0 ? (a + "0".repeat(b)) : a;
}

document.querySelector('#edit-field-lot-min-price-und-0-value').addEventListener('change' , function(){
          this.value = toFixedNoRounding(2,this.value)

})
