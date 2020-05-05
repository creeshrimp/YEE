<h1 class="static_h1">ABOUT US</h1>
<div class="about-background">
    <article class="mdup_row-reverse">
        <div class="aboutImg" style="background-image: url(/img/about1-rec.png);"></div>
        <section class="aboutContent">
            <h3>Let Us Introduce Ourselves to You</h3>
            <p>
                We are DDin, a game developer who is determined to be one of the top brands in the world. Our team are full of energy. We have creative imaginations and innovative ideas. 
                We laid out precisely in global marketing and take every chance to achieve success for the future.Please join us now to create new revenues together.
            </p>
            <p>
                Our games focus on interactive entertainment with friends. And exciting multiplayer games bring fun and joy to make people moved.
            </p>
        </section>
    </article>
    <article class="mdup_row bottom-reset">
        <div class="aboutImg" style="background-image: url(/img/about2.png);"></div>
        <section class="aboutContent">
            <h3>New Game Contents and Features</h3>
            <p>
                We create new and diversified gameplays for players who want to challenge extraordinary rare gameplays.
            </p>
            <p>
                Within the framework of a traditional classic novel adaptation,we have high quality and fidelity simulations of classic board games. 
                And we also have originals and remakes of the early-age slot machine games. 
            </p>
        </section>
    </article>
</div>


<style>
    /* 全局字體大小，影響到使用rem單位的元素 */
    html{
        font-size: 14px;
    }
    /* ----------------------- main -------------------------*/
    .about-background{
        width: 100%;
        /* 小畫面的時候邊界縮成2%  而那個詭異的0.1px是為了讓內容物的margin推得出來*/ 
        /* 自從用了rem + html font-size 再也不用media query調整字體大小啦 */
        padding: 1.5rem 2% 1.5rem 2%;
        background-color: rgba(255, 255, 255, 0.5);
    }
    .about-background>*{
        background-color: white;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    /* 內元素間距 */
    .about-background>*{
        margin-bottom: 1.5rem;
    }

    /* article */
    .about-background>article{
        padding: 1.5rem;
        justify-content: space-between;
    }

    .aboutImg{
        /* 寬:高  ->  1 : 0.56 */
        width: 100%;
        padding-top: 56%;
        background-size: cover;
        background-position: top 50% left 70%;
    }

    .aboutContent{
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 1.6rem;
    }
    .aboutContent>p{
        font-size: 1rem;
        line-height: 1.3rem;
        letter-spacing: -0.02rem;
        padding-top: 1.25rem;
    }
    /* sticky 其實沒用到 */
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }

    /* 陰影 */
    .div_shadow{
        box-shadow: 1px -3px 10px -3px #333333;
    }

    /* margin padding系列 */

    .bottom-reset{
        margin-bottom: 0;
    }
</style>
<link rel="stylesheet" href="/css/About_us_RWD.css">