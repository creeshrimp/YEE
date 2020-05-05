<h1 class="static_h1">DEALERS</h1>
<div class="bottomLayer">
    <article>
        <img class="map1" src="/img/map_1.png"></img>
    </article>
    <article class="content bottom-fix">
        <h3>If you have any questions, comments or feedback, please contact us.</h3>
        <p>
            We respect your privacy. Unless you instruct us otherwise, we’ll use the information you provide below only to respond to your inquiry.
            To learn more about how we use and store the information we collect from you, please read our Privacy Policy
        </p>
    </article>
</div>
<a href="/main/contact" class="--link-style_classic block-title bottom-fix">
    <h1>CONTACT US</h1>
</a>

<style>
    html{
        font-size: 12px;
    }
    /* ----------------------- main -------------------------*/
    main {
        margin-bottom: 1.5rem;
    }

    .bottomLayer {
        /* 小畫面的時候邊界縮成2% */
        padding: 1.5rem 2% 1.5rem 2%;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .bottomLayer>* {
        background-color: white;
    }

    .bottomLayer>* {
        margin-bottom: 1.5rem;
    }

    .block-title {
        /* width: 100%; */
        /* font-size: 36px; */
        background-color: rgba(255, 255, 255, 0.5);
        padding: 2rem;
        display: flex;
        justify-content: center;
    }



    .map1 {
        width: 100%;
    }

    /* dealer 內容文字 */

    .content {
        display: flex;
        flex-direction: column;
        padding: 1.5rem 1rem 1.5rem;
    }

    .content>h3 {
        font-size: 1.5rem;
        color: #525252;
        text-align: center;
    }

    .content>p {
        margin-top: 1.5rem;
        font-size: 1.125rem;
        text-indent: 2rem;
    }

    /*  頁面下方的 CONTACT US */
    .--link-style_classic {
        background-color: rgba(255, 255, 255, 0.5);
        color: rgb(75, 75, 75);
        transition: 0.5s;
    }

    .--link-style_classic:hover {
        background-color: rgb(192, 192, 192);
        color: rgb(255, 255, 255);
        transition: .1s;
    }

    .--link-style_classic:active {
        background-color: rgb(82, 82, 82);
        color: rgb(255, 255, 255);
        transition: .1s;
    }


    /* 陰影 */
    .div_shadow {
        box-shadow: 1px -3px 10px -3px #333333;
    }

    /* margin padding系列 */
    .bottom-fix {
        margin-bottom: 0;
    }
</style>
<!-- RWD -->
<style>
    @media screen and (min-width: 768px) {

        html{
            font-size: 16px;
        }

    }
</style>
<!-- <link rel="stylesheet" href="/css/Dealer_RWD.css"> -->