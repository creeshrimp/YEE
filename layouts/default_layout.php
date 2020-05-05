<!DOCTYPE html>

<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDin</title>
    <!-- header css -->
    <link rel="stylesheet" href="/css/layouts/default_layout_header.css" >
    <link rel="stylesheet" href="/css/layouts/default_layout_header_RWD.css?v=<?=time()?>">
</head>

<!-- layout的寬度都盡量在這層設定 -->
<style>

html {
    overflow-y: scroll;
}

body{
    opacity: 0;
    overscroll-behavior-y: none;
}

.loaded{
    opacity: 1;
    transition: 1s;
}
</style>

<style>
    
    /* 隨意的reset */
    *{
        box-sizing: border-box;
        border: 0;
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
        /* chorme , 等等webkit內核的連結點擊都會有個神秘藍色特效，用下面這行重置 */
        -webkit-tap-highlight-color: rgba(0,0,0,0);

        /* 字型 */
        font-family: Arial,Helvetica,sans-serif;
    }
    *:hover{
        list-style: none;
        text-decoration: none;
    }
    /* 全域字體 */
    p{
        font-family: 'Noto Sans', sans-serif;
    }
    /* 內頁元素統一間距設定 */
    main>*{
        margin-bottom: 1.5rem;
    }
    /*  */
    header{
        width: 100%;
        max-width: 1200px;
        font-size: 16px;
    }
    main{
        width: 96%;
        max-width: 1200px;
        margin-top: 170px;
    }
    footer{
        width: 100%;
        max-width: 1200px;
        /* min-width: 500px; */
        margin: 1.5rem 0 0.5rem;
    }

    /* bg class */
    .bgconfig{
        background-image: url(/img/BG.png);
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        display: flex;
    }

    /* 常用class */
    .flex-center{
        justify-content: center;
        align-items: center;
    }
    .flex-dir-col{
        flex-direction: column;
    }
    /* 陰影 */
    .div_shadow{
        box-shadow: 1px -3px 10px -3px #333333;
    }
    .testContent{
        height: 500px;
        display: flex;
    }
    /*  *           主題             *   */
    .--main_bgcolor{
        background-color: rgba(255,255,255,0.5);
    }

    /*               全域CSS              */

    /* 大標題 */
    .static_h1 {
        padding: 28px;
        background-color: rgba(255, 255, 255, 0.5);
        color: #292929;
        font-size: 30px;
        /* font-family: 'Noto Serif TC', serif; */
        text-align: center;
    }
    @media screen and (min-width: 500px) {
        .static_h1 {
            padding: 36px;
            font-size: 36px;
        }
    }


    
</style>
<!-- 讓 body在 onload 之後才出現，classname 前面一定要空一格 -->
<body onload="document.body.className +=' loaded';" class="bgconfig flex-dir-col flex-center">
    <header class="flex-center">
        <?php require("header.php") ?>
    </header>
    <main id="main" class=" flex-center">
        <!-- <div  class="testContent flex-center">main content</div> -->
        <?php 
        echo $output_view;
        ?>
    </main>
    <footer  class="flex-center">
        <?php require("footer.php") ?>
    </footer>
    <!-- <script>document.getElementById('main').classList.add('loaded');</script> -->
</body>
</html>


