<?php
include('partials2v/landing_main_info.php');
$categories = (array) $lending->categories;
?>

<div class="wrapper-outer">
    <div class="scroll_btn_left">
        <div class="triangle_left">
            <div class="triangle"></div>
        </div>
    </div>
    <div class="wrapper-inner">
        <div class="tile">
            <div class="tile_first_row h480">
                <div class="tile_element w960 h480 x0 y0">
                    <!-- ultimate_class -->
                    <div class="ultimate_class" href="<?php echo $categories['child-1']->link_link;?>">
                        <video class="w960 h480" loop="loop" tabindex="0" preload="auto">
                            <source src="/fe/app/video/landing/MP4/UltimateClass_HoverState_Video.mp4"
                                    type='video/mp4;'/>
                        </video>
                    </div>
                    <!-- / ultimate_class -->
                </div>
                <div class="tile_element w720 h240 x960 y0">
                    <a href="<?php echo $categories['child-2']->link_link;?>">
                        <img src="/fe/app/images/landing/TE_30-A.png" class="w720 h240">
                    </a>
                </div>
                <div class="tile_element w720 h240 x960 y240">
                    <!-- power_class marckup -->
                    <div class="power_class w720 h240">
                        <img class="mapped w720 h240" src="/fe/app/images/landing/power_class_bg_all.png" alt=""
                             usemap="#map_power"/>
                        <map name="map_power" id="map_power" class="areas">
                            <area rel="1" alt="" title="" href="javascript:void(0)" shape="poly"
                                  coords="150,239,123,197,30,181,20,159,36,135,184,120,245,139,252,175,208,203,211,206,217,238"/>
                            <area rel="2" alt="" title="" href="javascript:void(0)" shape="poly"
                                  coords="248,239,244,204,290,192,254,133,181,100,180,59,376,54,387,97,346,147,346,190,366,219,366,238"/>
                            <area rel="3" alt="" title="" href="javascript:void(0)" shape="poly"
                                  coords="457,239,434,198,359,178,360,150,443,126,553,136,575,173,540,211,528,238"/>
                            <area rel="4" alt="" title="" href="javascript:void(0)" shape="poly"
                                  coords="563,238,570,202,589,184,582,142,507,116,463,102,479,55,694,54,699,137,689,239"/>
                        </map>
                        <div class="hover_data_div power_class_1 w720 h240">
                            <div class="power_class_img_cover w720 h240">
                                <img class="power_class_content_img w720 h240"
                                     src="/fe/app/images/landing/power_class_1.png"/>
                            </div>
                            <div class="content_cover w720 h240">
                                <h1>SFH 22-A</h1>
                                <div class="text">Power class hammer drill driver for universal applications.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-3']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div power_class_2 w720 h240">
                            <div class="power_class_img_cover w720 h240">
                                <img class="power_class_content_img w720 h240"
                                     src="/fe/app/images/landing/power_class_2.png"/>
                            </div>
                            <div class="content_cover w720 h240">
                                <h1>SIW 22T-A</h1>
                                <div class="text">Impact wrench delivering high torque with 3/4" connection.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-4']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div power_class_3 w720 h240">
                            <div class="power_class_img_cover w720 h240">
                                <img class="power_class_content_img w720 h240"
                                     src="/fe/app/images/landing/power_class_3.png"/>
                            </div>
                            <div class="content_cover w720 h240">
                                <h1>SF 22-A</h1>
                                <div class="text">Power class drill driver for universal applications.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-5']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div power_class_4 w720 h240">
                            <div class="power_class_img_cover w720 h240">
                                <img class="power_class_content_img w720 h240"
                                     src="/fe/app/images/landing/power_class_4.png"/>
                            </div>
                            <div class="content_cover w720 h240">
                                <h1>SIW 22T-A</h1>
                                <div class="text">Impact wrench delivering high torque with 1/2" connection.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-6']->link_link;?>">learn more</button>
                            </div>
                        </div>
                    </div>
                    <!-- / power_class marckup -->

                </div>
                <div class="tile_element w480 h480 x1680 y0">
                    <!-- compact_class marckup -->
                    <div class="compact_class w480 h480">
                        <img class="mapped w480 h480" src="/fe/app/images/landing/compact_class_bg_all.png" alt=""
                             usemap="#map_compact"/>
                        <map name="map_compact" id="map_compact" class="areas">
                            <area rel="1" shape="poly"
                                  coords="341, 428, 465, 429, 454, 354, 439, 348, 433, 291, 451, 267, 446, 213, 342, 208, 297, 231, 299, 253, 327, 275, 356, 296, 369, 335, 315, 375"/>
                            <area rel="2" shape="poly"
                                  coords="202, 350, 326, 343, 303, 266, 285, 256, 284, 203, 325, 179, 307, 126, 111, 138, 117, 178, 194, 205, 212, 268, 172, 294"/>
                            <area rel="3" shape="poly"
                                  coords="54, 423, 183, 423, 176, 346, 160, 335, 154, 288, 175, 269, 164, 209, 49, 207, 16, 236, 21, 269"/>
                        </map>
                        <div class="hover_data_div compact_class_1 w480 h480">
                            <div class="compact_class_img_cover w480 h480">
                                <img class="compact_class_content_img w480 h480"
                                     src="/fe/app/images/landing/compact_class_1.png"/>
                            </div>
                            <div class="content_cover w480 h480">
                                <h1>SIW 22-A</h1>
                                <div class="text">Compact Impact Wrench.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-9']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div compact_class_2 w480 h480">
                            <div class="compact_class_img_cover w480 h480">
                                <img class="compact_class_content_img w480 h480"
                                     src="/fe/app/images/landing/compact_class_2.png"/>
                            </div>
                            <div class="content_cover w480 h480">
                                <h1>SFC 22-A</h1>
                                <div class="text">Compact Drill Driver.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-8']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div compact_class_3 w480 h480">
                            <div class="compact_class_img_cover w480 h480">
                                <img class="compact_class_content_img w480 h480"
                                     src="/fe/app/images/landing/compact_class_3.png"/>
                            </div>
                            <div class="content_cover w480 h480">
                                <h1>SID 22-A</h1>
                                <div class="text">Compact Impact Driver.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-7']->link_link;?>">learn more</button>
                            </div>
                        </div>
                    </div>
                    <!-- / compact_class marckup -->
                </div>
                <div class="tile_element w720 h240 x2160 y0">
                    <a href="<?php echo $categories['child-10']->link_link;?>">
                        <img src="/fe/app/images/landing/ST_1800-A.png" class="w720 h240">
                    </a>
                </div>
                <div class="tile_element w720 h240 x2160 y240">
                    <a href="<?php echo $categories['child-11']->link_link;?>"><img src="/fe/app/images/landing/CIRCULAR.png" class="w720 h240"></a>
                </div>
                <div class="tile_element w960 h480 x2880 y0">
                    <a href="<?php echo $categories['child-12']->link_link;?>"><img src="/fe/app/images/landing/ROTARY.png" class="w960 h480"></a>
                </div>
            </div>
            <div class="tile_second_row h480">
                <div class="tile_element w720 h240 x0 y480">
                    <a href="<?php echo $categories['child-13']->link_link;?>"><img src="/fe/app/images/landing/RECIPROCATING.png" class="w720 h240"></a>
                </div>
                <div class="tile_element w720 h240 x0 y720">
                    <a href="<?php echo $categories['child-14']->link_link;?>"><img src="/fe/app/images/landing/DISPENSER.png" class="w720 h240"></a>
                </div>
                <div class="tile_element w480 h480 x720 y480">
                    <a href="<?php echo $categories['child-15']->link_link;?>"><img src="/fe/app/images/landing/DRYWALL.png" class="w480 h480"></a>
                </div>
                <div class="tile_element w720 h240 x1200 y480">
                    <a href="<?php echo $categories['child-16']->link_link;?>"><img src="/fe/app/images/landing/SFL_22-A.png" class="w720 h240"></a>
                </div>
                <div class="tile_element w720 h240 x1200 y720">
                    <a href="<?php echo $categories['child-17']->link_link;?>"><img src="/fe/app/images/landing/ANGLE.png" class="w720 h240"></a>
                </div>
                <div class="tile_element w960 h480 x1920 y480">
                    <!-- subcompact_class marckup -->
                    <div class="subcompact_class w960 h480">
                        <img class="mapped w960 h480" src="/fe/app/images/landing/subcompact_class_bg_all.png" alt=""
                             usemap="#map_subcompact"/>
                        <map name="map_subcompact" id="map_subcompact" class="areas">
                            <area rel="1" shape="poly"
                                  coords="148, 478, 101, 394, 45, 334, 20, 301, 30, 245, 163, 232, 269, 244, 296, 317, 249, 387, 250, 476, 250, 476"/>
                            <area rel="2" shape="poly"
                                  coords="147, 138, 156, 187, 290, 229, 329, 294, 343, 355, 293, 383, 285, 414, 307, 459, 483, 443, 461, 331, 421, 219, 495, 184, 464, 101, 297, 89"/>
                            <area rel="3" shape="poly"
                                  coords="459, 267, 471, 328, 552, 355, 578, 413, 605, 478, 716, 479, 711, 371, 760, 330, 750, 259, 724, 236, 567, 231"/>
                            <area rel="4" shape="poly"
                                  coords="575, 113, 575, 175, 738, 217, 762, 247, 800, 343, 731, 381, 764, 456, 935, 451, 917, 336, 883, 209, 948, 190, 929, 93, 733, 90"/>
                        </map>
                        <div class="hover_data_div subcompact_class_1 w960 h480">
                            <div class="subcompact_class_img_cover w960 h480">
                                <img class="subcompact_class_content_img w960 h480"
                                     src="/fe/app/images/landing/subcompact_class_1.png"/>
                            </div>
                            <div class="content_cover w960 h480">
                                <h1>SFD 2-A</h1>
                                <div class="text">Sub-compact Drill Driver with 1/4" HEX connection.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-18']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div subcompact_class_2 w960 h480">
                            <div class="subcompact_class_img_cover w960 h480">
                                <img class="subcompact_class_content_img w960 h480"
                                     src="/fe/app/images/landing/subcompact_class_2.png"/>
                            </div>
                            <div class="content_cover w960 h480">
                                <h1>SF 2-A</h1>
                                <div class="text">Sub-Compact Drill Driver.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-19']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div subcompact_class_3 w960 h480">
                            <div class="subcompact_class_img_cover w960 h480">
                                <img class="subcompact_class_content_img w960 h480"
                                     src="/fe/app/images/landing/subcompact_class_3.png"/>
                            </div>
                            <div class="content_cover w960 h480">
                                <h1>SID 2-A</h1>
                                <div class="text">Sub-Compact Impact Driver.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-20']->link_link;?>">learn more</button>
                            </div>
                        </div>
                        <div class="hover_data_div subcompact_class_4 w960 h480">
                            <div class="subcompact_class_img_cover w960 h480">
                                <img class="subcompact_class_content_img w960 h480"
                                     src="/fe/app/images/landing/subcompact_class_4.png"/>
                            </div>
                            <div class="content_cover w960 h480">
                                <h1>SF 2H-A</h1>
                                <div class="text">Sub-Compact Hammer Drill Driver.</div>
                                <button class="uppercase" data-href="<?php echo $categories['child-21']->link_link;?>">learn more</button>
                            </div>
                        </div>
                    </div>
                    <!-- / subcompact_class marckup -->
                </div>
                <div class="tile_element w480 h480 x2880 y480">
                    <a href="<?php echo $categories['child-22']->link_link;?>"><img src="/fe/app/images/landing/VACUUM.png" class="w480 h480"></a>
                </div>
                <div class="tile_element w480 h240 x3360 y480">
                    <a href="<?php echo $categories['child-23']->link_link;?>"><img src="/fe/app/images/landing/MEASURING.png" class="w480 h240"></a>
                </div>
                <div class="tile_element w480 h240 x3360 y720">
                    <a href="<?php echo $categories['child-24']->link_link;?>"><img src="/fe/app/images/landing/BX_3.png" class="w480 h240"></a>
                </div>
            </div>

        </div>
    </div>
    <div class="scroll_btn_right">
        <div class="triangle_right">
            <div class="triangle"></div>
        </div>
    </div>
</div>