<?php if ((is_active_sidebar('footer-sidebar-1')) || (is_active_sidebar('footer-sidebar-2'))) : ?>        
    <div class="sidebar-wrapper">    
        <div id="sidebar">
            <?php if (is_active_sidebar('footer-sidebar-1')): ?>
                <ul id="footer-sidebar-1">
                    <?php dynamic_sidebar('footer-sidebar-1'); ?>
                </ul>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-sidebar-2')): ?>	
                <ul id="footer-sidebar-2">
                    <?php dynamic_sidebar('footer-sidebar-2'); ?>
                </ul>
            <?php endif; ?>
        </div>           
    </div>           
<?php endif; ?>