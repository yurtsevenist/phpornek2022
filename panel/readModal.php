<div class="modal fade" id="readModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mesaj Oku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
         <form action="../php/readMessage.php" method="POST">
            <input type="hidden" name="id" id="id">
         <button type="submit" <?php if($_SESSION['who']==0) {echo 'hidden';} ?> class="btn btn-info">Okundu İşaretle</button>
         </form>
      </div>
    </div>
  </div>
</div>

<script>
        var mesajoku = document.getElementById('readModal')
        mesajoku.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('id') 
        var message = button.getAttribute('message')     
        var modal_p=mesajoku.querySelector('#message')       
        modal_p.textContent ="Mesaj : " + message            
        var modal_input=mesajoku.querySelector('#id')              
        modal_input.value=id;
    })
</script>

  