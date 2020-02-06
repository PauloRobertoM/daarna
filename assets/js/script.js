(function($, window) {
    $('.owl-vitrine').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 0,
        nav: false,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
    $.fn.extend({
        threeBarToggle: function(options){
            var defaults = {
                color: 'black',
                width: 30,
                height: 25,
                speed: 400,
                animate: true
            }
            var options = $.extend(defaults, options); 
            return this.each(function(){
                $(this).empty().css({'width': options.width, 'height': options.height, 'background': 'transparent'});
                $(this).addClass('tb-menu-toggle');
                $(this).prepend('<i></i><i></i><i></i>').on('click', function(event) {
                    event.preventDefault();
                    $(this).toggleClass('tb-active-toggle');
                    if (options.animate) { $(this).toggleClass('tb-animate-toggle'); }
                    $('.tb-mobile-menu').slideToggle(options.speed);
                });
                $(this).children().css('background', options.color);
            });
        },
        accordionMenu: function(options){
            var defaults = {
                speed: 400
            }
            var options =  $.extend(defaults, options);
            return this.each(function(){
                $(this).addClass('tb-mobile-menu');
                var menuItems = $(this).children('li');
                menuItems.find('.sub-menu').parent().addClass('tb-parent');
                $('.tb-parent ul').hide();
                $('.tb-parent > a').on('click', function(event) {
                    event.stopPropagation();
                    event.preventDefault();
                    $(this).siblings().slideToggle(options.speed);
                });
            });
        }
    });
    $('#menu-toggle').threeBarToggle({color: 'white', width: 30, height: 25});
    $('#menu').accordionMenu();

    var Accordion = function() {
        var
        toggleItems,
        items;
        var _init = function() {
            toggleItems = document.querySelectorAll('.accordion__itemTitleWrap');
            toggleItems = Array.prototype.slice.call(toggleItems);
            items       = document.querySelectorAll('.accordion__item');
            items       = Array.prototype.slice.call(items);
            _addEventHandlers();
            TweenLite.set(items, {visibility:'visible'});
            TweenMax.staggerFrom(items, 0.9,{opacity:0, x:-100, ease:Power2.easeOut}, 0.3)
        }
        var _addEventHandlers = function() {
            toggleItems.forEach(function(element, index) {
                element.addEventListener('click', _toggleItem, false);
            });
        }
        var _toggleItem = function() {
            var parent = this.parentNode;
            var content = parent.children[1];
            if(!parent.classList.contains('is-active')) {
                parent.classList.add('is-active');
                TweenLite.set(content, {height:'auto'})
                TweenLite.from(content, 0.6, {height: 0, immediateRender:false, ease: Back.easeOut})
            } else {
                parent.classList.remove('is-active');
                TweenLite.to(content, 0.3, {height: 0, immediateRender:false, ease: Power1.easeOut})
            }
        }
        return {
            init: _init
        }
    }();
    Accordion.init();
})(jQuery, window);