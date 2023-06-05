<?php
$prefix = 'contact_page_';
$name_label = get_post_meta(get_the_ID(), $prefix . '_name_label', true);
$email_label = get_post_meta(get_the_ID(), $prefix . '_email_label', true);
$message_label = get_post_meta(get_the_ID(), $prefix . '_message_label', true);
$submit_label = get_post_meta(get_the_ID(), $prefix . '_submit_label', true);
$answer_text = get_post_meta(get_the_ID(), $prefix . '_answer_text', true);
$answer_button_label = get_post_meta(get_the_ID(), $prefix . '_answer_button_label', true);
?>
<main>
    <section class="content__form contact">
        <div class="container">
            <div class="content-title main-title-big">
                <?php the_title(); ?>
            </div>
            <div class="content-block">
                <a id="form_anchor"></a>
                <form class="" method="POST" action="#form_anchor">
                    <div class="form-block-wrapper">
                        <div class="form-block">
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_name"><?php echo !empty($name_label) ? $name_label : 'Name'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M15.2166 17.3323C13.9349 15.9008 12.0727 15 10 15C7.92734 15 6.06492 15.9008 4.7832 17.3323M10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10C19 14.9706 14.9706 19 10 19ZM10 12C8.34315 12 7 10.6569 7 9C7 7.34315 8.34315 6 10 6C11.6569 6 13 7.34315 13 9C13 10.6569 11.6569 12 10 12Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <input type="text" placeholder="<?php echo !empty($name_label) ? $name_label : 'Full Name'; ?>*" id="r_name" name="r_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_email"><?php echo !empty($email_label) ? $email_label : 'Email'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <svg class="input-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4.99999V8.99999C11 10.1046 11.8954 11 13 11C14.1046 11 15 10.1046 15 8.99999V7.99999C15 6.50214 14.5197 5.04381 13.6294 3.83928C12.7391 2.63475 11.4856 1.74756 10.0537 1.30809C8.62179 0.868619 7.08657 0.900017 5.67383 1.39772C4.26109 1.89543 3.04534 2.83319 2.20508 4.07315C1.36482 5.31311 0.94457 6.78985 1.00587 8.28644C1.06717 9.78303 1.60689 11.2205 2.54574 12.3876C3.48459 13.5547 4.7732 14.3899 6.22191 14.7704C7.67062 15.1509 9.20295 15.0566 10.5941 14.5015M11 7.99999C11 9.65684 9.65686 11 8 11C6.34315 11 5 9.65684 5 7.99999C5 6.34313 6.34315 4.99999 8 4.99999C9.65686 4.99999 11 6.34313 11 7.99999Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <input type="text" placeholder="<?php echo !empty($email_label) ? $email_label : 'Email'; ?>*" id="r_email" name="r_email">
                                </div>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="form-group form-group-full">
                                <div class="label-wrapper required">
                                    <label for="r_email"><?php echo !empty($message_label) ? $message_label : 'Message'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <textarea placeholder="<?php echo !empty($message_label) ? $message_label : 'Message'; ?>" name="r_textarea" id="" cols="30" rows="10"></textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-block">
                        <input type="submit" class="form-submit-btn main-button"
                               value="<?php echo !empty($submit_label) ? $submit_label : 'Submit'; ?>">
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
