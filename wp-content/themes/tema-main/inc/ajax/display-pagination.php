<?php
    function displayPagination($wp_query){
        $no_of_pages = $wp_query->max_num_pages;

        $activePage = isset($_POST['page']) ? $_POST['page'] : 1;

        if($no_of_pages > 1):
            $lastPage = true; ?>
            <ul class="custom-pagination">
                <button <?php if($activePage === 1) echo 'disabled';?> class="page-numbers page-numbers-prev"><?php svg("pointer");?></button>
                <button class="page-numbers active-page">1</button>
                <?php if($activePage > 4): ?>
                    <span class="page-numbers__more">...</span>
                    <?php $pageLoop = $activePage + 1;
                    if($pageLoop >= $no_of_pages - 1) {
                        $pageLoop = $no_of_pages;
                        $lastPage = false;
                    } ?>
                    <?php for($i = $activePage - 1; $i <= $pageLoop; $i++):?>
                        <button class="page-numbers"><?php echo $i;?></button>
                    <?php endfor;
                else:?>
                    <?php
                    $pageLoop = $activePage + 2;
                    if($pageLoop >= $no_of_pages) {
                        $pageLoop = $no_of_pages;
                        $lastPage = false;
                    } ?>
                    <?php for($i = 2; $i <= $pageLoop; $i++):?>
                        <button class="page-numbers"><?php echo $i;?></button>
                    <?php endfor;?>
                <?php endif;
                if($lastPage):?>
                    <?php if($no_of_pages > 4):?>
                        <span class="page-numbers__more">...</span>
                    <?php endif;?>
                    <button class="page-numbers"><?php echo $no_of_pages; ?></button>
                <?php endif; ?>
                <button <?php if($activePage === $no_of_pages) echo 'disabled';?> class="page-numbers page-numbers-next"><?php svg("pointer");?></button>
            </ul>
        <?php endif;
    }
?>