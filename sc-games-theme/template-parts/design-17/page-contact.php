<?php
$prefix = 'contact_page_';
$name_label = get_post_meta(get_the_ID(), $prefix . '_name_label', true);
$email_label = get_post_meta(get_the_ID(), $prefix . '_email_label', true);
$message_label = get_post_meta(get_the_ID(), $prefix . '_message_label', true);
$submit_label = get_post_meta(get_the_ID(), $prefix . '_submit_label', true);
$answer_text = get_post_meta(get_the_ID(), $prefix . '_answer_text', true);
$answer_button_label = get_post_meta(get_the_ID(), $prefix . '_answer_button_label', true);
?>
<main class="static">
    <section class="content__form contact">
        <div class="container">
            <div class="content-block">
                <div class="content-wrapper block-bg">
                  <h3 class="title">
                    <?php the_title(); ?>
                  </h3>
                  <div class="form-wrapper">
                    <a id="form_anchor"></a>
                    <form class="" method="POST" action="#form_anchor">
                      <div class="form-block-wrapper">
                        <div class="form-block">
                          <div class="block-l">
                            <div class="form-group">
                              <div class="label-wrapper required">
                                <label for="r_name"><?php echo !empty($name_label) ? $name_label : 'Name'; ?></label>
                              </div>
                              <div class="input-wrapper">
                                <input type="text" id="r_name" name="r_name">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="label-wrapper required">
                                <label for="r_email"><?php echo !empty($email_label) ? $email_label : 'Email'; ?></label>
                              </div>
                              <div class="input-wrapper">
                                <input type="text" id="r_email" name="r_email">
                              </div>
                            </div>
                          </div>
                          <div class="block-r">
                            <div class="form-group">
                              <div class="label-wrapper required">
                                <label for="r_textarea"><?php echo !empty($message_label) ? $message_label : 'Message'; ?></label>
                              </div>
                              <div class="input-wrapper">
                                <textarea name="r_textarea" id="" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="submit-block">
                        <input type="submit" class="form-submit-btn btn"
                               value="<?php echo !empty($submit_label) ? $submit_label : 'Register'; ?>">
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </section>
</main>