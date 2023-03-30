<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('CSS/microsoft-1.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/RWD.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    <div class="bar ">
        <div class="top_box">
            <div class="topbar" id="topbar">
                <div class="left">
                    <a class="logo_btn" href="">
                        <img class="logo" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31" alt="">
                    </a>
                    <ul class="leftbar">
                        <li><a class="menu menu_L" id="under_line" href="">Microsoft 365</a></li>
                        <li><a class="menu menu_L" id="under_line" href="">Teams</a></li>
                        <li><a class="menu menu_L" id="under_line" href="">Windows</a></li>
                        <li><a class="menu menu_L" id="under_line" href="">Surface</a></li>
                        <li><a class="menu menu_L none" id="under_line" href="">Xbox</a></li>
                        <li><a class="menu menu_L none" id="under_line" href="">支援</a></li>
                        <input type="checkbox" id="switch_l">
                        <label for="switch_l" class="menu menu_L menu_btn menu_L_btn" id="under_line_l">
                                <div class="menu_L_text" >更多</div>
                                <i class="fa-solid fa-angle-down arrow menu_btn_arrow"></i>
                        </label>
                        <div class="menu_box_L">
                            <li><a class="menu menu_L menu_L_li" href="">Xbox</a></li>
                            <li><a class="menu menu_L menu_L_li" href="">支援</a></li>
                        </div>
                    </ul>
                </div>
                <ul class="rightbar">
                    <li>
                        <input type="checkbox" id="switch">
                        <label for="switch" class="menu menu_R menu_btn" id="under_line_r" href="">
                            <div class="menu_R_text text_menu">所有 Microsoft </div>
                            <i class="fa-solid fa-angle-down arrow menu_btn_arrow menu_R_img"></i>
                        </label>
                        <div class="menu_box">
                            <ul class="menu_ul">
                                <ul class="menu_ul2">
                                    <li class="menu_title">軟體</li>
                                    <li class="menu_li"><a href="" class="link_color">Windows 應用程式</a></li>
                                    <li class="menu_li"><a href="" class="link_color">OneDrive</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Outlook</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Skype</a></li>
                                    <li class="menu_li"><a href="" class="link_color">OneNote</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft Teams</a></li>
                                </ul>
                                <ul class="menu_ul2">
                                    <li class="menu_title">個人電腦和設備</li>
                                    <li class="menu_li"><a href="" class="link_color">選購 Xbox</a></li>
                                    <li class="menu_li"><a href="" class="link_color">電腦配件</a></li>
                                </ul>
                                <ul class="menu_ul2">
                                    <li class="menu_title">娛樂</li>
                                    <li class="menu_li"><a href="" class="link_color">Xbox Game Pass Ultimate</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Xbox Live Gold</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Xbox 與遊戲</a></li>
                                    <li class="menu_li"><a href="" class="link_color">電腦遊戲</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Windows 遊戲</a></li>
                                </ul>
                                <ul class="menu_ul2">
                                    <li class="menu_title">商務適用</li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft Cloud</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft 安全性</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Azure</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Dynamics 365</a></li>
                                    <li class="menu_li"><a href="" class="link_color">商務用 Microsoft 365</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft 產業</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft Power Platform</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Windows 365</a></li>
                                </ul>
                                <ul class="menu_ul2">
                                    <li class="menu_title">開發人員與 IT</li>
                                    <li class="menu_li"><a href="" class="link_color">開發人員中心</a></li>
                                    <li class="menu_li"><a href="" class="link_color">文件</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft Learn</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Microsoft 技術社群</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Azure Marketplace</a></li>
                                    <li class="menu_li"><a href="" class="link_color">AppSource</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Visual Studio</a></li>
                                </ul>
                                <ul class="menu_ul2">
                                    <li class="menu_title">其他</li>
                                    <li class="menu_li menu_padding"><a href="" class="link_color">Microsoft Rewards</a></li>
                                    <li class="menu_li"><a href="" class="link_color">免費下載與安全性</a></li>
                                    <li class="menu_li"><a href="" class="link_color">教育</a></li>
                                    <li class="menu_li"><a href="" class="link_color">禮品卡</a></li>
                                    <li class="menu_li"><a href="" class="link_color">Licensing</a></li>
                                </ul>
                            </ul>
                            <div class="map_box">
                                <a href="" class="map">
                                    <div class="map_text">檢視網站地圖</div>
                                    <i class="fa-solid fa-chevron-right map_arrow"></i>
                                </a>
                            </div>
                        </div>

                    </li>
                    <div class="right_menu_box">
                        <li class="menu_R_box">
                                <input type="checkbox" id="bar_btn">
                                <label for="bar_btn" class="menu menu_R bar_btn" id="under_line_r" href="">
                                    <i class="fa-solid fa-bars"></i>
                                </label>
                                <ul class="bar_ul">

                                    <a href="" class="bar_text bar_text bar_li">Microsoft 365</a>
                                    <a href="" class="bar_text bar_li">Office</a>
                                    <a href="" class="bar_text bar_li">Windows</a>
                                    <a href="" class="bar_text bar_li">Surface</a>
                                    <a href="" class="bar_text bar_li">Xbox</a>
                                    <a href="" class="bar_text bar_li">支援</a>

                                    <input type="checkbox" id="bar_1">
                                    <label for="bar_1" class="bar_li bar_text">
                                        <div class="bar_box_text">軟體</div>
                                        <i class="fa-solid fa-angle-down bar_arrow"></i>
                                    </label>
                                    <ul class="bar_li_ul bar_1_ul">
                                        <a href="" class="bar_text bar_li_li bar_1_li">Windows 應用程式</a>
                                        <a href="" class="bar_text bar_li_li bar_1_li">OneDrive</a>
                                        <a href="" class="bar_text bar_li_li bar_1_li">Outlook</a>
                                        <a href="" class="bar_text bar_li_li bar_1_li">Skype</a>
                                        <a href="" class="bar_text bar_li_li bar_1_li">OneNote</a>
                                        <a href="" class="bar_text bar_li_li bar_1_li">Microsoft Teams</a>
                                    </ul>

                                    <input type="checkbox" id="bar_2">
                                    <label for="bar_2" class="bar_li bar_text">
                                        <div class="bar_box_text">個人電腦和設備</div>
                                        <i class="fa-solid fa-angle-down bar_arrow"></i>
                                    </label>
                                    <ul class="bar_li_ul bar_2_ul">
                                        <a href="" class="bar_text bar_li_li bar_2_li">選購 Xbox</a>
                                        <a href="" class="bar_text bar_li_li bar_2_li">電腦配件</a>
                                    </ul>

                                    <input type="checkbox" id="bar_3">
                                    <label for="bar_3" class="bar_li bar_text">
                                        <div class="bar_box_text">娛樂</div>
                                        <i class="fa-solid fa-angle-down bar_arrow"></i>
                                    </label>
                                    <ul class="bar_li_ul bar_3_ul">
                                        <a href="" class="bar_text bar_li_li bar_3_li">Xbox Game Pass Ultimate</a>
                                        <a href="" class="bar_text bar_li_li bar_3_li">Xbox Live Gold</a>
                                        <a href="" class="bar_text bar_li_li bar_3_li">Xbox 與遊戲</a>
                                        <a href="" class="bar_text bar_li_li bar_3_li">電腦遊戲</a>
                                        <a href="" class="bar_text bar_li_li bar_3_li">Windows 遊戲</a>
                                    </ul>

                                    <input type="checkbox" id="bar_4">
                                    <label for="bar_4" class="bar_li bar_text">
                                        <div class="bar_box_text">商務適用</div>
                                        <i class="fa-solid fa-angle-down bar_arrow"></i>
                                    </label>
                                    <ul class="bar_li_ul bar_4_ul">
                                        <a href="" class="bar_text bar_li_li bar_4_li">Microsoft Cloud</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">Microsoft 安全性</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">Azure</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">Dynamics 365</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">商務用 Microsoft 365</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">Microsoft 產業</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">Microsoft Power Platform</a>
                                        <a href="" class="bar_text bar_li_li bar_4_li">Windows 365</a>
                                    </ul>

                                    <input type="checkbox" id="bar_5">
                                    <label for="bar_5" class="bar_li bar_text">
                                        <div class="bar_box_text">開發人員與 IT</div>
                                        <i class="fa-solid fa-angle-down bar_arrow"></i>
                                    </label>
                                    <ul class="bar_li_ul bar_5_ul">
                                        <a href="" class="bar_text bar_li_li bar_5_li">開發人員中心</a>
                                        <a href="" class="bar_text bar_li_li bar_5_li">文件</a>
                                        <a href="" class="bar_text bar_li_li bar_5_li">Microsoft Learn</a>
                                        <a href="" class="bar_text bar_li_li bar_5_li">Microsoft 技術社群</a>
                                        <a href="" class="bar_text bar_li_li bar_5_li">Azure Marketplace</a>
                                        <a href="" class="bar_text bar_li_li bar_5_li">AppSource</a>
                                        <a href="" class="bar_text bar_li_li bar_5_li">Visual Studio</a>
                                    </ul>

                                    <input type="checkbox" id="bar_6">
                                    <label for="bar_6" class="bar_li bar_text">
                                        <div class="bar_box_text ">其他</div>
                                        <i class="fa-solid fa-angle-down bar_arrow"></i>
                                    </label>
                                    <ul class="bar_li_ul bar_6_ul">
                                        <a href="" class="bar_text bar_li_li bar_6_li">Microsoft Rewards</a>
                                        <a href="" class="bar_text bar_li_li bar_6_li">免費下載與安全性</a>
                                        <a href="" class="bar_text bar_li_li bar_6_li">教育</a>
                                        <a href="" class="bar_text bar_li_li bar_6_li">禮品卡</a>
                                        <a href="" class="bar_text bar_li_li bar_6_li">Licensing</a>
                                    </ul>

                                    <a href="" class="bar_text bar_li bar_map">檢視網站地圖</a>
                                </ul>
                                <a class="menu menu_R search_btn" id="under_line_r" href="">
                                    <div class="menu_R_text">搜尋</div>
                                    <i class="fa-solid fa-magnifying-glass search menu_R_img"></i>
                                </a>
                        </li>
                        <li class="menu_R_box">
                                <a class="menu menu_R shop" id="under_line_r" href="">
                                    <div class="menu_R_text">購物車</div>
                                    <i class="fa-solid fa-cart-shopping shopping menu_R_img"></i>
                                </a>
                                <a class="menu menu_R user_btn" href="">
                                    <div class="menu_R_text">登入</div>
                                    <i class="fa-solid fa-user-plus user menu_R_img"></i>
                                </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>

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
                <li class="ct_box ct_start">
                    <!-- <a href=""> -->
                        <div class="ct_img_box">
                            <source class="ct_img" media="(min-width: 1400px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-MSFT-CP-Edge?wid=380&hei=213&fit=crop">
                            <source class="ct_img" media="(min-width: 1084px)" srcset=" https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-MSFT-CP-Edge?wid=297&hei=167&fit=crop">
                            <source class="ct_img" media="(min-width: 860px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-MSFT-CP-Edge?wid=517&hei=293&fit=crop">
                            <source class="ct_img" media="(min-width: 540px)" srcset="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-MSFT-CP-Edge?wid=406&hei=230&fit=crop">
                            <img class="ct_img" src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-MSFT-CP-Edge?wid=380&hei=213&fit=crop" alt="">
                        </div>
                        <div class="title">Microsoft Edge</div>
                        <div class="content_text">在您瀏覽時提供世界級的效能，以及更多的隱私、更充足的生產力與更高的價值。</div>
                        <div class="link_box">
                            <a href="" class="under_line_box">
                                <div id="under_line2">立即下載</div>
                                <i class="fa-solid fa-chevron-right right_arrow"></i>
                            </a>
                        </div>
                    <!-- </a> -->
                </li>
                <li class="ct_box">
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
                </li>
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



    <div class="footer">
        <div class="box_column">
            <ul class="column">
                <div class="column1">
                    <li class="column_title">最新動向</li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 365</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Surface Go</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Surface Book 2</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Surface Pro</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Windows 11 應用程式</a></li>
                </div>
            </ul>
            <ul class="column">
                <div class="column2">
                    <li class="column_title" >Microsoft Store</li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">帳戶設定檔</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">下載中心</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Store 支援</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">退貨/退款</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">訂單追蹤</a></li>
                </div>
            </ul>
            <ul class="column">
                <div class="column2">
                    <li class="column_title " >教育</li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 教育</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">教育裝置</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Teams 教育版</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 365 教育版</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Office 教育版</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">教育工作者訓練和發展</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">學生和家長優惠</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Azure 學生版</a></li>
                </div>
            </ul>
            <ul class="column">
                <div class="column1">
                    <li class="column_title ">商務</li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Cloud</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 安全性</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Azure</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Dynamics 365</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 365</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Advertising</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 產業</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Teams</a></li>
                </div>
            </ul>
            <ul class="column">
                <div class="column2">
                    <li class="column_title ">開發人員與 IT</li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">開發人員中心</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">文件</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Learn</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 技術社群</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Azure Marketplace</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">AppSource</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft Power Platform</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Visual Studio</a></li>
                </div>
            </ul>
            <ul class="column">
                <div class="column2">
                    <li class="column_title ">公司</li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">人才招募</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">公司新聞</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">Microsoft 隱私權</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">投資者</a></li>
                    <li class="column_li"><a class="color_61" id="under_line3" href="">永續性</a></li>
                </div>
            </ul>
        </div>
        <div class="footer_bar">
            <div class="language">
                <a class="color_61 footer_L_box" href="">
                    <i class="fa-solid fa-earth-americas earth"></i>
                    <div class="footer_L_text">中文(台灣)</div>
                </a>
            </div>
            <ul class="footer_R_box">
                <li class="footer_R"><a class="color_61" id="under_line3" href="">連絡 Microsoft</a></li>
                <li class="footer_R"><a class="color_61" id="under_line3" href="">隱私權</a></li>
                <li class="footer_R"><a class="color_61" id="under_line3" href="">使用規定</a></li>
                <li class="footer_R"><a class="color_61" id="under_line3" href="">商標</a></li>
                <li class="footer_R"><a class="color_61" id="under_line3" href="">有關我們的廣告訊息</a></li>
                <li class="footer_R color_61">© Microsoft 2022</li>
            </ul>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
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
</body>
</html>
