<?php
$appBg = get_field("app_background");
$appTitle = get_field("app_title");
$appImg = get_field("app_image");
$appDesc = get_field("app_description");

?>



<div class="app | js-app">
    <div class="app-bg" style="background-image: url(<?= $appBg ?>)">
        <div class="app-container">
            <div class="app-mockup | js-mobile">
                <img src="<?= $appImg ?>" />
            </div>
            <div class="app-content | js-content">
                <h1><?= $appTitle ?></h1>
                <h2> <?= $appDesc ?></h2>
                <div class="app-inputs">
                    <div class="app-input | js-content">
                        <button class="active"><?php echo get_field("button_mobile") ?></button>
                        <button><?php echo get_field("button_email") ?></button>
                        <p><?php echo get_field("app_text") ?></p>
                        <div class="app-src-input | js-content">
                            <input type="text" placeholder="<?php echo get_field("search_text") ?>" />
                            <button class="app-src-btn"><?php echo get_field("button_search") ?></button>
                        </div>
                    </div>
                    <div class="app-input | js-content">
                        <svg
                            width="2"
                            height="57"
                            viewBox="0 0 2 57"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line
                                opacity="0.2"
                                x1="0.641649"
                                y1="0.144043"
                                x2="0.641647"
                                y2="56.9825"
                                stroke="white"
                                stroke-width="1.10703" />
                        </svg>
                        <p>or</p>
                        <svg
                            width="2"
                            height="57"
                            viewBox="0 0 2 57"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line
                                opacity="0.2"
                                x1="0.641649"
                                y1="0.144043"
                                x2="0.641647"
                                y2="56.9825"
                                stroke="white"
                                stroke-width="1.10703" />
                        </svg>
                    </div>
                    <div class="app-input | js-content">
                        <img src="<?php echo get_field("google_store") ?>" />
                        <img src="<?php echo get_field("app_store") ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>