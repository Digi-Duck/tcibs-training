<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('pageTitle')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('CSS/microsoft-1.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/RWD.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    @yield('css')
</head>

<body>
    <div class="bar ">
        <div class="top_box">
            <div class="topbar" id="topbar">
                <div class="left">
                    <a class="logo_btn" href="/">
                        <img class="logo" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31" alt="">
                    </a>
                    <ul class="leftbar">
                        <li><a class="menu menu_L" id="under_line" href="/microsoft">Microsoft</a></li>
                        <li><a class="menu menu_L" id="under_line" href="/say">say</a></li>
                        <li><a class="menu menu_L" id="under_line" href="/comment">留言</a></li>
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

    @yield('main')

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

    @yield('js')
</body>
</html>
