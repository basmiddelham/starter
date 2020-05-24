<form role="search" method="get" class="search-form input-group mw-75" action="<?php echo home_url('/'); ?>">
  <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder') ?>"
      value="<?php echo get_search_query() ?>" name="s"
      title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
  <div class="input-group-append">
    <input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
  </div>
</form>
