<div id="modal-add-column" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
  <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="modal-overlay flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      
      <div class="modal-content relative transform overflow-hidden rounded-lg bg-gray-100 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
        <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <!-- COLUMN TYPES -->
          <div class="column-types columns-2">
            <div class="column-type bg-white hover:shadow-sm" data-type="text">Text</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="textarea">Textarea</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="number">Number</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="select">Select</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="radio">Radio</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="checkbox">Checkbox</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="image">Image</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="gallery">Gallery</div>
            <div class="column-type bg-white hover:shadow-sm" data-type="file">File</div>
          </div>
           <!-- COLUMN PARAMS -->
          <form method="post" class="column-params" style="display: none" data-type="text">
              <input type="hidden" name="type" value="text" />
              <div class="grid grid-cols-2 gap-4">
                <?=Template::getInput('text', 'name', 'Name', '', true)?>
                <?=Template::getInput('text', 'label', 'Label', '', true)?>
              </div>
              <div class="w-full text-right">
                <button class="mt-4 green" type="submit">Potvrdit</button>
              </div>
          </form>
        </div>
        
      </div>

    </div>
  </div>
</div>

<script>
$(function(){

  const columns = [];

  $('form.column-params').submit(function(e){
    e.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    columns.push(data);
    //console.log(JSON.stringify(columns));
  })

  $('.add-column').click(function(){
    $('#modal-add-column').show();
  })

  // zavření klávesou ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      $('#modal-add-column').hide();
    }
  });

  $('.column-types .column-type').click(function(){
    const type = $(this).data('type');
    $(`.column-types`).hide();
    $(`.column-params[data-type='${type}']`).show();
  })
})
</script>