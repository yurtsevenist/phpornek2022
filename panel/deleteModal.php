<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mesaj Sil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Seçtiğiniz Mesaj Silinecektir, onaylıyormusunuz ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
         <form action="../php/deleteMessage.php" method="POST">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>" id="email">
         <button type="submit" class="btn btn-danger">Sil</button>
         </form>
      </div>
    </div>
  </div>
</div>

<script>
        var mesajsil = document.getElementById('deleteModal')
        mesajsil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('id')             
        var modal_input=mesajsil.querySelector('#id')              
        modal_input.value=id;
    })
</script>

  