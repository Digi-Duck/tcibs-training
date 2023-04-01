<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('paTitle')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    
        @yield('css')
    
</head>
<body >
    <div class="top">
        <div class="topCenter">
            <div class="leftBox">
                <input type="checkbox" id="leftBurger">
                <label class="leftBtn" for="leftBurger" style="margin-left:24px ;">
                    <i class="fa-solid fa-bars"></i>
                </label>
                <div class="manyBurgers">
                    <label class="everyBurger">Microsoft 365</label>
                    <label class="everyBurger">Office</label>
                    <label class="everyBurger">Windows</label>
                    <label class="everyBurger">Surface</label>
                    <label class="everyBurger">Xbox</label>
                    <label class="everyBurger">支援</label>
                    <input type="checkbox" id="everyCheck1">
                    <label for="everyCheck1" class="everyBurger">
                        <div class="everyword">軟體</div>
                        <i class="fa-solid fa-angle-down"></i>
                    </label>
                        <div class="everyfeat1">Windows 應用程式</div>
                        <div class="everyfeat1">OneDrive</div>
                        <div class="everyfeat1">Outlook</div>
                        <div class="everyfeat1">Skype</div>
                        <div class="everyfeat1">OneNote</div>
                        <div class="everyfeat1">Microsoft  Teams</div>
                    <input type="checkbox" id="everyCheck2">
                    <label for="everyCheck2" class="everyBurger"><div class="everyword">個人電腦與設備</div><i class="fa-solid fa-angle-down"></i></label>
                        <div class="everyfeat2">選購 Xbox</div>
                        <div class="everyfeat2">電腦配件</div>
                    <input type="checkbox" id="everyCheck3">
                    <label for="everyCheck3" class="everyBurger"><div class="everyword">娛樂</div><i class="fa-solid fa-angle-down"></i></label>
                        <div class="everyfeat3">Xbox Game Pass Ultimate</div>
                        <div class="everyfeat3">Xbox Live Gold</div>
                        <div class="everyfeat3">Xbox 與遊戲</div>
                        <div class="everyfeat3">電腦遊戲</div>
                        <div class="everyfeat3">windows 電腦遊戲</div>
                    <input type="checkbox" id="everyCheck4">
                    <label for="everyCheck4" class="everyBurger"><div class="everyword">商務適用</div><i class="fa-solid fa-angle-down"></i></label>
                        <div class="everyfeat4">Microsoft Cloud</div>
                        <div class="everyfeat4">Microsoft 安全性</div>
                        <div class="everyfeat4">Azure</div>
                        <div class="everyfeat4">Dynamics 365</div>
                        <div class="everyfeat4">商務用 Microsoft</div>
                        <div class="everyfeat4">Microsoft 產業</div>
                        <div class="everyfeat4">Microsoft Power Platform</div>
                        <div class="everyfeat4">Windows 365</div>
                    <input type="checkbox" id="everyCheck5">
                    <label for="everyCheck5" class="everyBurger"><div class="everyword">開發人員與IT</div><i class="fa-solid fa-angle-down"></i></label>
                        <div class="everyfeat5">開發人員中心</div>
                        <div class="everyfeat5">文件</div>
                        <div class="everyfeat5">Microsoft Learn</div>
                        <div class="everyfeat5">Microsoft 技術社群</div>
                        <div class="everyfeat5">Azure Marketplace</div>
                        <div class="everyfeat5">AppSource</div>
                        <div class="everyfeat5">Visual Studio</div>
                    <input type="checkbox" id="everyCheck6">
                    <label for="everyCheck6" class="everyBurger"><div class="everyword">其他</div><i class="fa-solid fa-angle-down"></i></label>
                        <div class="everyfeat6">Microsoft</div>
                        <div class="everyfeat6">免費下載與安全性</div>
                        <div class="everyfeat6">教育</div>
                        <div class="everyfeat6">禮品卡</div>
                        <div class="everyfeat6">Licensing</div>
                    <label class="everyBurger">檢視網站地圖</label>
                </div>
                <label class="leftBtn2" for=""><i class="fa-solid fa-magnifying-glass" ></i></label>
            </div>
            <div class="topBtns">
                <div class="mic"></div>
                <div class="btn" >Microsoft 365</div>
                <div class="btn" >Office</div>
                <div class="btn" >Windows</div>
                <div class="btn" >Surface</div>
                <div class="btn extra" >Xbox</div>
                <div class="btn extra" >支援</div>
                <input type="checkbox" id="extra2Burger" style="display:none ;">
                <div class="coverextra2Btn">
                    <label for="extra2Burger" class=" extra2" >
                        <div class="extraBox btn">更多</div>
                        <i class="fa-solid fa-angle-down"></i>
                        <!-- <input type="checkbox" id="extra2Burger"> -->
                    </label>
                    <div class="extraFeats">
                        <div class="extraFeat btn">Xbox</div>
                        <div class="extraFeat btn">支援</div>
                    </div>
                </div>
            </div>
            <div class="topBtn2">

                <div class="btnBox2 margin-right">
                    <!-- <input type="checkbox" id="cover"> -->
                    <input type="checkbox" name="" id="burger"> 
                    <div class="cover">
                        <label for="cover">
                            <label class="btn3" id="btn2" for="burger">所有 Microsoft 
                            <i class="fa-solid fa-angle-down"></i>    
                            </label>
                        </label>
                    </div>
                    
                    <!-- <input type="checkbox" name="" id="burger">  -->
                    <div class="featsBox">
                        <div class="feats">
                            <div class="feat1">軟體</div>
                            <div class="feat2">Windows 應用程式</div>
                            <div class="feat2">OneDrive</div>
                            <div class="feat2">Outlook</div>
                            <div class="feat2">Skype</div>
                            <div class="feat2">OneNote</div>
                            <div class="feat2">Microsoft Teams</div>
                        </div>
                        <div class="feats">
                            <div class="feat1">個人電腦和設備</div>
                            <div class="feat2">選購 Xbox</div>
                            <div class="feat2">電腦配件</div> 
                        </div>
                        <div class="feats">
                            <div class="feat1">娛樂</div>
                            <div class="feat2">Xbox Game Pass Ultimate</div>
                            <div class="feat2">Xbox Live Gold</div>
                            <div class="feat2">Xbox 與遊戲</div>
                            <div class="feat2">電腦遊戲</div>
                            <div class="feat2">Windows 遊戲</div>
                        </div>
                        <div class="feats">
                            <div class="feat1">商務適用
                            </div>
                            <div class="feat2">Microsoft Cloud</div>
                            <div class="feat2">Microsoft 安全性</div>
                            <div class="feat2">Azure</div>
                            <div class="feat2">Dynamics 365</div>
                            <div class="feat2">商務用 Microsoft 365</div>
                            <div class="feat2">Microsoft 產業</div>
                            <div class="feat2">Microsoft Power Platform</div>
                            <div class="feat2">Windows 365</div>
                        </div>
                        <div class="feats">
                            <div class="feat1">開發人員與 IT</div>
                            <div class="feat2">開發人員中心</div>
                            <div class="feat2">文件</div>
                            <div class="feat2">Microsoft Learn</div>
                            <div class="feat2">Microsoft 技術社群</div>
                            <div class="feat2">Azure Marketplace</div>
                            <div class="feat2">AppSource</div>
                            <div class="feat2">Visual Studio</div>    
                        </div>
                        <div class="feats">
                            <div class="feat1">其他</div>
                            <div class="feat2">Microsoft Rewards</div>
                            <div class="feat2">免費下載與安全性</div>
                            <div class="feat2">教育</div>
                            <div class="feat2">禮品卡</div>
                            <div class="feat2">Licensing</div>
                        </div>
                        <div class="underBread">檢視網站地圖<i class="fa-solid fa-chevron-right" id="icon3"></i></div>
                    </div>
                </div>
                <div class="btnBox margin-right3">
                    <div class="btn2" id="btn2 margin-right4" >搜尋</div>
                    <i class="fa-solid fa-magnifying-glass margin-top" ></i>
                </div>
                <div class="btnBox">
                    <div class="btn2" id="btn2 margin-right5" >購物車</div>
                    <i class="fa-solid fa-cart-shopping margin-top" ></i>
                </div>
                <div class="btnBox">
                    <div class="btn2" id="btn2 margin-right5">登入
                    </div>
                    <i class="fa-regular fa-circle-user margin-right7" ></i>
                </div>
            </div>
        </div>
    </div>
    <main>
        @yield('main')
    </main>
    <div class="bigFoot">

        <div class="foots">
            <div class="foot">
                <a href="https://tcivs.tc.edu.tw/" class="bigToe">最新動向</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 365</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Surface Go</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Surface Book 2</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Surface Pro5</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Windows 11 應用程式</a>
            </div>
            <div class="foot">
                <a href="https://tcivs.tc.edu.tw/" class="bigToe">Microsoft Store</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">帳戶設定檔</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">下載中心</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Store 支援</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">退貨/退款</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">訂單追蹤</a>
            </div>
            <div class="foot">
                <a href="https://tcivs.tc.edu.tw/" class="bigToe">教育</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 教育</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">教育裝置</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Teams 教育版</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 365 教育版</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Office 教育版</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">教育工作者訓練和發展</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">學生和家長優惠</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Azure 學生版</a>
            </div>
            <div class="foot">
                <a href="https://tcivs.tc.edu.tw/" class="bigToe">商務</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Cloud</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 安全性</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Azure</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Dynamics 365</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 365</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Advertising</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 產業</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Teams5</a>
            </div>
            <div class="foot">
                <a href="https://tcivs.tc.edu.tw/" class="bigToe">開發人員與 IT</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">開發人員中心</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">文件</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Learn</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 技術社群</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Azure Marketplace</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">AppSource</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft Power Platform</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Visual Studio</a>
            </div>
            <div class="foot">
                <a href="https://tcivs.tc.edu.tw/" class="bigToe">公司</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">人才招募</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">公司新聞</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">Microsoft 隱私權</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">投資者</a>
                <a href="https://tcivs.tc.edu.tw/" class="toe">永續性</a>
            </div>
        </div>
        <div class="bottom">
            <div class="language">
                <i class="fa-solid fa-earth-americas"></i>
                <div class="languageWord" id="btn100">中文(台灣)</div>
            </div>
            <div class="bigBottom">
                <div class="bottomBtn" id="btn100">© Microsoft 2022</div>
                <div class="bottomBtn" id="btn100">有關我們的廣告訊息</div>
                <div class="bottomBtn" id="btn100">商標</div>
                <div class="bottomBtn" id="btn100">使用規定</div>
                <div class="bottomBtn" id="btn100">隱私權 </div>
                <div class="bottomBtn" id="btn100">連絡 Microsoft</div>

            </div>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @yield('js')
    <!-- Initialize Swiper -->
    <script>
     
    </script>
</body>
</html>