<?php
namespace Vincit\template;

function AlternatingBlock($data = []) {
  $order = $data["order"] ? "reverse" : "normal";
  $hasShortcode = $data["secondary_content"]["embed_a_shortcode"];
  $background = $data["background"];
  $bgImage = $background["image"]["url"] ?? false;
  $bgColor = $background["color"]; ?>
  <div class="alternating-block bg-<?=$bgColor?>" style="background-image: url('<?=$bgImage?>')">
    <div class="container <?=$order?> <?=$hasShortcode ? "shortcode" : ""?>">
      <div class="alternating-block__main">
        <?=$data["content"]?>
      </div>

      <div class="alternating-block__secondary">
      <?php if ($hasShortcode) {
        echo do_shortcode($data["secondary_content"]["shortcode"]);
      } else {
        echo $data["secondary_content"]["image"]
          ? \Vincit\WP\image($data["secondary_content"]["image"], "large", false)
          : '<!-- no image selected -->';
      } ?>
      </div>
    </div>
  </div> <?php
}