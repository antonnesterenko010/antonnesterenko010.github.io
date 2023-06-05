<?php
$style_none_1 = $style_none_2 = $style_none_3 = $style_none_4 = $style_none_5 = 'style="display: none;" ' ;

$email  = get_post_meta( get_the_ID(), 'people_email', true );
$education  = get_post_meta( get_the_ID(), 'people_education', true );
$bar_admissions  = get_post_meta( get_the_ID(), 'people_admissions', true );
$bio_narrative  = get_post_meta( get_the_ID(), 'people_bio', true );
$representative_transactions  = get_post_meta( get_the_ID(), 'people_represent', true );
?>
<section class="info">
    <div class="container">
        <div class="info-l">
            <?php
            if(!empty($email)) $style_none_1 = '';
            ?>
            <div class="info-part" <?php echo $style_none_1 ?>>
                <div class="title">Email</div>
                <a type="email" href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
            </div>

            <?php
            if(!empty($education)) $style_none_2 = '';
            ?>
            <div class="info-part" <?php echo $style_none_2 ?>>
                <div class="title">Education</div>
                <div class="subtitle">
                    <?php echo $education ?>
                </div>
            </div>
            <?php
            if(!empty($bar_admissions)) $style_none_3 = '';
            ?>
            <div class="info-part" <?php echo $style_none_3 ?>>
                <div class="title">Bar Admissions</div>
                <div class="subtitle">
                    <?php echo $bar_admissions ?>
                </div>
            </div>
        </div>
        <div class="info-r">
            <?php
            if(!empty($bio_narrative)) $style_none_4 = '';
            if(!empty($representative_transactions)) $style_none_5 = '';
            ?>
            <div class="title-wrapper">
                <div class="title-1 title active" data-title="1" <?php echo $style_none_4 ?>>Bio Narrative</div>
                <div class="title-2 title" data-title="2" <?php echo $style_none_5 ?>>Representative Transactions</div>
            </div>
            <div class="content-wrapper" <?php echo $style_none_4 ?>>
                <div class="content-1 content active">
                    <?php echo $bio_narrative?>
                </div>
                <div class="content-2 content" <?php echo $style_none_5 ?>>
                    <?php echo $representative_transactions ?>
                </div>
            </div>
        </div>
    </div>
</section>