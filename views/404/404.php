<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 not found</title>
</head>

<style>
    a{
        /* all: initial; */
    }
    *{
        box-sizing: border-box !important;
    }
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #c4c4c4;
    }
    .img404{
        width: 80%;
        max-width: 1024px;
        height: auto;
    }

    /* 按鈕連結 */
    .homepage_btn {
        width: 80%;
        /* height: 60px; */
        /* padding: 1.5rem; */
        margin-top: 1rem;
        font-size: 1.5rem;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 0.2rem;
        /* background-color: #c4c4c4; */
        color: rgb(63, 63, 63);
        transition: 0.5s;
        cursor: pointer;
        
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .homepage_btn:hover {
        /* background-color: rgb(212, 212, 212); */
        color: rgb(134, 134, 134);
        transition: .1s;
    }

    .homepage_btn:active {
        /* background-color: rgb(82, 82, 82); */
        /* color: rgb(255, 255, 255); */
        transition: .1s;
    }

    @media screen and (max-width: 768px) {

        html{
            font-size: 10px;
        }

    }

</style>

<body>
    <!-- 1213132132 -->
    <img src="/img/404/404.jpg" alt="404.jpg" class="img404">
    <!-- <a href="/" class="homepage_btn ">Return Home</a> -->
    <a href="/" class="homepage_btn ">RETURN HOME</a>
</body>

</html>