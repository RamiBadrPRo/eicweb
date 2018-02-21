var navbar = document.getElementById('navbar');
var offset = navbar.offsetTop;
var indicators = '',
  innercar = '',
  pagefeed = '';
$(document).ready(function() {
  $("ul.navbar-nav a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function() {
        window.location.hash = hash;
      });
    }
  });

  $.getJSON('https://graph.facebook.com/709994655680083/photos?fields=images,created_time,name,link&limit=10&access_token=511886659188132|5BU1oHw2wiLW7ywWQurSCXIDwDU', function(data) {
    for (var i = 0; i < data.data.length; i++) {
      indicators += '<li data-target="#myCarousel" data-slide-to=' + i + '></li>';
      innercar += '<div class="item"><img src="' + data.data[i].images[0].source + '" style="height: 500px;"><div class="carousel-caption"><p>' + (data.data[i].name==undefined?'':data.data[i].name)+ '</p></div></div>';
    }
    });
    $.getJSON('https://graph.facebook.com/699733043372911/feed?limit=10&access_token=511886659188132|5BU1oHw2wiLW7ywWQurSCXIDwDU', function(data) {
      for (var i = 0; i < data.data.length; i++) {
        if (data.data[i].message == undefined) {
          break;
        }
        pagefeed += '<div class="media"><div class="media-left"><img src="res/img/logo.png" class="media-object img-circle" style="width:60px"></div><div class="media-body"><h2  class="media-heading">Ensak Informatics club  <i style="font-size: 14px">le ' + convertToDate(data.data[i].created_time) + '</i></h2><p>' + data.data[i].message + '</p></div></div>' + ((i == data.data.length) ? '' : '<hr>');
      }
    });
  $('div.thumbnail').mouseenter(function() {
    $(this).css('top', '-20px').css('box-shadow', '-5px 10px 5px #888888');

  });
  $('div.thumbnail').mouseleave(function() {
    $(this).css('top', '0px').css('box-shadow', '-3px 3px 2px #888888');
  });
  $('a.icon0').click(function(){
    $('#navbar > div > ul.nav.navbar-nav.navbar-right.shownav').toggle('slow','linear');
  })
});
$(document).ajaxComplete(function() {
  $('.carousel-indicators').html(indicators);
  $('.carousel-inner').html(innercar);
  console.log(indicators +'vdfd');
  $('.carousel-indicators li:first-child,.carousel-inner div:first-child').addClass('active');
  $('#block3').append(function() {
		$('#loadinggif').css("display","none");
		return pagefeed;
	;});
});

function stickyNav() {
  if (window.pageYOffset >= offset) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function isScrolledIntoView(elem) {
  var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();
  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();
  return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function convertToDate(a) {
  var months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
  var part1 = a.split('T')[0].split('-');
  return part1[2] + ' ' + months[part1[1] - 1] + ((part1[0] == '2017') ? '' : (', ' + part1[0]));
}
