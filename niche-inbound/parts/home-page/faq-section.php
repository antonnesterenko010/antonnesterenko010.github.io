<?php

$section_title = get_post_meta( get_the_ID(), 'faq_title', true );
$entries = get_post_meta( get_the_ID(), 'faq_list', true );
?>
<section class="faq" id="faqs">
    <div class="container">
        <div class="faq-title heading-1 heading">
            <?php echo $section_title ?>
        </div>
        <div class="faq-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $question = isset($entry['faq_question'])?$entry['faq_question']:"";
            $answer = isset($entry['faq_answer'])?$entry['faq_answer']:"";
            ?>
            <div class="faq-item">
                <div class="question heading-3">
                    <?php echo $question ?>
                </div>
                <div class="answer heading-4">
                    <?php echo $answer ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>