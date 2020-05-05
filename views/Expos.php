<?php
$allYears = $_DATA['year_result'];
$allExpos = $_DATA['all_result'];
?>

<!-- function Template -->
<link rel="stylesheet" href="/views/fragments/tab-menu.css?v=<?= time() ?>">
<script src="/views/fragments/tab-menu.js"></script>

<?php

// 上方年分 的 Tabmenu
function ExposTabMenu($years){ ?>
    <div class="tab">
        <?php foreach ($years as $y) :
            // 多一個判斷是否為今年的tab，是就加上active(變成白色) 
            $isActive = ($y->startYear == date('Y')) ? 'active' : '' ?>
            <button class="tablinks <?= $isActive ?>" onclick="switchContent(event, 'expo-<?= $y->startYear ?>')">
                <?= $y->startYear ?>
            </button>
        <?php endforeach ?>
    </div>
    <?php
}

// 下面的 content
function ExposTabContent($years, $exposes){
    foreach ($years as $y) :
        $isShow = ($y->startYear == date('Y')) ? 'display:flex' : 'display:none' ?>
        <!-- tabContent -->
        <div id="expo-<?= $y->startYear ?>" class="bottomLayer tabcontent" style=<?= $isShow ?>>
            <?php
            foreach ($exposes as $rs) {
                // 有英文名就顯示英文名，沒英文名就中文名
                $name = !empty($rs->name_en) ? $rs->name_en : $rs->name_cn;
                $date = date("M d", strtotime($rs->start_dt)) . ' - ' . date("M d", strtotime($rs->end_dt)) . ', ' . date("Y", strtotime($rs->start_dt));
                $year = date("Y", strtotime($rs->start_dt));
                $img_dir = $rs->img;
                $expos_url = $rs->url;
                // location 值 判斷， 因為資料庫有缺值，所以要額外做判斷
                if (!empty($rs->address)) {
                    $location = $rs->address;
                } elseif (!empty($rs->location_en)) {
                    $location = $rs->location_en;
                } else {
                    $location = $rs->location_cn;
                }
                if ($year == $y->startYear) {
                    ExposGroup($name, $date, $location, $img_dir, $expos_url);
                }
            }
            ?>
        </div>
    <?php endforeach;
}

//  單一展覽的group
function ExposGroup($name, $date, $location, $img_dir, $expos_url){ ?>
    <section class="expo-group">
        <a href=http://<?= $expos_url ?>>
            <img class="banner" src=<?= $img_dir ?>>
        </a>
        <div class="info-group">
            <h3 class="info">
                <?= $name ?>
            </h3>
            <span class="info">
                <?= $date ?>
            </span>
            <span class="info">
                <?= $location ?>
            </span>
        </div>
    </section>
<?php } ?>
<!-- Template End -->


<!--          !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!             HTML 本體          !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!     -->
<!-- 標題 -->
<h1 class="static_h1">EXPOSITIONS </h1>
<!-- 上方年分 的 Tabmenu -->
<?php ExposTabMenu($allYears) ?>
<!-- 下面的 content -->
<?php ExposTabContent($allYears, $allExpos) ?>


<!-- -------------      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  HTML End  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --------------- -->

<style>
    html {
        font-size: 10px;
        overflow-y: scroll;
    }

    /* ----------------------- main -------------------------*/

    .bottomLayer {
        /* 小畫面的時候邊界縮成2% */
        padding: 1.5rem 2% 1.5rem 2%;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .block-title {
        /* width: 100%; */
        /* font-size: 36px; */
        background-color: rgba(255, 255, 255, 0.5);
        padding: 2rem;
        display: flex;
        justify-content: center;
    }

    /* -- 展覽本體 -- */

    .expo-group {
        margin-bottom: 1.5rem;
        display: flex;
        flex-direction: column;
    }

    .expo-group:last-child {
        margin-bottom: 0;
    }

    /* banner */
    .banner {
        width: 100%;
    }

    /* info */
    .info-group {
        text-align: center;
        display: flex;
        justify-content: space-between;
    }

    .info {
        background-color: rgba(255, 255, 255, 0.5);
        padding: 0.9rem 0.1rem 0.9rem;
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    /* 小螢幕的時候資訊藏起來 */
    .info-group>:last-child {
        display: none;
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
    @media screen and (min-width: 450px) {
        html {
            font-size: 14px;
        }
    }

    @media screen and (min-width: 768px) {

        html {
            font-size: 16px;
        }

        .info-group>:last-child {
            display: flex;
        }
    }
</style>
<?php

?>