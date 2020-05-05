<h1 class="static_h1">CONTACT US</h1>
<div class="bottomLayer">
    <article class="content bottom-fix">
        <h3>If you have any questions, comments or feedback, please contact us.</h3>
        <p>
            We respect your privacy. Unless you instruct us otherwise, we’ll use the information you provide below only to respond to your inquiry.
            To learn more about how we use and store the information we collect from you, please read our Privacy Policy
        </p>
    </article>
</div>
<div class="bottomLayer">
    <form id="contact-form" class="contact-form" name="contact-form" action="/coop/SendContact" method="post">
        <label>NAME</label>
        <input type="text" name="name" id="name" placeholder="name">
        <label>E-MAIL</label>
        <input type="email" name="email" id="email" placeholder="email">
        <label>CONTENT</label>
        <textarea class="bottom-fix" name="content" id="content" form="contact-form" cols="30" rows="10" placeholder="content"></textarea>
    </form>
    <input class="contact-submit bottom-fix --link-style_classic2" form="contact-form" type="submit" value="SEND" onclick="return checkRegisterForm()">
</div>
<style>
    
    html{
        font-size: 12px;
    }
    /* ----------------------- main -------------------------*/
    main {
        margin-bottom: 1.5rem;
    }

    .bottomLayer {
        padding: 2rem 3% 2rem;;
        background-color: rgba(255, 255, 255, 0.5);
    }


    .bottomLayer>* {
        margin-bottom: 1.5rem;
    }

    .block-title {
        /* width: 100%; */
        background-color: rgba(255, 255, 255, 0.5);
        padding: 2rem;
        display: flex;
        justify-content: center;
    }
    /* 內容文字 */

    .content {
        display: flex;
        flex-direction: column;
        padding: 1.5rem 1rem 1.5rem;
        justify-content: space-between;
    }
    .content>h3 {
        font-size: 1.5rem;
        color: #525252;
        text-align: center;
    }

    .content>p {
        margin-top: 1.5rem;
        font-size: 1.125rem;
    }
    /* form 表單 */
    .contact-form{
        display: flex;
        flex-direction: column;
    }
    .contact-form>*{
        margin-bottom: 1rem;
    }
    .contact-form>label{
        font-size: 1.2rem;
        font-weight: 500;
        text-indent: 0.5rem;
    }
    .contact-form textarea,.contact-form input{
        background-color: rgba(80, 80, 80, 0.5);
        color: rgb(223, 223, 223);
        font-size: 1.15rem;
    }
    .contact-form input{
        padding: 0.8rem;
    }
    .contact-form textarea{
        padding: 1.1rem 0.8rem 1.1rem;
    }

    /* contact submit */
    .contact-submit {
        width: 100%;
        padding: 2rem;
        font-size: 1.4rem;
        font-weight: 500;
        letter-spacing: 0.4rem;
    }


    /*  頁面下方的 CONTACT US */
    .--link-style_classic2 {
        background-color: rgb(255, 255, 255,0.5);
        color: rgb(75, 75, 75);
        transition: 0.5s;
        cursor: pointer;
    }

    .--link-style_classic2:hover {
        background-color: rgb(192, 192, 192);
        color: rgb(255, 255, 255);
        transition: .1s;
    }

    .--link-style_classic2:active {
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
<script src="/old/js/jquery-3.2.1.min.js"></script>
<script>
function checkRegisterForm() {
    if ($("#name").val() == "") {
        // alert(" 请输入你的名字！");
        alert("Please enter your Name！");
        $("#name").focus();
        return false;
    }
    if ($("#email").val() == "") {
        // alert(" 请输入您的电子邮件！");
        alert("Please enter your E-mail！");
        $("#email").focus();
        return false;
    }
    if ($("#content").val() == "") {
        // alert("请输入您的内容！"); 
        alert("Please enter your content！");    
        $("#content").focus();
        return false;
    }
    $("#coop-form").submit(function(e){
        fbq('track', 'Contact');
        alert("We will contact you quickly,Thank you~");
    });
}
</script>