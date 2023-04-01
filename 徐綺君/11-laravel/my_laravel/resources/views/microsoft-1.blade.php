@extends('template')

    @section('pageTitle')
        microsoft
    @endsection

    @section('main')
        <div class="m">

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide main_img">
                        <picture class="m_img">
                            <source class="m_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Hero-Surface-Pro-8-with-TypeCover:VP5-1920x600">
                            <source class="m_img" media="(min-width: 1084px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Hero-Surface-Pro-8-with-TypeCover:VP4-1399x600">
                            <source class="m_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Hero-Surface-Pro-8-with-TypeCover:VP3-1083x600">
                            <source class="m_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Hero-Surface-Pro-8-with-TypeCover:VP2-859x540">
                            <img class="m_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Hero-Surface-Pro-8-with-TypeCover:VP1-539x440">
                        </picture>
                        <div class="m_text_box">
                            <div class="container m_text_1">
                                <div class="m_text">
                                    <div class="text_box2 text_box2_1">Surface Pro 8</div>
                                    <div class="text_box3">運用更大的 13 吋觸控螢幕、更快的連線，以及提升的速度，成就更多。現在提供 Windows 11。</div>
                                    <div class="text_btn">深入了解</div>
                                </div>
                            </div>
                        </div>
                        <div class="m_text_back">
                            <div class="m_text m_text_1">
                                <div class="text_box2">Surface Pro 8</div>
                                <div class="text_box3">運用更大的 13 吋觸控螢幕、更快的連線，以及提升的速度，成就更多。現在提供 Windows 11。</div>
                                <div class="text_btn">深入了解</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide main_img">
                        <picture class="m_img">
                            <source class="m_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Surface-Laptop-Go-2-01-M01:VP5-1920x600">
                            <source class="m_img" media="(min-width: 1084px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Surface-Laptop-Go-2-01-M01:VP4-1399x600">
                            <source class="m_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Surface-Laptop-Go-2-01-M01:VP3-1083x600">
                            <source class="m_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Surface-Laptop-Go-2-01-M01:VP2-859x540">
                            <img class="m_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Highlight-Surface-Laptop-Go-2-01-M01:VP1-539x440">
                        </picture>
                        <div class="m_text_box">
                            <div class="container">
                                <div class="m_text">
                                    <div class="text_box1"> 新上市</div>
                                    <div class="text_box2"> Surface Laptop Go 2</div>
                                    <div class="text_box3">外型時尚的筆記型電腦配備 12.4 吋觸控螢幕、絕佳的打字體驗，以及改良的 HD 相機</div>
                                    <div class="text_btn">深入了解</div>
                                </div>
                            </div>
                        </div>
                        <div class="m_text_back">
                            <div class="m_text">
                                <div class="text_box1"> 新上市</div>
                                <div class="text_box2"> Surface Laptop Go 2</div>
                                <div class="text_box3">外型時尚的筆記型電腦配備 12.4 吋觸控螢幕、絕佳的打字體驗，以及改良的 HD 相機</div>
                                <div class="text_btn">深入了解</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="m_btn_bar">
                <a href="" class="L_arrow"><i class="fa-solid fa-chevron-left m_btn m_arrow  "></i></a>
                <div class="circle swiper-pagination" id="circle">
                </div>
                <a href="" class="R_arrow"><i class="fa-solid fa-chevron-right m_arrow m_btn "></i></a>
            </div>

            <div class="box">
                <ul class="box_ul">
                    <li>
                        <a class="box_btn" href="">
                            <img class="box_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Quick-Link-Icon-80x80-Microsoft-365?wid=40&hei=40" alt="">
                            選擇您的 Microsoft 365
                        </a>
                    </li>
                    <li>
                        <a class="box_btn box_btn2" href="">
                            <img class="box_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/icon-LL-surface-kickstand-120x120?wid=40&hei=40" alt="">
                            選購 Surface 裝置
                        </a>
                    </li>
                    <li>
                        <a class="box_btn box_btn3" href="">
                            <img class="box_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Quick-Link-Icon-80x80-Microsoft-365?wid=40&hei=40" alt="">
                            取得 Windows 11
                        </a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <ul class="content">
                    @foreach ($data as $item)
                        @if ($item->img == "" || $item->img == null)
                            <li class="ct_box">
                                <!-- <a href=""> -->
                                    <div class="no_img">
                                        {{$item->title}}
                                    </div>
                                    <div class="title">{{$item->title}}</div>
                                    <div class="content_text">{{$item->content}}</div>
                                    <div class="link_box">
                                        <a href="" class="under_line_box">
                                            <div id="under_line2">立即下載</div>
                                            <i class="fa-solid fa-chevron-right right_arrow"></i>
                                        </a>
                                    </div>
                                <!-- </a> -->
                            </li>
                        @else
                        <li class="ct_box">
                            <!-- <a href=""> -->
                                <div class="ct_img_box">
                                    <source class="ct_img" media="(min-width: 1400px)" srcset="{{$item->img}}">
                                    <source class="ct_img" media="(min-width: 1084px)" srcset=" {{$item->img}}">
                                    <source class="ct_img" media="(min-width: 860px)" srcset="{{$item->img}}">
                                    <source class="ct_img" media="(min-width: 540px)" srcset="{{$item->img}}">
                                    <img class="ct_img" src="{{$item->img}}" alt="">
                                </div>
                                <div class="title">{{$item->title}}</div>
                                <div class="content_text">{{$item->content}}</div>
                                <div class="link_box">
                                    <a href="" class="under_line_box">
                                        <div id="under_line2">立即下載</div>
                                        <i class="fa-solid fa-chevron-right right_arrow"></i>
                                    </a>
                                </div>
                            <!-- </a> -->
                        </li>
                        @endif
                    @endforeach
                    {{-- <li class="ct_box">
                        <!-- <a href=""> -->
                            <div class="ct_img_box">
                                <source class="ct_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Gldn-mscom-01-Black-Platinum-CP01?wid=380&hei=213&fit=crop">
                                <source class="ct_img" media="(min-width: 1084px)" srcset=" https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Gldn-mscom-01-Black-Platinum-CP01?wid=297&hei=167&fit=crop">
                                <source class="ct_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Gldn-mscom-01-Black-Platinum-CP01?wid=517&hei=293&fit=crop">
                                <source class="ct_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Gldn-mscom-01-Black-Platinum-CP01?wid=406&hei=230&fit=crop">
                                <img class="ct_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Gldn-mscom-01-Black-Platinum-CP01?wid=380&hei=213&fit=crop" alt="">
                            </div>
                            <div class="title">Surface Laptop 4</div>
                            <div class="content_text">運用完美結合時尚外型、超薄設計、多工速度和增強效能的裝置，一手包辦。</div>
                            <div class="link_box">
                                <a href="" class="under_line_box">
                                    <div id="under_line2">立即選購</div>
                                    <i class="fa-solid fa-chevron-right right_arrow"></i>
                                </a>
                            </div>
                        <!-- </a> -->
                    </li>
                    <li class="ct_box">
                        <!-- <a href=""> -->
                                <div class="ct_img_box">
                                    <source class="ct_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-m365-icons-7up-1668x940?wid=380&hei=213&fit=crop">
                                    <source class="ct_img" media="(min-width: 1084px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-m365-icons-7up-1668x940?wid=380&hei=213&fit=crop">
                                    <source class="ct_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-m365-icons-7up-1668x940?wid=517&hei=293&fit=crop">
                                    <source class="ct_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-m365-icons-7up-1668x940?wid=406&hei=230&fit=crop">
                                    <img class="ct_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-m365-icons-7up-1668x940?wid=380&hei=213&fit=crop" alt="">
                                </div>
                                <div class="title">Microsoft 365</div>
                                <div class="content_text">進階版 Office 應用程式、額外的雲端儲存空間、進階安全性等功能，全都在一個方便的訂閱中。</div>
                                <div class="link_box">
                                    <a href="" class="under_line_box link_box1">
                                        <div class="" id="under_line2">
                                            適合 1 人使用
                                        </div>
                                        <i class="fa-solid fa-chevron-right right_arrow"></i>
                                    </a>
                                    <a href="" class="under_line_box link_box2">
                                        <div id="under_line2">
                                        最多可供 6 人使用
                                        </div>
                                        <i class="fa-solid fa-chevron-right right_arrow  "></i>
                                    </a>
                                </div>

                        <!-- </a> -->
                    </li>
                    <li class="ct_box ct_end">
                        <!-- <a href=""> -->
                            <div class="ct_img_box">
                                <source class="ct_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-AEM-PC-Game-Pass-Expansion-No-Logo?wid=380&hei=213&fit=crop">
                                <source class="ct_img" media="(min-width: 1084px)" srcset="  https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-AEM-PC-Game-Pass-Expansion-No-Logo?wid=297&hei=167&fit=crop">
                                <source class="ct_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-AEM-PC-Game-Pass-Expansion-No-Logo?wid=517&hei=293&fit=crop">
                                <source class="ct_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-AEM-PC-Game-Pass-Expansion-No-Logo?wid=406&hei=230&fit=crop">
                                <img class="ct_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-AEM-PC-Game-Pass-Expansion-No-Logo?wid=380&hei=213&fit=crop" alt="">
                            </div>
                            <div class="title">PC Game Pass</div>
                            <div class="content_text">解鎖 100 多款精彩遊戲和 EA Play，而且首月只需 NT$30。 此優惠僅適用於新訂閱者。</div>
                            <a href="" class="link_box">
                                <div class="under_line_box">
                                    <div id="under_line2">立即加入</div>
                                    <i class="fa-solid fa-chevron-right right_arrow"></i>
                                </div>
                            </a>
                        <!-- </a> -->
                    </li> --}}
                </ul>
            </div>

            <div class="sticky">
                    <div class="top_btn_box">
                        <a href="#topbar" class="top_btn">
                            <i class="fa-solid fa-arrow-up"></i>
                            回到頁首
                        </a>
                    </div>
                    <div class="main_img">
                        <div class="container">
                            <picture class="m_img2_box">
                                <source class="m_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Soft-Hero-OneDriveCampaignRefresh-2:VP5-1596x600">
                                <source class="m_img" media="(min-width: 1084px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Soft-Hero-OneDriveCampaignRefresh-2:VP4-1260x600">
                                <source class="m_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Soft-Hero-OneDriveCampaignRefresh-2:VP3-1083x600">
                                <source class="m_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Soft-Hero-OneDriveCampaignRefresh-2:VP2-859x540">
                                <img class="m_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Soft-Hero-OneDriveCampaignRefresh-2:VP1-539x440">
                            </picture>
                        </div>
                        <div class="m_text_box ">
                            <div class="container">
                                <div class="m_text m_text2">
                                    <div class="text_box2 text_box2_2">Microsoft OneDrive</div>
                                    <div class="text_box3">將檔案和相片儲存到 OneDrive，即可隨時隨地從任何裝置存取</div>
                                    <div class="text_btn text_btn_2 pointer">深入了解</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m_text_back m_text_back2">
                        <div class="m_text">
                            <div class="text_box2 text_box2_2">Microsoft OneDrive</div>
                            <div class="text_box3">將檔案和相片儲存到 OneDrive，即可隨時隨地從任何裝置存取</div>
                            <div class="text_btn text_btn_2">深入了解</div>
                        </div>
                    </div>

                <div class="container">
                        <div class="title_text">適用於商務</div>
                        <ul class="content content_bottom">
                            <li class="ct_box ct_start">
                                <!-- <a href=""> -->
                                    <div class="ct_img_box">
                                        <source class="ct_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Laptop-Go-2-03-M01?wid=380&hei=213&fit=crop">
                                        <source class="ct_img" media="(min-width: 1084px)" srcset=" https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Laptop-Go-2-03-M01?wid=297&hei=167&fit=crop">
                                        <source class="ct_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Laptop-Go-2-03-M01?wid=517&hei=293&fit=crop">
                                        <source class="ct_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Laptop-Go-2-03-M01?wid=406&hei=230&fit=crop">
                                        <img class="ct_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Laptop-Go-2-03-M01?wid=380&hei=213&fit=crop" alt="">
                                    </div>
                                    <div class="text_box1 ct_new"> 新上市</div>
                                    <div class="title title_2_1">Surface Laptop Go 2 商務版</div>
                                    <div class="content_text word-break">外型時尚、<br>方便攜帶的筆記型電腦配備絕佳的打字體驗、Windows 11 專業版和專業級效能。</div>
                                    <div class="link_box">
                                        <a href="" class="under_line_box">
                                            <div id="under_line2">深入了解</div>
                                            <i class="fa-solid fa-chevron-right right_arrow"></i>
                                        </a>
                                    </div>
                                <!-- </a> -->
                            </li>
                            <li class="ct_box">
                                <!-- <a href=""> -->
                                    <div class="ct_img_box">
                                        <source class="ct_img ct_img2" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Windows-11-Business?wid=380&hei=213&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 1084px)" srcset=" https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Windows-11-Business?wid=297&hei=167&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Windows-11-Business?wid=517&hei=293&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Windows-11-Business?wid=406&hei=230&fit=crop">
                                        <img class="ct_img ct_img2" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Windows-11-Business?wid=380&hei=213&fit=crop" alt="">
                                    </div>
                                    <div class="title title_2">商務用 Windows 11 登場</div>
                                    <div class="content_text ">專為混合式辦公而設計。 為員工帶來實用性。 為 IT 帶來一致性。 為所有人帶來安全性。</div>
                                    <div class="link_box">
                                        <a href="" class="under_line_box">
                                            <div id="under_line2">深入了解</div>
                                            <i class="fa-solid fa-chevron-right right_arrow"></i>
                                        </a>
                                    </div>
                                <!-- </a> -->
                            </li>
                            <li class="ct_box">
                                <!-- <a href=""> -->
                                    <div class="ct_img_box">
                                        <source class="ct_img ct_img2" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-M365-CP-Microsoft365-Commercial?wid=380&hei=213&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 1084px)" srcset=" https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-M365-CP-Microsoft365-Commercial?wid=297&hei=167&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-M365-CP-Microsoft365-Commercial?wid=517&hei=293&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-M365-CP-Microsoft365-Commercial?wid=406&hei=230&fit=crop">
                                        <img class="ct_img ct_img2" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-M365-CP-Microsoft365-Commercial?wid=380&hei=213&fit=crop" alt="">
                                    </div>
                                    <div class="title title_2">Microsoft 365 商務版</div>
                                    <div class="content_text">透過功能強大的應用程式提高生產力、聯繫和安全，始終領先一步。</div>
                                    <div class="link_box">
                                        <a href="" class="under_line_box">
                                            <div id="under_line2">立即選購</div>
                                            <i class="fa-solid fa-chevron-right right_arrow"></i>
                                        </a>
                                    </div>
                                <!-- </a> -->
                            </li>
                            <li class="ct_box ct_end">
                                <!-- <a href=""> -->
                                    <div class="ct_img_box">
                                        <source class="ct_img ct_img2" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-Microsoft-Teams-Commercial?wid=380&hei=213&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 1084px)" srcset=" https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-Microsoft-Teams-Commercial?wid=297&hei=167&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-Microsoft-Teams-Commercial?wid=517&hei=293&fit=crop">
                                        <source class="ct_img ct_img2" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-Microsoft-Teams-Commercial?wid=406&hei=230&fit=crop">
                                        <img class="ct_img ct_img2" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-Microsoft-Teams-Commercial?wid=380&hei=213&fit=crop" alt="">
                                    </div>
                                    <div class="title title_2">免費取得 Microsoft Teams</div>
                                    <div class="content_text">線上會議、聊天和共用雲端儲存空間，盡在一處。</div>
                                    <div class="link_box">
                                        <a href="" class="under_line_box">
                                            <div id="under_line2">免費註冊</div>
                                            <i class="fa-solid fa-chevron-right right_arrow"></i>
                                        </a>
                                    </div>
                                <!-- </a> -->
                            </li>
                        </ul>
                        <div class="icon_box">
                            <div class="icon_text">關注 Microsoft</div>
                            <a href=""><img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Facebook%202x?scl=1" class="icon_btn icon_F"></a>
                            <a href=""><img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/YouTube%202x?scl=1" class="icon_btn icon_Y"></i></a>
                        </div>
                        <div class="top_btn_box_RWD">
                            <a href="#topbar" class="top_btn top_btn_RWD">
                                <i class="fa-solid fa-arrow-up"></i>
                                回到頁首
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    @endsection

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper(".mySwiper", {
                cssMode: true,
                slidesPerView: 1,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".R_arrow",
                    prevEl: ".L_arrow",
                },
                mousewheel: true,
                keyboard: true,
            });
        </script>
    @endsection
