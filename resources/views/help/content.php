<section class="uis-animate uis-animate-fade-in">
    <?php if(isset($_SESSION['logged_in'])){ ?>
        <div class="uis-container uis-container-expand" style="margin: 120px 0px">
    <?php } else {?>
        <div class="uis-container uis-container-expand">
    <?php } ?>
        <div class="uis-header">
            <div class="uis-header-item">
                <p class="uis-text-lead uis-margin-remove-bottom">Frequently Asked Questions</p>
                <span class="uis-text-meta">Here are the most asked questions. If you can't find what you're looking for, please download our complete documentation.</span>
            </div>
            <div class="uis-header-item uis-text-right uis-visible@s">
                <a class="uis-button uis-button-primary" href="./public/files/sample.pdf" target="_blank"><i class="li li-download uis-display-inline-block" style="vertical-align: middle"></i> <span class="uis-display-inline-block uis-margin-xsmall-left" style="vertical-align: middle">Download Documentation</span></a>
            </div>
        </div>

        <a class="uis-button uis-button-primary uis-hidden@s uis-width-1-1" href="./public/files/sample.pdf" target="_blank"><i class="li li-download uis-display-inline-block" style="vertical-align: middle"></i> <span class="uis-display-inline-block uis-margin-xsmall-left" style="vertical-align: middle">Download Documentation</span></a>

        <div class="uis-container uis-margin-medium-top">
            <ul class="uis-accordion uis-accordion-default uis-accordion-border">
                <li>
                    <a class="uis-accordion-title"><span>How to bulk print certificates?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>1.) Check the checkbox of desired students that you to print.
2.) Click the <span class="uis-text-primary">Bulk Export</span> button in top right side of the page.
                        </pre>
                    </div>
                </li>

                <li>
                    <a class="uis-accordion-title"><span>What is the checkbox in the table head?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>It will instantly check all records in the table below.</pre>
                    </div>
                </li>

                <li>
                    <a class="uis-accordion-title"><span>How to print specific student/participant certificates?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>1.) Click the <span class="uis-text-primary">Print Preview</span> button of the student record row.</pre>
                    </div>
                </li>

                <li>
                    <a class="uis-accordion-title"><span>Why other course is not on the list of courses page?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>It's not yet added on the SABA Courses, this application is integrate on saba application so it will depends on the data of SABA application.</pre>
                    </div>
                </li>

                <li>
                    <a class="uis-accordion-title"><span>Do I need to fill-up all textbox in the filter sidebar?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>No, just fill the textbox that you want to be the base of filter.</pre>
                    </div>
                </li>

                <li>
                    <a class="uis-accordion-title"><span>What is the `Showing of # of # records` below the Course Certificate?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>The first # is the current data that loaded, the second # is the total of saba courses.

Note: You can scroll down to load more saba courses.
                        </pre>
                    </div>
                </li>

                <li>
                    <a class="uis-accordion-title"><span>What is the <span class="li li-circle-question"></span> icon after the title?</span> <i class="li li-angle-down uis-visible@s"></i></a>
                    <div class="uis-accordion-content">
                        <pre>It is called `tool-tip` a short message about the page that appears when a cursor position over the icon.
                        </pre>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</section>