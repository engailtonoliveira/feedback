<?php
  require_once '../vendor/autoload.php';

  use Classes\Feedback;
  $token_app = "bvnçoaonbailtonry23tyir2jhsbvadkjva";
  $token_user = "fabriciaa10922ry23tyir1jhsbvadkjvb";
  $feedback = new Feedback();
  $feedback->setTokenApp($token_app);
  $feedback->setTokenUser($token_user);
  $feedback->setClassBySecundaryKey();
  $userFeedback = $feedback->getArraySerialize();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="../public/css/font-awesome.min.css">
	<link href="../public/css/bootstrap.min.css" rel="stylesheet">
	<link href="../public/css/mdb.min.css" rel="stylesheet">
  <title>Feedback</title>

  <style>
    :root {
      --dout-svg-color: #787878;
      --dout-svg-color-disable: #78787880;
      --dout-secundary: var(--gray); 
      --dout-sucesses: var(--success);
      --dout-danger: var(--danger);
      --dout-select-option: #00c851;
    }

    .center {
      padding: 10px;
    }

    .list-group-item {
      padding: .75rem 0.75rem;
      border: none;
    }

    .list-inline-item:not(:last-child) {
      margin-right: 0;
    }

    ul li a svg{
      width: 45px;
      opacity: 0.5;
    }

    ul li a.dout-active svg{
      opacity: 1.0;
    }

    .scrollbar {
      position: absolute;
      width: 100%;
      height: calc(100% - (20px))  !important;
      margin-bottom: 0;
      margin-left: 0;
      padding: 0 0.7rem;
      overflow-y: auto;
      overflow-x: hidden;
    }

    .rest-background-color {
      background-color : var(--dout-primary);
    }
  </style>
