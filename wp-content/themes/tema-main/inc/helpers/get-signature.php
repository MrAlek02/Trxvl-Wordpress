<?php
    function get_signature(){?>
        <small class="copyright">
            <?php if(get_locale()=='sr_RS' || get_locale()=='bs_BA' || get_locale()=='hr') { ?>
                &copy; <?php echo date("Y"); ?> Copyright <?php bloginfo( 'name' ); ?>. Sva prava zadržana. Design by <a href="https://www.popwebdesign.net/" title="Web dizajn agencija">Popart Studio</a>
            <?php } elseif(get_locale()=='de_DE' || get_locale()=='de_CH' || get_locale()=='nl_NL') { ?>
                &copy; <?php echo date("Y"); ?> Copyright <?php bloginfo( 'name' ); ?>. Alle Rechte vorbehalten. Webdesign <a href="https://www.popwebdesign.de/" title="Webdesign-Agentur">Popart Studio</a>
            <?php } else { ?>
                &copy; <?php echo date("Y"); ?> Copyright <?php bloginfo( 'name' ); ?>. All rights reserved. Design by <a href="https://www.popwebdesign.net/index_eng.html" title="Digital agency">Popart Studio</a>
            <?php } ?>
        </small>
<?php }?>