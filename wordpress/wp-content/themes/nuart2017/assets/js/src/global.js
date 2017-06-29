(function($, document) {
    // globals
    // var touchDev = Modernizr.touch;

    // var breakpoint = {
    //     'small': 0,
    //     'mediumSmall': 440,
    //     'medium': 640,
    //     'large': 1024,
    //     'xlarge': 1200,
    //     'xxlarge': 1400,
    //     'xxxlarge': 1600,
    // }

    $(document).ready(function() {
        app.setup.bxSlider();
        app.setup.subMenuFix();
        app.setup.partnersModules();
        app.setup.cleanForm();
        app.click.mobileMenu();
        app.click.mobileLinks();
        app.click.desktopLinks();
        app.hovers.global();
        app.hovers.artistsModuleHolding();
        app.hovers.artistsModule();
        app.hovers.postsModule();

        if($('.module__map').length) {
            google.maps.event.addDomListener(window, 'load', app.map.init);
        }
    });

    $(window).load(function(){
        app.setup.hideOverlay();
        app.animations.subheaderLogo();
    })

    $(window).resize(function() {

    });
    
    $(window).scroll(function(event){
        app.setup.menuScroll();
    });


    var app = {
        lastScrollTop: 0,
        delta: 5,

        setup : {

            bxSlider : function() {
                if($('.module__carousel-container').length) {
                    $('.module__carousel-container').each(function(index) {
                        $(this).bxSlider({
                            adaptiveHeight: true,
                            pager: false
                        });
                    });
                }  
            },

            subMenuFix : function() {
                if($('.site-header__link--submenu').length) {
                    $('.site-header__link--submenu').each(function(index) {
                        $(this).append($(this).next('.site-header__sub-nav'));
                    });
                }
                
            },

            menuScroll : function() {
                var st = $(window).scrollTop();
                if(Math.abs(app.lastScrollTop - st) <= app.delta) {
                    return;
                }
                if (st > app.lastScrollTop){
                    if(st > 80) {
                        $('#main-header').css('height', 10);
                    }
                } else {
                    $('#main-header').css('height', 80);
                }
                app.lastScrollTop = st;
            },

            partnersModules : function() {
                if($('.module__partners').length) {
                    $('.module__partners:first').addClass('-state-first');
                    $('.module__partners:last').addClass('-state-last');
                }
            },

            cleanForm : function() {
                if($('.pirate_forms_thankyou_wrap').length) {
                    $('.pirate_forms ').find('input[type=text], input[type=email], textarea').val('');
                }
            },

            hideOverlay : function() {
                if($('#loading-overlay').length) {
                    $('#loading-overlay').css('display', 'none');
                    if(navigator.userAgent.indexOf('MSIE')!==-1 || navigator.appVersion.indexOf('Trident/') > 0){
                       $('body').css('overflow-y', 'scroll');
                    } else {
                        $('body').css('overflow-y', 'auto');
                    }
                }
            }
        },

        click : {
            mobileMenu : function() {
                $('body').on('click', '#hamburger-menu', function() {
                    if($(this).hasClass('is-active')) {
                        $(this).removeClass('is-active');
                        $('#mobile-nav').velocity('fadeOut', {
                            duration: 500,
                            complete: function() {
                                $('body').css('overflow-y', 'initial');
                                $('body').css('position', 'initial');
                                $('#main-header').css('overflow', 'hidden');
                            }
                        });
                    } else {
                        $(this).addClass('is-active');
                        $('#mobile-nav').velocity('fadeIn', {
                            duration: 500,
                            display: 'flex',
                            begin: function() {
                                $('body').css('overflow-y', 'hidden');
                                $('body').css('position', 'fixed');
                                $('#main-header').css('overflow', 'initial');
                            }
                        });
                    }
                })
            },

            mobileLinks : function() {
                $('body').on('click', '#mobile-nav .site-header__link', function() {
                    if($('#hamburger-menu').hasClass('is-active') && $(this).attr('href').indexOf('#') > -1 && window.location.href.indexOf($(this).attr('href').split('#')[0]) > -1) {
                        $('#hamburger-menu').removeClass('is-active');
                        $('#mobile-nav').velocity('fadeOut', {
                            duration: 500,
                            begin: function() {
                                    $('body').css('overflow-y', 'initial');
                                    $('body').css('position', 'initial');
                                    $('#main-header').css('overflow-y', 'hidden');
                            }
                        });
                    }
                });
            },

            desktopLinks : function() {
                $('body').on('click', '#full-nav .site-header__link', function(event) {
                    if($(this).attr('href').indexOf('#') > -1 && window.location.href.indexOf($(this).attr('href').split('#')[0]) > -1 && window.location.pathname == '/') {
                        event.preventDefault();
                        var fullUrl         = this.href;
                        var parts           = fullUrl.split('#');
                        var target          = parts[1];
                        var targetOffset    = $('#' + target).offset();
                        var targetTop       = targetOffset.top;
                        $('html, body').animate({scrollTop:targetTop}, 'slow');
                    } 
                });
            }
        },

        hovers : {
            global : function() {
                $('body')
                    .on('mouseenter', 'a, .pirate-forms-submit-button', function() {
                        $(this).addClass('-state-hover');
                    })
                    .on('mouseleave', 'a, .pirate-forms-submit-button', function() {
                        $(this).removeClass('-state-hover');
                    })
            },

            artistsModuleHolding : function() {
                $('.module__repeater-item--artist')
                    .on('mouseenter', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 0 },
                            { complete: function() {
                                    $(this).siblings('.module__repeater-item-content').css('z-index', 2)
                                }
                            }
                        );
                    })
                    .on('mouseleave', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 1 },
                            { begin: function() {
                                    $(this).siblings('.module__repeater-item-content').css('z-index', 0)
                                }
                            }
                        );
                    })
            },

            artistsModule : function() {
                $('.module__artists-item')
                    .on('mouseenter', function() {
                        $(this).children('.module__artists-item-image').velocity(
                            { opacity: 0 },
                            { complete: function() {
                                    $(this).siblings('.module__artists-item-content').css('z-index', 2)
                                }
                            }
                        );
                    })
                    .on('mouseleave', function() {
                        $(this).children('.module__artists-item-image').velocity(
                            { opacity: 1 },
                            { begin: function() {
                                    $(this).siblings('.module__artists-item-content').css('z-index', 0)
                                }
                            }
                        );
                    })
            },

            postsModule : function() {
                $('.module__posts-item')
                    .on('mouseenter', function() {
                        $(this).children('.module__posts-item-overlay').velocity('fadeIn', { display: 'flex' });
                    })
                    .on('mouseleave', function() {
                        $(this).children('.module__posts-item-overlay').velocity('fadeOut');
                    })
            }
        },

        animations : {
            subheaderLogo : function() {
                if($('#subheader-logo').length) {
                    $('#subheader-logo').velocity(
                        { opacity: 1 },
                        { delay: 1000, duration: 1000, easing: 'ease-in' }
                    )
                }
            }
        },

        map: {
            map: false,
            markers: [],
            infoWindow: false,
            bounds: false,

            init : function() {
                app.map.map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: $('#map-info').data('lat'), lng: $('#map-info').data('lng')},
                    zoom: 14,
                    scrollwheel: false,
                    styles: $('#map-info').data('style'),
                });
                app.map.infoWindow = new google.maps.InfoWindow({ maxWidth: 250 });
                app.map.infoWindow.addListener('closeclick', function() {
                    app.map.setZoom();
                });
                app.map.setMarkers();
            },

            setMarkers : function() {
                $('.module__map-info').each(function(index) {
                    var marker = new google.maps.Marker({
                        map: app.map.map,
                        title: $(this).data('name'),
                        position: { lat: $(this).data('lat'), lng: $(this).data('lng') },
                        icon: $('#map-info').data('marker')
                    })

                    app.map.markers.push(marker);

                    var infoContent = '<div class="module__map-box">' +
                        '<h1 class="module__map-box-title">' + $(this).data('name') + '</h1>' +
                        '<div class="module__map-box-body">' +
                        '<p class="module__map-box-description">' + $(this).data('info') + '</p>' +
                        '<img src="' + $(this).data('image') + '" class="module__map-box-image"' +
                        '</div>' + '</div>';

                    marker.addListener('click', function() {
                        app.map.infoWindow.setContent(infoContent);
                        app.map.infoWindow.open(map, marker);
                        app.map.map.setCenter(marker.getPosition());
                    });
                });

                app.map.setZoom();
            },

            setZoom : function() {
                app.map.bounds = app.map.markers.reduce(function(bounds, marker) {
                    return bounds.extend(marker.getPosition());
                }, new google.maps.LatLngBounds());

                app.map.map.setCenter(app.map.bounds.getCenter());
                app.map.map.fitBounds(app.map.bounds);
            }
        }
    }


}(jQuery, document));