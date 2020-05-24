@if(!empty($data['map']))
  @php wp_enqueue_script('google-maps', 'xxx', [], null, true); @endphp
  <div class="acf-map">
    <div class="marker" data-lat="<?php echo $data['map']['lat']; ?>" data-lng="<?php echo $data['map']['lng']; ?>"></div>
  </div>
@endif
