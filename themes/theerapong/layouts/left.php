<?php

use yii\helpers\Html;
use yii\helpers\Url;
use mdm\admin\components\Helper;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= \Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i></a>
            </div>
        </div>

        <div class="input-group">
            <br>
        </div>
        <!-- search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
       /.search form -->

        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        //
                            ['label' => 'ระบบแจ้งงาน', 'options' => ['class' => 'header']],
                            ['label' => 'ตารางการแจ้งงาน', 'icon' => 'tasks text-orange', 'url' => ['/orders/index']],
                            ['label' => 'ปฏิทินการแจ้งงาน', 'icon' => 'calendar text-orange', 'url' => ['/orders/calendar'],],
                        //
                        ['label' => 'ตั้งค่าระบบ', 'options' => ['class' => 'header']],
                            [
                            'label' => 'ตั้งค่าระบบ',
                            'icon' => 'cog text-red',
                            'url' => '#',
                            'items' => [
                                    ['label' => 'งานที่รับการอนุมัติ', 'icon' => 'circle-o text-yellow', 'url' => ['/approved'],],
                                    ['label' => 'จัดการงาน', 'icon' => 'circle-o text-blue', 'url' => ['/actions'],],
                                    ['label' => 'แผนกที่รับมอบหมาย', 'icon' => 'circle-o text-red', 'url' => ['/assign'],],
                                    ['label' => 'หน่วยงาน', 'icon' => 'circle-o text-red', 'url' => ['/departments'],],
                                    ['label' => 'สถานะงาน', 'icon' => 'circle-o text-red', 'url' => ['/status'],],
                                    ['label' => 'ประเภทการดำเนินการ', 'icon' => 'circle-o text-red', 'url' => ['/forward'],],
                                    ['label' => 'จัดการผู้ใช้', 'icon' => 'circle-o text-red', 'url' => ['/user/admin'],],
                                    ['label' => 'จัดการสิทธิ์', 'icon' => 'circle-o text-red', 'url' => ['/admin'],],
                                    ['label' => 'รายงาน', 'icon' => 'file text-green', 'url' => ['/report'],],
                                    ['label' => 'สร้าง Chart', 'icon' => 'file text-orange', 'url' => ['/chartbuilder'],],
                            ],
                        ],
                        //
                        ['label' => 'เข้าสู่ระบบ', 'options' => ['class' => 'header']],
                            ['label' => 'Sign in', 'url' => ['/user/security/login']],
                    /*
                      [
                      'label' => 'Logout ' . \Yii::$app->user->identity->username . '',
                      'url' => ['/user/security/logout'],
                      'data' => ['data-method' => 'post']
                      ],
                     */
                    /*
                      ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                      ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                      ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                      ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                      [
                      'label' => 'Some tools',
                      'icon' => 'share',
                      'url' => '#',
                      'items' => [
                      ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                      ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                      [
                      'label' => 'Level One',
                      'icon' => 'circle-o',
                      'url' => '#',
                      'items' => [
                      ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                      [
                      'label' => 'Level Two',
                      'icon' => 'circle-o',
                      'url' => '#',
                      'items' => [
                      ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                      ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                      ],
                      ],
                      ],
                      ],
                      ],
                      ],
                     */
                    ],
                ]
        )
        ?>
        <i></i> <div class="sidebar-menu tree"><a href="<?= Url::to(['/user/security/logout']) ?>" data-method="post">Logout <?= \Yii::$app->user->identity->username ?></a></div>
    </section>

</aside>
