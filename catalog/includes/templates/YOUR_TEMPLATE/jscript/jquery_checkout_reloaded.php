<?php
if (isset($_GET['cPath']) && $_GET['cPath'] != '' && defined(CAT_DESC_READMORE_ENABLED) && CAT_DESC_READMORE_ENABLED == 'True') {
    ?>
    <style>
        .readLessDiv img{
            display:none;
        }
    </style>
    <script>
        $(document).ready(function () {
            var showHeight = "<?php echo CAT_DESC_READMORE_HEIGHT; ?>";
            var moreText = "<?php echo CAT_DESC_READMORE_MORE_TEXT; ?>";
            var lessText = "<?php echo CAT_DESC_READMORE_LESS_TEXT; ?>";
            var descDiv = "<?php echo CAT_DESC_READMORE_LESS_DIV; ?>";
            var descDivSub = "<?php echo CAT_DESC_READMORE_LESS_DIV_SUB; ?>";
            $('#' + descDiv).after('<span id="readMoreLess"></span>');
            $('#' + descDivSub).after('<span id="readMoreLess"></span>');

            function readMore() {
                $("#readMoreLess").text(moreText);
                $('#' + descDiv).css('height', showHeight);
                $('#' + descDiv).css('overflow', 'hidden');
                $('#' + descDivSub).css('height', showHeight);
                $('#' + descDivSub).css('overflow', 'hidden');
                $("#readMoreLess").removeClass("readMore").addClass("readLess");
                $('#' + descDiv).removeClass("readMoreDiv").addClass("readLessDiv");
                $('#' + descDivSub).removeClass("readMoreDiv").addClass("readLessDiv");
            }
            function readLess() {
                $("#readMoreLess").text(lessText);
                $('#' + descDiv).css('height', '');
                $('#' + descDiv).css('overflow', '');
                $('#' + descDivSub).css('height', '');
                $('#' + descDivSub).css('overflow', '');
                $("#readMoreLess").removeClass("readLess").addClass("readMore");
                $('#' + descDiv).removeClass("readLessDiv").addClass("readMoreDiv");
                $('#' + descDivSub).removeClass("readLessDiv").addClass("readMoreDiv");
            }

            $(document).on('click', ".readLess", function () {
                readLess()
            })
            $(document).on('click', ".readMore", function () {
                readMore()
            });
            readMore()

        });
    </script>
    <?php
}