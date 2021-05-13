
/*
These functions make sure WordPress
and Materialize play nice together.
*/
document.addEventListener('DOMContentLoaded', function() {

   //M.AutoInit();

   var elems = document.querySelectorAll('.sidenav');
   var instances = M.Sidenav.init(elems);
 });

 document.getElementById('skip_lnk').addEventListener('click', function(e) {
  e.preventDefault();
  var target = document.getElementById('skip-target');
  target.setAttribute('tabindex', '-1');
  target.focus();
});


function toggleSearch() {
  let searchInput = document.getElementById('search-input');
  let searchBox = document.getElementById('search');
  searchInput.classList.toggle("toggle-search");
  searchBox.focus();
}

function toggleTabSearch(evt) {
    var e = event || evt; // for trans-browser compatibility
    var charCode = e.which || e.keyCode;

    //alert(charCode);
    if (charCode == 9 ) {
        toggleSearch();
    }

    return true;
};


// Remove empty P tags created by WP inside of Accordion and Orbit
jQuery(document).ready(function() {

    $('.materialboxed').materialbox();
    $('.modal').modal({
     dismissible: true, // Modal can be dismissed by clicking outside of the modal
     opacity: .8, // Opacity of modal background
     inDuration: 300, // Transition in duration
     outDuration: 200, // Transition out duration
     startingTop: '0%', // Starting top style attribute
     endingTop: '15%', // Ending top style attribute
   }
 );

$(".dropdown-button").click(function(){
  $width = $("li.dropdown").width();
  $(".mdi-menu-down").toggleClass("rotate");
  $(".dropdown-content").toggleClass("block").css("min-width", $("li.dropdown").width());
});
$(".add-image").removeClass("button").addClass("btn");
$("textarea").addClass("materialize-textarea");
//$(".label").removeClass("label").addClass("chip");
// $(".field input[value='Report location']").addClass("btn");
//
//    var markers = document.querySelectorAll('input[type="checkbox"]'),
//        l = markers.length,
//        i, txt;
//    for (i = l - 1; i >= 0; i--) {
//        txt = markers[i].nextSibling;
//        $(txt).prev().attr('id', 'r' + markers[i].value);
//        $(txt).wrap('<label for="r' + markers[i].value + '"/>');
//    };


   $('body').on('click','a[href^="#"]',function(event){
       event.preventDefault();
       var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
       //change this number to create the additional off set
       var customoffset = $("header").height();
       $('html, body').animate({scrollTop:target_offset - customoffset}, 900);
   }); //replacing below function to work better on Edge, Firefox


   $('#plustext').on('click', function () {
       $('body, p, .chip').animate({'font-size': '+=5'});
   });

   $('#plustext_mob').on('click', function () {
       $('body, p, .chip').animate({'font-size': '+=5'});
   });

   $('#minustext').on('click', function () {
       $('body, p, .chip').animate({'font-size': '-=5'});
   });


   $('#minustext_mob').on('click', function () {
       $('body, p, .chip').animate({'font-size': '-=5'});
   });

   $('#close-modal').on('click', function () {
     $('#modal1').modal('close');
   });

   var contrast = document.getElementById('themeContrast');
//var contrast_mob = document.getElementById('themeContrast_mob');
var invertor = document.getElementById('inverter');


const toggle = document.querySelector('[aria-pressed]');

if(contrast) {
  contrast.addEventListener('click', (e) => {
   let pressed = e.target.getAttribute('aria-pressed') === 'true';
   e.target.setAttribute('aria-pressed', String(!pressed));
   if(!pressed) {
     invertor.setAttribute('media', 'screen');
     localStorage.setItem("theme", 'screen');
   } else {
     invertor.setAttribute('media', 'none');
     localStorage.setItem("theme", 'none');
   }
  invertor.textContent = invertor.textContent.trim();
  });

var savedTheme = localStorage.getItem("theme");
 if (savedTheme) {
   invertor.setAttribute("media", savedTheme);
   if (savedTheme == "screen") {
   //  checkbox.checked = true;
     contrast.setAttribute('aria-pressed', 'true');
   } else {
     //checkbox.checked = false;
     contrast.setAttribute('aria-pressed', 'false');
   }
}
}
 });
