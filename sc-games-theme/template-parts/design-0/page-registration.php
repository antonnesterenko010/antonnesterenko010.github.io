<section class="content__form register">
    <div class="container">
        <div class="content-block">
            <div class="content-title">
                <?php the_title(); ?>
            </div>
            <a id="form_anchor"></a>
            <form method="POST" action="#form_anchor">
                <div class="form-block">
                    <div class="form-group">
                        <div class="label-wrapper required">
                            <label for="r_name">Name</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" id="r_name" name="r_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label-wrapper required">
                            <label for="r_pass">Password</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="password" id="r_pass" name="r_pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label-wrapper required">
                            <label for="r_email">Email</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" id="r_email" name="r_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label-wrapper required">
                            <label for="r_pass_confirm">Confirm Password</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="password" id="r_pass_confirm" name="r_pass_confirm">
                        </div>
                    </div>
                </div>
                <div class="submit-block">
                    <input type="submit" class="submit-btn" value="Submit">
                </div>
            </form>
        </div>
    </div>
</section>

<div class="modal-overlay">
    <div class="modal-window">
        <div class="modal-close">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/close.svg" alt="star">
        </div>
        <div class="modal-content">
            <div class="decor">
                <div class="top-star star">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/modal-top-star.svg" alt="star">
                </div>
                <div class="bottom-star star">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/modal-bottom-star.svg" alt="star">
                </div>
            </div>
            <div class="modal-title">Thank you for your registration!</div>
            <div class="modal-btn">
                <div class="name">Ok</div>
            </div>
        </div>
    </div>
</div>