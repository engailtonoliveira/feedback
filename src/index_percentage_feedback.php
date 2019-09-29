<?php
  require_once __DIR__ . '/vendor/autoload.php';

  use Classes\QueryFeedback;

  $feedback = new QueryFeedback();
  $feedback->setAllFeedbackGroupByEmotion();
  $barFeedback = $feedback->getAllFeedback();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">
  <title>Dout | Feedback</title>

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

  </style>
</head>
<body>
  	<div class="flex-center flex-column">
      <!-- Section: Contact v.3 -->
      <section class="contact-section my-5" style="max-width: 500px;">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a class="list-group-item" data-value="1">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.44 65.44" xml:space="preserve">
                <g id="group-3svg">
                  <path id="path-1_21_" style="fill: #e4352f;" d="M65.44,34.88c0,16.616-13.472,30.086-30.089,30.086
                    c-16.618,0-30.09-13.47-30.09-30.086S18.733,4.794,35.351,4.794C51.968,4.794,65.44,18.264,65.44,34.88z"></path>
                  <path id="path-2_21_" d="M45.647,23.775c0,2.01-1.63,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639
                    C44.017,20.136,45.647,21.765,45.647,23.775z"></path>
                  <path id="path-3_21_" d="M24.717,23.775c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.64-1.629-3.64-3.639s1.629-3.639,3.64-3.639
                    C23.088,20.136,24.717,21.765,24.717,23.775z"></path>
                  <path id="path-4_21_" d="M19.207,50.977c-0.829,0-1.5-0.672-1.5-1.5c0-6.473,5.209-11.739,11.611-11.739h5.055
                    c6.403,0,11.611,5.237,11.611,11.674c0,0.829-0.671,1.5-1.5,1.5c-0.829,0-1.5-0.671-1.5-1.5c0-4.783-3.863-8.674-8.611-8.674
                    h-5.055c-4.748,0-8.611,3.92-8.611,8.739C20.707,50.305,20.036,50.977,19.207,50.977z"></path>
                  <path id="path-5_21_" d="M31.589,63.645C14.171,63.645,0,49.476,0,32.059C0,14.643,14.171,0.474,31.589,0.474
                    c17.419,0,31.59,14.169,31.59,31.585C63.179,49.476,49.008,63.645,31.589,63.645z M31.589,3.474C15.825,3.474,3,16.297,3,32.059
                    c0,15.763,12.825,28.587,28.589,28.587c15.765,0,28.59-12.824,28.59-28.587C60.179,16.297,47.354,3.474,31.589,3.474z"></path>
                </g>
              </svg>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="list-group-item" data-value="2">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve">
                <path id="path-1_49_" style="fill: #fae613;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643
                  c-16.373,0-29.646-13.272-29.646-29.643c0-16.372,13.273-29.644,29.646-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"></path>
                <path id="path-2_49_" d="M45.778,43.768h-28c-0.828,0-1.5-0.672-1.5-1.5c0-0.829,0.672-1.5,1.5-1.5h28c0.828,0,1.5,0.671,1.5,1.5
                  C47.278,43.096,46.606,43.768,45.778,43.768z"></path>
                <path id="path-3_49_" d="M44.998,22.984c0,1.981-1.607,3.586-3.587,3.586c-1.98,0-3.586-1.605-3.586-3.586
                  c0-1.98,1.606-3.585,3.586-3.585C43.391,19.399,44.998,21.004,44.998,22.984z"></path>
                <path id="path-4_49_" d="M24.376,22.984c0,1.981-1.606,3.586-3.586,3.586c-1.981,0-3.586-1.605-3.586-3.586
                  c0-1.98,1.605-3.585,3.586-3.585C22.77,19.399,24.376,21.004,24.376,22.984z"></path>
                <path id="path-5_49_" d="M31.147,62.29C13.973,62.29,0,48.319,0,31.147S13.973,0.004,31.147,0.004s31.147,13.971,31.147,31.143
                  S48.321,62.29,31.147,62.29z M31.147,3.004C15.627,3.004,3,15.628,3,31.147s12.627,28.144,28.147,28.144
                  c15.521,0,28.147-12.625,28.147-28.144S46.668,3.004,31.147,3.004z"></path>
              </svg>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="list-group-item" data-value="3">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 65.441 65.441" style="enable-background:new 0 0 65.441 65.441;" xml:space="preserve">
                <path id="path-1_10_" style="fill:#EDC951;" d="M65.441,34.881c0,16.616-13.472,30.086-30.09,30.086S5.262,51.497,5.262,34.881
                  S18.733,4.795,35.351,4.795S65.441,18.265,65.441,34.881z"/>
                <path id="path-2_10_" d="M45.647,23.776c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.641-1.629-3.641-3.639s1.63-3.639,3.641-3.639
                  C44.018,20.137,45.647,21.766,45.647,23.776z"/>
                <path id="path-3_10_" d="M24.718,23.776c0,2.01-1.629,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639
                  C23.089,20.137,24.718,21.766,24.718,23.776z"/>
                <path id="path-4_10_" d="M34.374,50.737h-5.055c-6.403,0-11.611-5.145-11.611-11.469c0-0.829,0.671-1.5,1.5-1.5
                  c0.828,0,1.5,0.671,1.5,1.5c0,4.749,3.782,8.469,8.611,8.469h5.055c4.828,0,8.611-3.658,8.611-8.329c0-0.829,0.671-1.5,1.5-1.5
                  c0.828,0,1.5,0.671,1.5,1.5C45.985,45.761,40.885,50.737,34.374,50.737z"/>
                <path id="path-5_10_" d="M31.59,63.646C14.171,63.646,0,49.477,0,32.06C0,14.644,14.171,0.475,31.59,0.475
                  c17.418,0,31.59,14.169,31.59,31.585C63.18,49.477,49.008,63.646,31.59,63.646z M31.59,3.475C15.825,3.475,3,16.298,3,32.06
                  c0,15.763,12.825,28.587,28.59,28.587c15.764,0,28.59-12.824,28.59-28.587C60.18,16.298,47.354,3.475,31.59,3.475z"/>
              </svg>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="list-group-item" data-value="4">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve">
                <path id="path-1_32_" style="fill:#2fca35;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643
                  c-16.373,0-29.647-13.272-29.647-29.643c0-16.372,13.274-29.644,29.647-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"/>
                <path id="path-2_32_" style="fill:#fff;" d="M50.098,41.768c0,6.999-5.393,10.999-12.047,10.999h-6.023
                  c-6.652,0-12.045-4-12.045-10.999H50.098z"/>
                <path id="path-3_32_" d="M34.346,51.767h-6.023c-7.47,0-13.547-5.607-13.547-12.499c0-0.828,0.672-1.5,1.5-1.5h30.116
                  c0.828,0,1.5,0.672,1.5,1.5C47.892,46.16,41.815,51.767,34.346,51.767z M17.908,40.768c0.801,4.528,5.166,7.999,10.415,7.999
                  h6.023c5.248,0,9.614-3.471,10.414-7.999H17.908z"/>
                <path id="path-4_32_" d="M44.997,22.985c0,1.98-1.605,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586
                  c0-1.981,1.606-3.586,3.587-3.586C43.392,19.399,44.997,21.004,44.997,22.985z"/>
                <path id="path-5_32_" d="M24.376,22.985c0,1.98-1.606,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586
                  c0-1.981,1.606-3.586,3.587-3.586C22.77,19.399,24.376,21.004,24.376,22.985z"/>
                <path id="path-6_27_" d="M31.147,62.29C13.972,62.29,0,48.319,0,31.147S13.972,0.004,31.147,0.004
                  c17.174,0,31.147,13.971,31.147,31.143S48.321,62.29,31.147,62.29z M31.147,3.004C15.626,3.004,3,15.629,3,31.147
                  c0,15.519,12.626,28.144,28.147,28.144c15.52,0,28.147-12.625,28.147-28.144C59.294,15.629,46.667,3.004,31.147,3.004z"/>
              </svg>
            </a>
          </li>
        </ul> 
        <canvas id="barChart"></canvas>
      </section>
      <!-- Section: Contact v.3 -->
  	</div>
  	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="js/popper.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
      var bar = <?= json_encode($barFeedback);?>;

      $(document).ready(function() {
        var objBar = buildBar();
        init_bar_chart(objBar);
      });

      function init_bar_chart(objBar)
      {
        var ctxA = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxA, {
            type: 'bar',
            data: {
                labels: objBar['labels'],
                datasets: [{
                    /*label: '# of Votes',*/
                    data: objBar['data'],
                    backgroundColor: objBar['backgroundColor'],
                    borderColor: objBar['borderColor'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                legend:
                {
                  display: false
                }
            }
        });
      }

      function buildBar(){

        let emotion = [],
          num = [],
          backgroundColor = [],
          color = [],
          i = 0,
          lengthArray = bar.length;

        for(i = 0; i < lengthArray; i++)
        {
          emotion.push(bar[i]["emotion"]);
          num.push(bar[i]["num"]);
          backgroundColor.push(bar[i]["backgroundColor"]);
          color.push(bar[i]["color"]);

        }
        console.log(color);
        return {'labels':emotion,'data':num,'backgroundColor':backgroundColor,'borderColor':color};
      }
    </script>
</body>
</html>