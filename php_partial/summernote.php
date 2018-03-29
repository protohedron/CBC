<script>
    //Summernote init
    $(document).ready(function () {
        $('#summernote_<?php echo $id ?>').summernote({
            tabsize: 2,
            height: 70
        });
        $('#summernote_<?php echo $id. "_2" ?>').summernote({
            tabsize: 2,
            height: 70
        });
        $('textarea').html($('#summernote_<?php echo $id?>').code());
    });
</script>