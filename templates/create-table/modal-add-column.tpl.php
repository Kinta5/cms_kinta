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
            <!-- INPUT TEXT -->
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
            <!-- INPUT TEXTAREA -->
            <form method="post" class="column-params" style="display: none" data-type="textarea">
              <input type="hidden" name="type" value="textarea" />
              <div class="grid grid-cols-2 gap-4">
                <?=Template::getInput('text', 'name', 'Name', '', true)?>
                <?=Template::getInput('text', 'label', 'Label', '', true)?>
              </div>
              <div class="w-full text-right">
                <button class="mt-4 green" type="submit">Potvrdit</button>
              </div>
            </form>
            <!-- INPUT NUMBER -->
            <form method="post" class="column-params" style="display: none" data-type="number">
              <input type="hidden" name="type" value="number" />
              <div class="grid grid-cols-2 gap-4">
                <?=Template::getInput('text', 'name', 'Name', '', true)?>
                <?=Template::getInput('text', 'label', 'Label', '', true)?>
                <?=Template::getSelect('type', 'Typ', ['int'=>'int', 'decimal'=>'decimal', 'float'=>'float', 'double'=>'double'], '', true)?>
                <?=Template::getInput('text', 'length', 'Délka/Množina', '', true)?>
              </div>
              <div class="w-full text-right">
                <button class="mt-4 green" type="submit">Potvrdit</button>
              </div>
            </form>
            <!-- SELECT -->
            <form method="post" class="column-params" style="display: none" data-type="select">
              <input type="hidden" name="type" value="select" />
              <div class="grid grid-cols-2 gap-4">
                <?=Template::getInput('text', 'name', 'Name', '', true)?>
                <?=Template::getInput('text', 'label', 'Label', '', true)?>
                <?=Template::getInput('text', 'values', 'Hodnoty (;)', '', true)?>
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

  // Přidání nového sloupce (FORM)
  $('form.column-params').submit(function(e){
    e.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    
    var post = $.post( "", { column_data: data } );
    post.done(function(response){
      $('.columns').append(response);
    });
    
    $('#modal-add-column input:not([name="type"])').val('');
    $('.column-params').hide();
    $('.column-types').show();
  })

  // Otevřít modal s datovými typy
  $('.add-column').click(function(){
    $('#modal-add-column').show();
  })

  // Zobrazení vstupů pro daný datový typ
  $('.column-types .column-type').click(function(){
    const type = $(this).data('type');
    $(`.column-types`).hide();
    $(`.column-params[data-type='${type}']`).show();
  })

  // zavření klávesou ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      $('#modal-add-column').hide();
    }
  });

})
</script>