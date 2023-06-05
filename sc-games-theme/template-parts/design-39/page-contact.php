<?php
$prefix = 'contact_page_';
$name_label = get_post_meta(get_the_ID(), $prefix . '_name_label', true);
$email_label = get_post_meta(get_the_ID(), $prefix . '_email_label', true);
$message_label = get_post_meta(get_the_ID(), $prefix . '_message_label', true);
$submit_label = get_post_meta(get_the_ID(), $prefix . '_submit_label', true);
$answer_text = get_post_meta(get_the_ID(), $prefix . '_answer_text', true);
$answer_button_label = get_post_meta(get_the_ID(), $prefix . '_answer_button_label', true);
?>
<section class="content__form contact">
    <div class="container">
        <div class="content-block">

            <a id="form_anchor"></a>

            <div class="form__wrapper">
                <form class="" method="POST" action="#form_anchor">
                    <div class="form-block-wrapper">
                        <div class="content-title main-title-big">
                            <?php the_title(); ?>
                        </div>

                        <div class="form-block">
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <input type="text" id="r_name" name="r_name" placeholder="<?php echo !empty($name_label) ? $name_label : 'Full Name'; ?>*">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <input type="text" id="r_email" name="r_email" placeholder="<?php echo !empty($email_label) ? $email_label : 'Email'; ?>*">
                                </div>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <textarea name="r_textarea" id="" cols="30" rows="10" placeholder="<?php echo !empty($message_label) ? $message_label : 'Message'; ?>"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-block">
                        <input type="submit" class="form-submit-btn main-button"
                               value="<?php echo !empty($submit_label) ? $submit_label : 'Send'; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>