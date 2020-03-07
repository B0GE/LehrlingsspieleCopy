<?php
error_reporting(0);
session_start();
if(isset($_SESSION['sessionid'])) {
    ?>

    <div id="loader_container">
        <div id="loader">
            <div id="d1"></div>
            <div id="d2"></div>
            <div id="d3"></div>
            <div id="d4"></div>
            <div id="d5"></div>
        </div>
    </div>

    <div class="menu-button">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <nav>
        <ul>
            <li><a href="<?php if ($page == 'home') {
                    echo '#';
                } else {
                    echo '../';
                } ?>" class="<?php if ($page == 'home') {
                    echo 'current';
                } ?>"><span>Home</span></a></li>
            <li><a href="<?php if ($page == 'teams') {
                    echo '#';
                } elseif ($page == 'home') {
                    echo 'team';
                } else {
                    echo '../team';
                } ?>" class="<?php if ($page == 'teams') {
                    echo 'current';
                } ?>"><span>Teams Erstellen</span></a></li>
            <li><a href="<?php if ($page == 'points') {
                    echo '#';
                } elseif ($page == 'home') {
                    echo 'punkte';
                } else {
                    echo '../punkte';
                } ?>" class="<?php if ($page == 'points') {
                    echo 'current';
                } ?>"><span>Punkte</span></a></li>
            <li><a href="<?php if ($page == 'edit') {
                    echo '#';
                } elseif ($page == 'home') {
                    echo 'bearbeiten';
                } else {
                    echo '../bearbeiten';
                } ?>" class="<?php if ($page == 'edit') {
                    echo 'current';
                } ?>"><span>Bearbeiten</span></a></li>
            <li><a href="<?php if ($page == 'settings') {
                    echo '#';
                }
                if ($page == 'home') {
                    echo 'einstellungen';
                } else {
                    echo '../einstellungen';
                } ?>" class="<?php if ($page == 'settings') {
                    echo 'current';
                } ?>"><span>Einstellungen</span></a></li>
                <li><a href="<?php if ($page == 'quidditch') {
                        echo '#';
                    }
                    if ($page == 'home') {
                        echo 'quidditch/';
                    } else {
                        echo '../quidditch';
                    } ?>" class="<?php if ($page == 'quidditch') {
                        echo 'current';
                    } ?>"><span>Quidditch</span></a></li>
            <li><a href="?logout=1"><span>Logout</span></a></li>
        </ul>
    </nav>

    <?php
}
    ?>
