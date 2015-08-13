<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" onfocus="if (this.value == 'Search here') {
                this.value = '';
            }" onblur="if (this.value == '') {
                        this.value = 'Search here';
                    }"  value="Search here" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="" />
</form>
<div class="clear"></div>
