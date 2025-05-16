</main>
<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-center small">
      <div class="text-muted">&copy; Baus 2025</div>
    </div>
  </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="/assets/js/admincripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="/assets/demo/chart-area-demo.js"></script>
<script src="/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
tinymce.init({
  selector: 'textarea',
  plugins: [
    // Core editing features
    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
    'searchreplace', 'table', 'visualblocks', 'wordcount',
    // Your account includes a free trial of TinyMCE premium features
    // Try the most popular premium features until May 23, 2025:
    'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker',
    'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
    'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
    'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
  ],
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [{
      value: 'First.Name',
      title: 'First Name'
    },
    {
      value: 'Email',
      title: 'Email'
    },
  ],
  ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
    'See docs to implement AI Assistant')),
});
</script>
<script src="/assets/js/datatables.js"></script>

</body>

</html>