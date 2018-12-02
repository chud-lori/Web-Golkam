<div class="white-box">
    <!-- <h3 class="box-title m-b-0">Tinymce wysihtml5</h3>
    <p class="text-muted m-b-30">Bootstrap html5 editor</p> -->
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label for="">Title</label><br>
        <input type="text" placeholder="Blog title.." name="title_content"><br>
        <label for="">Image</label>
        <input type="file" name="img_content"><br>
        <!-- <label for="">Konten</label> -->
        <textarea name="body_content" id="mymce" cols="30" rows="10"></textarea><br>
        <input type="submit" class="btn btn-primary" name="submit_content" value="Post!">
    </form>
</div>
<!-- wysuhtml5 Plugin JavaScript -->
<script src="/golkam/assets/profile//plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });
    </script>