    // menu 動畫
    var b1 = document.querySelector(".nav__menu-btn>i:nth-child(1)");
    var b2 = document.querySelector(".nav__menu-btn>i:nth-child(2)");
    var b3 = document.querySelector(".nav__menu-btn>i:nth-child(3)");
    var navlink = document.querySelector(".nav__nav-link");
    var main = document.querySelector(".header-wrapper");
    var menustatus = "close";
    function SetBtnTo(btnStatus){
        if(btnStatus == 'X'){
            b1.style.cssText = "position:absolute; transform:rotate(45deg);";
            b3.style.cssText = "position:absolute; transform:rotate(-45deg);";
            b2.style.display = "none";
        }
        if(btnStatus == 'E'){
            b1.removeAttribute("style");
            b2.removeAttribute("style");
            b3.removeAttribute("style");
        }
    }
    // 
    function SetMenuTo(status){
        if(status == 'open'){
            SetBtnTo('X');
            navlink.style.display = "flex";
            main.classList.add("full_Background");
            menustatus = "open";
        }
        else if(status == 'close'){
            SetBtnTo('E');
            navlink.style.display = "none";
            main.classList.remove("full_Background");
            menustatus = "close";
        }
    }

    // Menu總開關
    function Menu_toggle() {
        if(menustatus == 'close'){
            SetMenuTo('open')
            menustatus = 'open';            
        }
        else if(menustatus=='open'){
            SetMenuTo('close');
            menustatus = 'close';
        }
    }
    
    // if 螢幕小就小螢幕reset else 就 大螢幕版本的reset
    /* document.body.clientWidth 和　
    window.screen.width　和
    window.innerWidth　各自有點不同要特別注意 */
    function  CheckScreen(size) {
        // 大於 size
        if(window.innerWidth > size){
            SetMenuTo('open');
            main.classList.remove("full_Background");
        }
        // 小於 size
        else{
            SetMenuTo('close');
        }
    }
    
    // 網頁載入時先確認一次螢幕
    CheckScreen(800);
    // resize 事件
    window.addEventListener("resize", () => CheckScreen(800));

    // 滾動事件
                        // 用滾動判斷NAV要不要收起來 //
    // 先拍一張快照
    var snapshot;
    function Hide_Nav_If_Scroll(){
        // 如果 (當前的數字)   >   (快照的數字)
        // 代表我正在下樓
        if(window.scrollY > snapshot+2){
            document.getElementById("nav").style.top = "-200px";
        }
        // 如果 (當前的數字)   <   (快照的數字)
        // 代表我正在上樓
        else if(window.scrollY < snapshot-2 || window.scrollY == 0){
            document.getElementById("nav").style.top = "0px";
        }
        snapshot = window.scrollY;
    }
    window.addEventListener("scroll",() => {
        // 防止menu在展開狀態下位移問題
        if(menustatus == 'close' || window.innerWidth > 800){
            // 如果scrollY是負的就不理他，用來防止iphone的回彈問題
            if(window.scrollY>0){
                Hide_Nav_If_Scroll()
            }
        }
    });