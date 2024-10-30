(function ($) {

  'use strict';

  $(document).on('ready', function() {
    lineChart();
    roundChart();
  });

  $.exists = function(selector) {
    return ($(selector).length > 0);
  }
  if ($.exists('#mama-ball-wrap')) {
    // Some random colors
    const colors = ['#3CC157', '#2AA7FF', '#FCBC0F', '#F85F36'];

    const numBalls = 40;
    const balls = [];

    for (let i = 0; i < numBalls; i++) {
      let ball = document.createElement('div');
      ball.classList.add('mama-ball');
      ball.style.background = colors[Math.floor(Math.random() * colors.length)];
      ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
      ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
      ball.style.transform = `scale(${Math.random()})`;
      ball.style.width = `${Math.random()}em`;
      ball.style.height = ball.style.width;

      balls.push(ball);
      document.getElementById('mama-ball-wrap').append(ball);
    }

    // Keyframes
    balls.forEach((el, i, ra) => {
      let to = {
        x: Math.random() * (i % 2 === 0 ? -11 : 11),
        y: Math.random() * 12
      };

      let anim = el.animate(
        [
          { transform: 'translate(0, 0)' },
          { transform: `translate(${to.x}rem, ${to.y}rem)` }
        ], {
          duration: (Math.random() + 1) * 2000, // random duration
          direction: 'alternate',
          fill: 'both',
          iterations: Infinity,
          easing: 'ease-in-out'
        }
      );
    });
  }


  /*--------------------------------------------------------------
    ## Swiper Slider
  --------------------------------------------------------------*/

    $('.mama-slider').each(function() {

      // Slick Variable
      var $ts = $(this).find('.slick-container');
      var $slickActive = $(this).find('.slick-wrapper');

      // Auto Play
      var autoPlayVar = parseInt($ts.attr('data-autoplay'), 10);
      // Auto Play Time Out
      var autoplaySpdVar = 3000;
      if (autoPlayVar > 1) {
        autoplaySpdVar = autoPlayVar;
        autoPlayVar = 1;
      }
      // Slide Change Speed
      var speedVar = parseInt($ts.attr('data-speed'), 10);
      // Slider Loop
      var loopVar = Boolean(parseInt($ts.attr('data-loop'), 10));
      // Slider Center
      var centerVar = Boolean(parseInt($ts.attr('data-center'), 10));
      // Pagination
      var paginaiton = $(this).children().hasClass('pagination');
      // Slide Per View
      var slidesPerView = $ts.attr('data-slides-per-view');
      if (slidesPerView == 1) {
        slidesPerView = 1;
      }
      if (slidesPerView == 'responsive') {
        var slidesPerView = parseInt($ts.attr('data-add-slides'), 10);
        var lgPoint = parseInt($ts.attr('data-lg-slides'), 10);
        var mdPoint = parseInt($ts.attr('data-md-slides'), 10);
        var smPoint = parseInt($ts.attr('data-sm-slides'), 10);
        var xsPoing = parseInt($ts.attr('data-xs-slides'), 10);
      }

      // Fade Slider
      var fadeVar = parseInt($($ts).attr('data-fade-slide'));
      (fadeVar === 1) ? (fadeVar = true) : (fadeVar = false);


      // Slick Active Code
      $slickActive.slick({
        autoplay: autoPlayVar,
        dots: paginaiton,
        centerPadding: '0',
        speed: speedVar,
        infinite: loopVar,
        autoplaySpeed: autoplaySpdVar,
        centerMode: centerVar,
        prevArrow: $(this).find('.slick-arrow-left'),
        nextArrow: $(this).find('.slick-arrow-right'),
        appendDots: $(this).find('.pagination'),
        fade: fadeVar,
        slidesToShow: slidesPerView,
        variableWidth: false,
        responsive: [{
          breakpoint: 1600,
          settings: {
            slidesToShow: lgPoint
          }
        },
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: mdPoint
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: smPoint
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: xsPoing
            }
          }
        ]
      });
    })

  /*--------------------------------------------------------------
  ## Line Chart
--------------------------------------------------------------*/

  function lineChart() {

    if ($.exists('#mama-chart2')) {

      var selector = $('.mama-line-chart'),
          el = selector.data('values'),
          labels = $.parseJSON(el.view_labels),
          data = $.parseJSON(el.view_data),
          y_axis_label = selector.data('y-label'),
          bg_color = selector.data('bg-color'),
          border_color = selector.data('border-color');

      var ctx = document.getElementById('mama-chart2').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: y_axis_label,
            data: data,
            backgroundColor: bg_color,
            borderColor: border_color,
            borderWidth: 2,
            lineTension: 0,
            pointBackgroundColor: '#fff'
          }]

        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            position: 'bottom',
            display: false
          },
          tooltips: {
            displayColors: false,
            mode: 'nearest',
            intersect: false,
            position: 'nearest',
            xPadding: 8,
            yPadding: 8,
            caretPadding: 8,
            backgroundColor: '#666666',
            cornerRadius: 2,
            titleFontSize: 13,
            titleFontStyle: 'normal',
            titleFontFamily: 'Open Sans',
            bodyFontSize: 13,
            footerFontFamily: 'Open Sans'
          },
          scales: {
            yAxes: [{
              ticks: {
                fontSize: 14,
                fontColor: '#b5b5b5',
                fontFamily: 'Open Sans',
                padding: 15,
                beginAtZero: true,
                autoSkip: false,
                maxTicksLimit: 4
              },
              gridLines: {
                color: '#d8d8d8',
                borderDash: [1, 3],
                zeroLineWidth: 1,
                zeroLineColor: '#eaeaea',
                drawBorder: false
              }
            }],
            xAxes: [{
              ticks: {
                fontSize: 14,
                fontColor: '#b5b5b5',
                fontFamily: 'Open Sans',
                padding: 5,
                beginAtZero: true,
                autoSkip: false,
                maxTicksLimit: 4
              },
              gridLines: {
                color: '#d8d8d8',
                borderDash: [1, 3],
                zeroLineColor: '#b5b5b5',
              }
            }],
          },
          elements: {
            point: {
              radius: 3,
              hoverRadius: 3
            }
          }
        }
      });
    }
  }


  /*--------------------------------------------------------------
    ## Round Chart
  --------------------------------------------------------------*/

  function roundChart() {
    if ($.exists('.mama-round-chart')) {

      $('.mama-round-chart').each(function() {
        var ctx = $(this).find('#mama-chart1'),
            el = $(this),
            options = el.data('options'),
            labels = {},
            values = [],
            stroke_colors = [];

        $.each(options, function(key, value) {
          labels[key] = value['label'];
          values[key] = parseInt(value['value']);
          stroke_colors[key] = value['stroke_color'];
          el.find('.mama-circle-stroke .mama-circle-label').eq(key).html(value['label']).siblings().css('background-color', value['stroke_color']);
        });

        var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: labels,
            datasets: [{
              backgroundColor: stroke_colors,
              data: values,
              borderWidth: 0
            }]
          },
          options: {
            cutoutPercentage: 80,
            legend: {
              position: 'right',
              display: false
            },
            tooltips: {
              displayColors: false,
              mode: 'nearest',
              intersect: false,
              position: 'nearest',
              xPadding: 8,
              yPadding: 8,
              caretPadding: 8,
              backgroundColor: '#666666',
              cornerRadius: 2,
              titleFontSize: 13,
              titleFontStyle: 'normal',
              titleFontFamily: 'Open Sans',
              bodyFontSize: 13,
              footerFontFamily: 'Open Sans'
            },
          }
        });

      });
    }
  }

})(jQuery);