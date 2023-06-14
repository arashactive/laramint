@extends('layouts.front.theme')


@section("content")

<style type="text/css">
    .portfolio-menu{
        text-align:center;
    }
    .portfolio-menu ul li{
        display:inline-block;
        margin:0;
        list-style:none;
        padding:10px 15px;
        cursor:pointer;
        -webkit-transition:all 05s ease;
        -moz-transition:all 05s ease;
        -ms-transition:all 05s ease;
        -o-transition:all 05s ease;
        transition:all .5s ease;
    }

    .portfolio-item{
        /*width:100%;*/
    }
    .portfolio-item .item{
        /*width:303px;*/
        float:left;
        margin-bottom:10px;
    }

</style>

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center my-2">
<!--                            <h4>Success Stories</h4>-->
                        </div>
                    </div>
                    <div class="portfolio-menu mt-2 mb-4">
                        <ul>
                            <li class="btn btn-outline-dark active" data-filter="*">All</li>
                            <li class="btn btn-outline-dark" data-filter=".delhi_trip">Delhi trip</li>
<!--                            <li class="btn btn-outline-dark" data-filter=".qutub_minar">Qutub Minar</li>-->
<!--                            <li class="btn btn-outline-dark" data-filter=".o-level">O Level</li>
                            <li class="btn btn-outline-dark" data-filter=".web-design">Web Designing</li>
                            <li class="btn btn-outline-dark text" data-filter=".selfie">selfie</li>-->
                        </ul>
                    </div>
                    <?php
                    $base_path = '../public';
                    $akshardham_dir = '/trips/akshardham/';
                    $qutub_minar_dir = '/trips/qutub-minar/';
                    ?>
                    <div class="portfolio-item row">
                        
                        <!-- akshardham images-->
                        <?php
                        
                        if(is_dir($base_path . $akshardham_dir)):
                            $akshardham_files = array_diff(scandir($base_path . $akshardham_dir), array('.', '..'));
                            shuffle($akshardham_files);
                            if (count($akshardham_files)):
                                foreach ($akshardham_files as $akshardham_file):
                                    ?>
                                    <div class="item delhi_trip col-lg-3 col-md-4 col-6 col-sm">
                                        <a href="<?php echo $akshardham_dir . $akshardham_file ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                                            <img class="img-fluid" src="<?php echo $akshardham_dir . $akshardham_file ?>" alt="">
                                        </a>
                                    </div>
                                <?php
                                endforeach;
                            endif;
                        endif;
                        ?>
                        <!-- akshardham images ends here-->
                        
                        <!-- qutub minar images-->
                        <?php
                        
                        if(is_dir($base_path . $qutub_minar_dir)):
                            $qutub_files = array_diff(scandir($base_path . $qutub_minar_dir), array('.', '..'));
                            shuffle($qutub_files);
                            if (count($qutub_files)):
                                foreach ($qutub_files as $qutub_file):
                                    ?>
                                    <div class="item delhi_trip col-lg-3 col-md-4 col-6 col-sm">
                                        <a href="<?php echo $qutub_minar_dir . $qutub_file ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                                            <img class="img-fluid" src="<?php echo $qutub_minar_dir . $qutub_file ?>" alt="">
                                        </a>
                                    </div>
                                <?php
                                endforeach;
                            endif;
                        endif;
                        ?>
                        <!-- qutub minar images ends here-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- About End -->


<script type="text/javascript">
    // $('.portfolio-item').isotope({
    //  	itemSelector: '.item',
    //  	layoutMode: 'fitRows'
    //  });
    $('.portfolio-menu ul li').click(function () {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return  false;
    });
    $(document).ready(function () {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>

@endsection