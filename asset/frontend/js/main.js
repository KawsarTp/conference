(function ($) {
  "user strict";
    // Preloader Js
    $(window).on('load', function () {
      $('.preloader').fadeOut(500);
      background();
    });
    $(document).ready(function () {
        // Lightcase 
        $('a[data-rel^=lightcase]').lightcase();
        //wow.min.js
        var wow = new WOW({
          boxClass: 'wow',
          animateClass: 'animated',
          offset: 0,
          mobile: true,
          live: true,
          callback: function (box) {},
          scrollContainer: null
        });
        wow.init();
        //Header Bar
        $(document).on('click', '.header-bar', function() {
          $(this).toggleClass('active');
          $('.overlay').toggleClass('active');
          $('.menu').toggleClass('active');
        })
        $(document).on('click', '.overlay', function() {
          $(this).removeClass('active');
          $('.header-bar').removeClass('active');
          $('.menu').removeClass('active');
        })
        //Menu Dropdown Icon Adding
        $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
        // drop down menu width overflow problem fix
        $('ul').parent().hover(function () {
          var menu = $(this).find("ul");
          var menupos = $(menu).offset();
          if (menupos.left + menu.width() > $(window).width()) {
            var newpos = -$(menu).width();
            menu.css({
              left: newpos
            });
          }
        });
        //mobile drodown menu display
        $('.menu li a').on('click', function (e) {
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
              element.removeClass('open');
              element.find('li').removeClass('open');
              element.find('ul').slideUp(300, "swing");
            } else {
              element.addClass('open');
              element.children('ul').slideDown(300, "swing");
              element.siblings('li').children('ul').slideUp(300, "swing");
              element.siblings('li').removeClass('open');
              element.siblings('li').find('li').removeClass('open');
              element.siblings('li').find('ul').slideUp(300, "swing");
            }
        });
        //Count Down JAva Script
        $('.banner-countdown').countdown({
              date: '12/27/2019 05:00:00',
              offset: +2,
              day: 'Day',
              days: 'Days'
            },
            function () {
              alert('Done!');
        });
        // Scroll To Top 
        var scrollTop = $(".scrollToTop");
        $(window).on('scroll', function () {
          if ($(this).scrollTop() < 500) {
            scrollTop.removeClass("active");
          } else {
            scrollTop.addClass("active");
          }
        });
        // Header Sticky Here
        var fixed_top_three = $(".header-section");
        $(window).on('scroll', function () {
          if ($(this).scrollTop() < 1) {
            fixed_top_three.removeClass("active");
          } else {
            fixed_top_three.addClass("active");
          }
        });
        //client slider
        var owl = $('.client-slider');
        owl.owlCarousel({
            margin: 0,
            nav: true,
            loop: true,
            items: 1,
        })
        //Blockquote slider
        var owl = $('.blockquote-slider');
        owl.owlCarousel({
            margin: 0,
            nav: true,
            loop: true,
            items: 1,
        })
        //Reply Button
        $(document).on('click', '.btn-one', function () {
            $(".reply-one").toggleClass("active");
        });
        $(document).on('click', '.btn-two', function () {
            $(".reply-two").toggleClass("active");
        });
        $('.faq-wrapper .faq-title').on('click', function (e) {
          var element = $(this).parent('.faq-item');
          if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('.faq-content').removeClass('open');
            element.find('.faq-content').slideUp(300, "swing");
          } else {
            element.addClass('open');
            element.children('.faq-content').slideDown(300, "swing");
            element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
            element.siblings('.faq-item').removeClass('open');
            element.siblings('.faq-item').find('.faq-title').removeClass('open');
            element.siblings('.taq-item').find('.faq-content').slideUp(300, "swing");
          }
        });
        //The Password Show
        $(document).on('click', '.show-pass-one', function () {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        });
        //The Password Show
        $(document).on('click', '.show-pass-two', function () {
          var x = document.getElementById("myInputTwo");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        });
    });
    //Create Background Image
    function background() {
      var img = $('.bg_img');
      img.css('background-image', function () {
        var bg = ('url(' + $(this).data('background') + ')');
        return bg;
      });
    }
    //Detect Closest Edge Start
    function closestEdge(x, y, w, h) {
      var topEdgeDist = distMetric(x, y, w / 2, 0);
      var bottomEdgeDist = distMetric(x, y, w / 2, h);
      var leftEdgeDist = distMetric(x, y, 0, h / 2);
      var rightEdgeDist = distMetric(x, y, w, h / 2);
      var min = Math.min(topEdgeDist, bottomEdgeDist, leftEdgeDist, rightEdgeDist);
      switch (min) {
        case leftEdgeDist:
          return "left";
        case rightEdgeDist:
          return "right";
        case topEdgeDist:
          return "top";
        case bottomEdgeDist:
          return "bottom";
      }
    }
    //Distance Formula
    function distMetric(x, y, x2, y2) {
      var xDiff = x - x2;
      var yDiff = y - y2;
      return (xDiff * xDiff) + (yDiff * yDiff);
    }
    var boxes = document.querySelectorAll(".speaker-inner");
    for (var i = 0; i < boxes.length; i++) {
      boxes[i].onmouseenter = function (e) {
        var x = e.pageX - this.offsetLeft;
        var y = e.pageY - this.offsetTop;
        var edge = closestEdge(x, y, this.clientWidth, this.clientHeight);
        var overlay = this.childNodes[1];
        var image = this.childNodes[0];
        switch (edge) {
          case "left":
            //tween overlay from the left
            overlay.style.top = "0%";
            overlay.style.left = "-100%";
            TweenMax.to(overlay, .5, {
              left: '0%'
            });
            TweenMax.to(image, .5, {
              scale: 1.2
            });
            break;
          case "right":
            overlay.style.top = "0%";
            overlay.style.left = "100%";
            //tween overlay from the right
            TweenMax.to(overlay, .5, {
              left: '0%'
            });
            TweenMax.to(image, .5, {
              scale: 1.2
            });
            break;
          case "top":
            overlay.style.top = "-100%";
            overlay.style.left = "0%";
            //tween overlay from the right
            TweenMax.to(overlay, .5, {
              top: '0%'
            });
            TweenMax.to(image, .5, {
              scale: 1.2
            });
            break;
          case "bottom":
            overlay.style.top = "100%";
            overlay.style.left = "0%";
            //tween overlay from the right
            TweenMax.to(overlay, .5, {
              top: '0%'
            });
            TweenMax.to(image, .5, {
              scale: 1.2
            });
            break;
        }
      };
      boxes[i].onmouseleave = function (e) {
        var x = e.pageX - this.offsetLeft;
        var y = e.pageY - this.offsetTop;
        var edge = closestEdge(x, y, this.clientWidth, this.clientHeight);
        var overlay = this.childNodes[1];
        var image = this.childNodes[0];
        switch (edge) {
          case "left":
            TweenMax.to(overlay, .5, {
              left: '-100%'
            });
            TweenMax.to(image, .5, {
              scale: 1.0
            });
            break;
          case "right":
            TweenMax.to(overlay, .5, {
              left: '100%'
            });
            TweenMax.to(image, .5, {
              scale: 1.0
            });
            break;
          case "top":
            TweenMax.to(overlay, .5, {
              top: '-100%'
            });
            TweenMax.to(image, .5, {
              scale: 1.0
            });
            break;
          case "bottom":
            TweenMax.to(overlay, .5, {
              top: '100%'
            });
            TweenMax.to(image, .5, {
              scale: 1.0
            });
            break;
        }
      };
    }
    //End 

    //Select
  $('#select-cata').each(function () {
    var $this = $(this), numberOfOptions = $(this).children('option').length;

    $this.addClass('select-hidden');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());

    var $list = $('<ul />', {
      'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
      $('<li />', {
        text: $this.children('option').eq(i).text(),
        rel: $this.children('option').eq(i).val()
      }).appendTo($list);
    }

    var $listItems = $list.children('li');
    $styledSelect.click(function (e) {
      e.stopPropagation();
      $('div.select-styled.active').not(this).each(function () {
        $(this).removeClass('active').next('ul.select-options').hide();
      });
      $(this).toggleClass('active').next('ul.select-options').toggle();
    });
    $listItems.click(function (e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass('active');
      $this.val($(this).attr('rel'));
      $list.hide();
      //console.log($this.val());
    });
    $(document).click(function () {
      $styledSelect.removeClass('active');
      $list.hide();
    });
  });

  //Tab Section
  $('.tab ul.tab-menu').addClass('active').find('> li:eq(0)').addClass('active');

  $('.tab ul.tab-menu li').click(function (g) {
    var tab = $(this).closest('.tab'),
      index = $(this).closest('li').index();
    tab.find('li').siblings('li').removeClass('active');
    $(this).closest('li').addClass('active');
    tab.find('.tab-area').find('div.tab-item').not('div.tab-item:eq(' + index + ')').hide();
    tab.find('.tab-area').find('div.tab-item:eq(' + index + ')').show();
    g.preventDefault();
  });

})(jQuery);