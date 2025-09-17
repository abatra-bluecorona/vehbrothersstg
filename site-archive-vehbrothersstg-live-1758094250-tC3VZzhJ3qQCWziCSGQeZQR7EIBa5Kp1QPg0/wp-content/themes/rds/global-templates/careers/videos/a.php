<?php 
$youtubeItems = $args['page_templates']['career_page']['video']['items']; 
$videoCount = count($youtubeItems);
?>

<div class="row">
    <div class="col-lg-12">
        <h4 class="text-center pt-lg-2"><?php echo $args['page_templates']['career_page']['video']['heading'];?></h4>
        
        <?php if ($videoCount == 1): ?>
            <div class="row justify-content-center">
         <div class="col-lg-6 col-md-6 mb-md-5 mb-sm-5 mb-3">
            <div class="single-video text-center iframe_width">
                <iframe class="responsive-iframe" width="100%" height="305" src="<?php echo $youtubeItems[0]['video_url']; ?>" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
            </div>
        </div>
        <?php elseif ($videoCount == 2): ?>
            <div class="swiper video-swipernew py-md-5 py-lg-2 mb-lg-0 mb-5 mb-md-0  pt-3 pt-lg-3 pt-md-0">
                <div class="swiper-wrapper py-md-5 py-lg-4 mb-lg-0 mb-5 mb-md-0">
    
                <?php foreach ($youtubeItems as $value): ?>
                    <div class="col-lg-6 swiper-slide iframe_width">
                            <iframe class="responsive-iframe"  width="100%" height="305" src="<?php echo $value['video_url']; ?>" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                        </div>
                <?php endforeach; ?>
                </div>
                <div class="swiper-pagination career-video-pagination pagination-variation-a position-relative pb-lg-3 d-lg-none mt-5"></div>
                <div class="swiper-button-prev video_prev text_36 line_height_36 d-md-none d-block"><i class="icon-chevron-left1 true_black d-md-block d-block"></i></div>
                <div class="swiper-button-next video_next text_36 line_height_36 d-md-none d-block"><i class="icon-chevron-right1 true_black d-md-block d-block"></i></div>
            </div>
        <?php else: ?>
            <div class="swiper video-swiper py-md-5 py-lg-2 mb-lg-0 mb-5 mb-md-0 pt-3 pt-lg-3 pt-md-0">
                <div class="swiper-wrapper py-md-5 py-lg-4 mb-lg-0 mb-5 mb-md-0 ">
                    <?php foreach ($youtubeItems as $value): ?>
                        <div class="swiper-slide iframe_width">
                            <iframe class="responsive-iframe" width="100%" height="205" src="<?php echo $value['video_url']; ?>" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination career-video-pagination pagination-variation-a position-relative pb-lg-3 d-lg-none mt-5"></div>
                <div class="swiper-button-prev video_prev text_36 line_height_36 d-md-block d-block"><i class="icon-chevron-left1 true_black d-md-block d-block"></i></div>
                <div class="swiper-button-next video_next text_36 line_height_36 d-md-block d-block"><i class="icon-chevron-right1 true_black d-md-block d-block"></i></div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php 
if(is_admin()){?> 

    
    <script>
        var videoCount = <?php echo $videoCount; ?>;
        var players = [];
        var videoSwiper, videoSwiper2; // Declare the swiper variables here
    
            if (videoCount >= 3) {
                videoSwiper = new Swiper('.video-swiper', {
                    slidesPerView: 1,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    centeredSlides: true,
                    pagination: {
                        el: '.career-video-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 3
                        }
                    }
                });
                function onYouTubeIframeAPIReady() {
            document.querySelectorAll('.video-swiper iframe').forEach(function (iframe) {
                var player = new YT.Player(iframe, {
                    events: {
                        'onStateChange': function(event) {
                            if (event.data === YT.PlayerState.PLAYING) {
                                if (videoCount >= 3 && videoSwiper) {
                                    videoSwiper.autoplay.stop();
                                } else if (videoCount == 2 && videoSwiper2) {
                                    videoSwiper2.autoplay.stop();
                                }
                            }
                        }
                    }
                });
                players.push(player);
            });
        }
                videoSwiper.on('slideChange', function () {
                    players.forEach(function(player) {
                        player.pauseVideo();
                    });
                });
            } else if (videoCount == 2) {
                videoSwiper2 = new Swiper('.video-swipernew', {
                    slidesPerView: 1,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: '.career-video-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 2,
                            loop: false,
                            spaceBetween: 30,
                            noSwiping: true,
                            allowSlidePrev: false,
                            allowSlideNext: false,
                        }
                    }
                });
    
                videoSwiper2.on('slideChange', function () {
                    players.forEach(function(player) {
                        player.pauseVideo();
                    });
                });
            }
        
    
        
    
        
    </script>
    <script src="https://www.youtube.com/iframe_api"></script>
<?php 
} else {
?> 
<?php if ($videoCount >= 2): ?>
    
<script>
    var videoCount = <?php echo $videoCount; ?>;
    var players = [];
    var videoSwiper, videoSwiper2; // Declare the swiper variables here

    function initializeSwipers() {
        if (videoCount >= 3) {
            videoSwiper = new Swiper('.video-swiper', {
                slidesPerView: 1,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                centeredSlides: true,
                pagination: {
                    el: '.career-video-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 3
                    }
                }
            });

            videoSwiper.on('slideChange', function () {
                players.forEach(function(player) {
                    player.pauseVideo();
                });
            });
        } else if (videoCount == 2) {
            videoSwiper2 = new Swiper('.video-swipernew', {
                slidesPerView: 1,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.career-video-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2,
                        loop: false,
                        spaceBetween: 30,
                        noSwiping: true,
                        allowSlidePrev: false,
                        allowSlideNext: false,
                    }
                }
            });

            videoSwiper2.on('slideChange', function () {
                players.forEach(function(player) {
                    player.pauseVideo();
                });
            });
        }
    }

    function onYouTubeIframeAPIReady() {
        document.querySelectorAll('.video-swiper iframe, .video-swipernew iframe').forEach(function (iframe) {
            var player = new YT.Player(iframe, {
                events: {
                    'onStateChange': function(event) {
                        if (event.data === YT.PlayerState.PLAYING) {
                            if (videoCount >= 3 && videoSwiper) {
                                videoSwiper.autoplay.stop();
                            } else if (videoCount == 2 && videoSwiper2) {
                                videoSwiper2.autoplay.stop();
                            }
                        }
                    }
                }
            });
            players.push(player);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initializeSwipers();
    });
</script>
<script src="https://www.youtube.com/iframe_api"></script>
<?php endif; ?>

<?php } ?>