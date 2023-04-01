@extends('tem')
@section('paTitle')
    microfloat
@endsection
@section('css')
    <style>

    </style>
@endsection

<body>
    
    @section('main')
    <a href="https://youtu.be/dQw4w9WgXcQ">

        <div class="mySwiper swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide photo100" id="photo">
                    
                    <div class="produceIntroduce">
                        <div class="produceIntroduceBox">
                            <div class="name">Surface Pro 8</div>
                            <div class="introduce">運用更大的 13 吋觸控螢幕、更快的連線，以及提升的速度，成就更多。現在提供 Windows 11。</div>
                            <div class="deep">深入了解</div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide photo200" id="photo">
                    
                        <div class="produceIntroduce">
                            <div class="produceIntroduceBox">
                                <div class="new2">
                                    新上市
                                </div>
                                <div class="name">Surface Laptop Go 2</div>
                                <div class="introduce">外型時尚的筆記型電腦配備 12.4 吋觸控螢幕、絕佳的打字體驗，以及改良的 HD 相機</div>
                                <div class="deep">深入了解</div>
                            </div>
                            </div>
                        </div>
                </div>

            </div>
        
    </a>
    <a href="">
        <div class="lastIntroduce">
             <div class="new2-1">
                 新上市
             </div>
             <div class="name-1">Surface Laptop Go 2</div>
             <div class="introduce-1">外型時尚的筆記型電腦配備 12.4 吋觸控螢幕、絕佳的打字體驗，以及改良的 HD 相機</div>
             <div class="deep">深入了解</div>
         </div> 
    </a>
    <div class="changeBtn_box">
        
            <i class="fa-solid fa-chevron-left " id="icon"></i>
            <div class="swiper-pagination" id="circle"></div>
            <i class="fa-solid fa-chevron-right" id="icon"></i>
    </div>
    <div class="centerBtns">
        <div class="centerBtn_1" id="centerBtns">
            <div class="centerBtn_photo" style="background-image: url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Quick-Link-Icon-80x80-Microsoft-365?wid=40&hei=40);"></div>
            <a href="" class="centerBtn_word">選擇您的 Microsoft 365</a>
            <!-- <div class="centerBtn_word">選擇您的 Microsoft 365</div> -->
        </div>
        <div class="centerBtn_2" id="centerBtns">
            <div class="centerBtn_photo" style="background-image: url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/icon-LL-surface-kickstand-120x120?wid=40&hei=40);"></div>
            <a href="" class="centerBtn_word">選購 Surface 裝置</a>
            <!-- <div class="centerBtn_word">選購 Surface 裝置</div> -->
        </div>
        <div class="centerBtn_3" id="centerBtns">
            <div class="centerBtn_photo" style="background-image: url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-Quick-Link-Icon-80x80-Microsoft-365?wid=40&hei=40);"></div>
            <a href="" class="centerBtn_word">取得 Windows 11</a>
            <!-- <div class="centerBtn_word">取得 Windows 11</div> -->
        </div>
    </div>
    <div class="things">
        <div class="thingBox margin16">
            <div class="thing"  style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-m365-icons-7up-1668x940?wid=515&hei=293&fit=crop) ;"></div>
            <!-- <div class="space"></div> -->
            <div class="thingTitle">
                Microsoft 365
            </div>
            <div class="thingWord">
                進階版 Office 應用程式、額外的雲端儲存空間、進階安全性等功能，全都在一個方便的訂閱中。
            </div>
            <a href="">
                <div class="smallWord">
                    <div id="blueWord"> 適合 1 人使用</div>
                    <i class="fa-solid fa-chevron-right" id="blueWord"></i>
                </div>
            </a>
            <a href="">
                <div class="smallWord">
    
                    <div id="blueWord">最多可供 6 人使用</div>
                    <i class="fa-solid fa-chevron-right" id="blueWord"></i>
                </div>
            </a>
        </div>
        <div class="thingBox">
            <div class="thing" style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Gldn-mscom-01-Black-Platinum-CP01?wid=515&hei=293&fit=crop) ;"></div>
            <!-- <div class="space"></div> -->
            <div class="thingTitle">
                Surface Laptop 4
            </div>
            <div class="thingWord">
                運用完美結合時尚外型、超薄設計、多工速度和增強效能的裝置，一手包辦
            </div>
            <a href="">
                <div class="smallWord">
                    <div id="blueWord">立即選購</div>
                    <i class="fa-solid fa-chevron-right" id="blueWord"></i>
    
                </div>

            </a>

        </div>
        <div class="thingBox">
            <div class="thing"  style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-MSFT-CP-Edge?wid=515&hei=293&fit=crop) ;"></div>
            <div class="thingTitle">
                Microsoft Edge
            </div>
            <div class="thingWord">
                在您瀏覽時提供世界級的效能，以及更多的隱私、更充足的生產力與更高的價值。
            </div>
            <a href="">
                <div class="smallWord">
                    <div id="blueWord">立即下載</div>
                    <i class="fa-solid fa-chevron-right" id="blueWord"></i>
    
                </div>
            </a>

        </div>
        <div class="thingBox">
            <div class="thing"  style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-AEM-PC-Game-Pass-Expansion-No-Logo?wid=515&hei=293&fit=crop) ;"></div>
            <div class="thingTitle">
                PC Game Pass
            </div>
            <div class="thingWord">
                解鎖 100 多款精彩遊戲和 EA Play，而且首月只需 NT$30。 此優惠僅適用於新訂閱者。
            </div>
            <a href="">
                <div class="smallWord">
                    <div id="blueWord">立即加入</div>
                    <i class="fa-solid fa-chevron-right" id="blueWord"></i>
    
                </div>
            </a>

        </div>
    </div>
    <div class="bigBox">
        <a href="">
            <button class="back-to-top">
                
                <i class="fa-solid fa-arrow-up-long"></i>
                <div class="backWord">回到首頁</div>
            </button>
    
        </a>
        <a href="https://youtu.be/v1POP-m76ac">
            <div class="bigProduce2">
                <div class="produceIntroduce2" style="margin-top:50px ;margin-left:-100px;">
                    <div class="produceIntroduceBox2">
                        
                        <div class="name2" >Microsoft OneDrive</div>
                        <div class="introduce2" >將檔案和相片儲存到 OneDrive，即可隨時隨地從任何裝置存取</div>
                        <div class="deep2" >深入了解</div>
                    </div>
                </div>
            </div>
        </a>
        <a href="https://youtu.be/v1POP-m76ac">
            <div class="lastIntroduce-2">
                
                <div class="name-1">Microsoft OneDrive</div>
                <div class="introduce-1">將檔案和相片儲存到 OneDrive，即可隨時隨地從任何裝置存取</div>
                <div class="deep">深入了解</div>
            </div> 
        </a>
        <div class="word">適用於商務</div>
    
        <div class="things2">
            <div class="thingBox2 margin15">
                <div class="thing" style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Laptop-Go-2-03-M01?wid=380&hei=213&fit=crop) ;"></div>
                <!-- <div class="space"></div> -->
                <div class="new">新上市</div>
                <div class="thingTitle2">
                    Surface Laptop Go 2 商務版
                </div>
                <div class="thingWord">
                    外型時尚、<br>方便攜帶的筆記型電腦配備絕佳的打字體驗、<br>Windows 11 專業版和專業級效能。
                </div>
                <a href="">
                    <div class="smallWord">
                        <div id="blueWord">深入了解</div>
                        <i class="fa-solid fa-chevron-right" id="blueWord"></i>
        
                    </div>

                </a>

            </div>
            <div class="thingBox2">
                <div class="thing"  style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-CP-Microsoft-Teams-Commercial?wid=380&hei=213&fit=crop) ;"></div>
                
                <div class="thingTitle3">
                    免費取得 Microsoft Teams
                </div>
                <div class="thingWord">
                    線上會議、聊天和共用雲端儲存空間，盡在一處
                </div>
                <a href="">
                    <div class="smallWord">
                        <div id="blueWord">免費註冊</div>
                        <i class="fa-solid fa-chevron-right" id="blueWord"></i>
        
                    </div>
                </a>

            </div>
            <div class="thingBox2">
                <div class="thing"  style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/gldn-M365-CP-Microsoft365-Commercial?wid=515&hei=293&fit=crop) ;"></div>
                <div class="thingTitle3">
                    Microsoft 365 商務版
                </div>
                <div class="thingWord">
                    透過功能強大的應用程式提高生產力、聯繫和安全，始終領先一步。
                </div>
                <a href="">
                    <div class="smallWord">
                        <div id="blueWord">立即選購</div>
                        <i class="fa-solid fa-chevron-right" id="blueWord"></i>
        
                    </div>
                </a>

            </div>
            <div class="thingBox2">
                <div class="thing"  style="background-image:url(https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Windows-11-Business?wid=515&hei=293&fit=crop) ;"></div>
                <div class="thingTitle3">
                    
商務用 Windows 11 登場
                </div>
                <div class="thingWord">
                    從 Microsoft 雲端安全地將您的 Windows 體驗串流到任何裝置。
                </div>
                <a href="">
                    <div class="smallWord">
                        <div id="blueWord">深入了解</div>
                        <i class="fa-solid fa-chevron-right" id="blueWord"></i>
        
                    </div>
                </a>

    
            </div>
        </div>
        <div class="fbYtBox">
            <div class="fbYtWord">關注 Microsoft</div>
            <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Facebook%202x?scl=1" alt="">
            <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/YouTube%202x?scl=1" alt="" class="">
        </div>
        <a href="">
            <div class="back-to-top-2">
                <div class="endBox">
                    <i class="fa-solid fa-arrow-up-long"></i>
                    <div class="backWord">回到首頁</div>
                </div>
            </div>
        </a>
    </div>
    @endsection
    

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    @section('js')
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".fa-chevron-right",
          prevEl: ".fa-chevron-left",
        },

        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },

      });
    </script>
    @endsection
</body>
</html>