</head>
<body>
  	<div class="flex-center flex-column contentBody" >
      <section class="contact-section scrollbar" id="ClientFeedback" style="max-width: 500px;">
        <div class="card-body form center">
        </div>
      </section>
  	</div>
  	<script type="text/javascript" src="../public/js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="../public/js/popper.min.js"></script>
  	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="../public/js/mdb.min.js"></script>
    <script type="text/javascript" src="../public/js/moment.min.js"></script>

    <script>
      var w = window.innerWidth;
      var h = window.innerHeight;

      $('.contentBody').height(h);

      var userFeedback = <?= json_encode($userFeedback)?>;
      $(document).ready(function(){
        if (userFeedback['id']) 
          setDocument(userFeedback['dateTime']);
        else
          setDefaultDocumentIndex();
      });

      function setDocument(lastDateTime) {

        let lastDateTimeFeedback = moment(lastDateTime),
          now = new moment();
        
        let difference = now.diff(lastDateTimeFeedback);

        if( difference > 86400000)
          setDefaultDocumentIndex();
        else{
          let countDown = 86400000 - difference;
          $("section#ClientFeedback").html('<div class="row">\
            <div class="col-12">\
              <div class="mx-auto d-block" style="max-width:200px" >\
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.837 17.837" xml:space="preserve">\
                <path style="fill:var(--dout-sucesses)" d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27 c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0 L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"/>\
                </svg>\
              </div>\
            </div>\
            <div class="col-12 text-center""><p><small>Your message has been sent!</small><br><span id="diffTimer">'+moment.duration(countDown).hours()+"h "+moment.duration(countDown).minutes()+"m "+moment.duration(countDown).seconds()+"s"+'</span></p></div>\
          </div>');
          showTimerDuraction(countDown);
          
        }
      }

      function setDefaultDocumentIndex() {
        $("#ClientFeedback").html('<div class="row">\
          <div class="col-md-12">\
            <input type="hidden" val="0" id="feedbackId">\
            <ul class="list-inline text-center">\
              <li class="list-inline-item">\
                <a class="list-group-item dout-active" data-value="1">\
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.44 65.44" xml:space="preserve">\
                      <path id="path-1_21_" style="fill: #e4352f;" d="M65.44,34.88c0,16.616-13.472,30.086-30.089,30.086\
                        c-16.618,0-30.09-13.47-30.09-30.086S18.733,4.794,35.351,4.794C51.968,4.794,65.44,18.264,65.44,34.88z"></path>\
                      <path id="path-2_21_" d="M45.647,23.775c0,2.01-1.63,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639\
                        C44.017,20.136,45.647,21.765,45.647,23.775z"></path>\
                      <path id="path-3_21_" d="M24.717,23.775c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.64-1.629-3.64-3.639s1.629-3.639,3.64-3.639 C23.088,20.136,24.717,21.765,24.717,23.775z"></path>\
                      <path id="path-4_21_" d="M19.207,50.977c-0.829,0-1.5-0.672-1.5-1.5c0-6.473,5.209-11.739,11.611-11.739h5.055 c6.403,0,11.611,5.237,11.611,11.674c0,0.829-0.671,1.5-1.5,1.5c-0.829,0-1.5-0.671-1.5-1.5c0-4.783-3.863-8.674-8.611-8.674 h-5.055c-4.748,0-8.611,3.92-8.611,8.739C20.707,50.305,20.036,50.977,19.207,50.977z"></path>\
                      <path id="path-5_21_" d="M31.589,63.645C14.171,63.645,0,49.476,0,32.059C0,14.643,14.171,0.474,31.589,0.474 c17.419,0,31.59,14.169,31.59,31.585C63.179,49.476,49.008,63.645,31.589,63.645z M31.589,3.474C15.825,3.474,3,16.297,3,32.059 c0,15.763,12.825,28.587,28.589,28.587c15.765,0,28.59-12.824,28.59-28.587C60.179,16.297,47.354,3.474,31.589,3.474z"></path>\
                  </svg>\
                </a>\
              </li>\
              <li class="list-inline-item">\
                <a class="list-group-item" data-value="2">\
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve">\
                    <path id="path-1_49_" style="fill: #fae613;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643 c-16.373,0-29.646-13.272-29.646-29.643c0-16.372,13.273-29.644,29.646-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"></path>\
                    <path id="path-2_49_" d="M45.778,43.768h-28c-0.828,0-1.5-0.672-1.5-1.5c0-0.829,0.672-1.5,1.5-1.5h28c0.828,0,1.5,0.671,1.5,1.5 C47.278,43.096,46.606,43.768,45.778,43.768z"></path>\
                    <path id="path-3_49_" d="M44.998,22.984c0,1.981-1.607,3.586-3.587,3.586c-1.98,0-3.586-1.605-3.586-3.586 c0-1.98,1.606-3.585,3.586-3.585C43.391,19.399,44.998,21.004,44.998,22.984z"></path>\
                    <path id="path-4_49_" d="M24.376,22.984c0,1.981-1.606,3.586-3.586,3.586c-1.981,0-3.586-1.605-3.586-3.586 c0-1.98,1.605-3.585,3.586-3.585C22.77,19.399,24.376,21.004,24.376,22.984z"></path>\
                    <path id="path-5_49_" d="M31.147,62.29C13.973,62.29,0,48.319,0,31.147S13.973,0.004,31.147,0.004s31.147,13.971,31.147,31.143 S48.321,62.29,31.147,62.29z M31.147,3.004C15.627,3.004,3,15.628,3,31.147s12.627,28.144,28.147,28.144 c15.521,0,28.147-12.625,28.147-28.144S46.668,3.004,31.147,3.004z"></path>\
                  </svg>\
                </a>\
              </li>\
              <li class="list-inline-item">\
                <a class="list-group-item" data-value="3">\
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.441 65.441" style="enable-background:new 0 0 65.441 65.441;" xml:space="preserve">\
                    <path id="path-1_10_" style="fill:#EDC951;" d="M65.441,34.881c0,16.616-13.472,30.086-30.09,30.086S5.262,51.497,5.262,34.881 S18.733,4.795,35.351,4.795S65.441,18.265,65.441,34.881z"/>\
                    <path id="path-2_10_" d="M45.647,23.776c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.641-1.629-3.641-3.639s1.63-3.639,3.641-3.639 C44.018,20.137,45.647,21.766,45.647,23.776z"/>\
                    <path id="path-3_10_" d="M24.718,23.776c0,2.01-1.629,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639 C23.089,20.137,24.718,21.766,24.718,23.776z"/>\
                    <path id="path-4_10_" d="M34.374,50.737h-5.055c-6.403,0-11.611-5.145-11.611-11.469c0-0.829,0.671-1.5,1.5-1.5 c0.828,0,1.5,0.671,1.5,1.5c0,4.749,3.782,8.469,8.611,8.469h5.055c4.828,0,8.611-3.658,8.611-8.329c0-0.829,0.671-1.5,1.5-1.5 c0.828,0,1.5,0.671,1.5,1.5C45.985,45.761,40.885,50.737,34.374,50.737z"/>\
                    <path id="path-5_10_" d="M31.59,63.646C14.171,63.646,0,49.477,0,32.06C0,14.644,14.171,0.475,31.59,0.475 c17.418,0,31.59,14.169,31.59,31.585C63.18,49.477,49.008,63.646,31.59,63.646z M31.59,3.475C15.825,3.475,3,16.298,3,32.06 c0,15.763,12.825,28.587,28.59,28.587c15.764,0,28.59-12.824,28.59-28.587C60.18,16.298,47.354,3.475,31.59,3.475z"/>\
                  </svg>\
                </a>\
              </li>\
              <li class="list-inline-item">\
                <a class="list-group-item" data-value="4">\
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve">\
                    <path id="path-1_32_" style="fill:#2fca35;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643 c-16.373,0-29.647-13.272-29.647-29.643c0-16.372,13.274-29.644,29.647-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"/>\
                    <path id="path-2_32_" style="fill:#fff;" d="M50.098,41.768c0,6.999-5.393,10.999-12.047,10.999h-6.023 c-6.652,0-12.045-4-12.045-10.999H50.098z"/>\
                    <path id="path-3_32_" d="M34.346,51.767h-6.023c-7.47,0-13.547-5.607-13.547-12.499c0-0.828,0.672-1.5,1.5-1.5h30.116 c0.828,0,1.5,0.672,1.5,1.5C47.892,46.16,41.815,51.767,34.346,51.767z M17.908,40.768c0.801,4.528,5.166,7.999,10.415,7.999 h6.023c5.248,0,9.614-3.471,10.414-7.999H17.908z"/> <path id="path-4_32_" d="M44.997,22.985c0,1.98-1.605,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586 c0-1.981,1.606-3.586,3.587-3.586C43.392,19.399,44.997,21.004,44.997,22.985z"/>\
                    <path id="path-5_32_" d="M24.376,22.985c0,1.98-1.606,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586 c0-1.981,1.606-3.586,3.587-3.586C22.77,19.399,24.376,21.004,24.376,22.985z"/>\
                    <path id="path-6_27_" d="M31.147,62.29C13.972,62.29,0,48.319,0,31.147S13.972,0.004,31.147,0.004 c17.174,0,31.147,13.971,31.147,31.143S48.321,62.29,31.147,62.29z M31.147,3.004C15.626,3.004,3,15.629,3,31.147 c0,15.519,12.626,28.144,28.147,28.144c15.52,0,28.147-12.625,28.147-28.144C59.294,15.629,46.667,3.004,31.147,3.004z"/>\
                  </svg>\
                </a>\
              </li>\
            </ul>\
          </div>\
        </div>\
        <div class="row">\
          <div class="col-md-12">\
            <div class="md-form mb-0">\
              <textarea type="text" id="form-contact-message" class="form-control md-textarea" rows="4"></textarea>\
              <label for="form-contact-message">Your message</label>\
            </div>\
            <div class="form-check">\
              <input type="checkbox" class="form-check-input" id="materialContactFormCopy">\
              <label class="form-check-label" for="materialContactFormCopy">Send as anonymous</label>\
            </div>\
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" id="saveFeedback" type="submit">Send</button>\
          </div>\
        </div>');
      }

      function showTimerDuraction(timer) {
        let countDownDate = moment().add(timer,'ms').valueOf();

        var x = setInterval(function() {

          var now = new Date().getTime();
          var distance = countDownDate - now;

          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          $("#diffTimer").html(hours + "h "
          + minutes + "m " + seconds + "s ");

          if (distance < 0) {
            clearInterval(x);
            setDefaultDocumentIndex();
          }
        }, 1000);
      }

      $(document).on("click","#saveFeedback",function(event){
        event.preventDefault();
        let id = $("#feedbackId").val(),
        emationValue = $("ul li a.dout-active").attr("data-value"),
        msgFeedback = $("#form-contact-message").val(),
        visibilityTypeUser = $("#materialContactFormCopy").is(":checked"),
        tokenApp = userFeedback['tokenApp'],
        tokenUser = userFeedback['tokenUser'];

        dataFeedback = {
          'id': id,
          'emotion': emationValue,
          'comments': msgFeedback ,
          'userType': visibilityTypeUser,
          'tokenApp': tokenApp,
          'tokenUser': tokenUser
        };

        $.ajax({
          type: 'POST',
          data: {"operation":1,"feedback":dataFeedback},
          url: 'pages/crudFeedback.php',
          dataType: 'json',
          cache: false
        }).done(function(data,status){
          if (status == "success"){
            if(data.response)
              $("section#ClientFeedback").html('<div class="row">\
                <div class="col-12">\
                  <div class="mx-auto d-block" style="max-width:200px" >\
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.837 17.837" xml:space="preserve">\
                    <path style="fill:var(--dout-sucesses)" d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27 c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0 L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"/>\
                    </svg>\
                  </div>\
                </div>\
                <div class="col-12 text-center"><p><small>Your message has been sent!</small><br><small>Thanck you four your feedback</small></p></div>\
              </div>');
            else
              console.log("Error response", "An error in the file has been detected contact the manager");
          }else
            console.log("Error Request", "Your request is fail :(");
        }).fail(function(){
          console.log("Error Request", "Your request is fail :(");
        });
      });

      $(document).on("click","ul li",function(event){
        let currentTargetChild = $(this).children();

        if (!currentTargetChild.hasClass("dout-active"))
        {
          $(this).parent().each(function(index){
            $(this).children("li").children("a").removeClass("dout-active");
          });
          currentTargetChild.addClass("dout-active");
        }
      });
    </script>
</body>
</html>