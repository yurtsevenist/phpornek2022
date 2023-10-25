<div class="modal fade" id="answerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="email">Mesaj Gönderen : ?</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../php/answerMessage2.php" method="POST">
            <div class="modal-body">
            <div class="mb-3">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="uemail" value="<?php echo $_SESSION['email'] ?>" id="uemail">
             <p style="font-weight: bold;" id="konu"></p>
             <hr>
             <p id="message"></p>
             <br>
             <hr>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Cevap:</label>            
            <textarea class="form-control" id="cevap" name="cevap"></textarea>
          </div>          
            </div>
            <div class="modal-footer">
                <button type="submit" name="mesajcevapbtn" class="btn btn-primary">Cevapla</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>

            </div>
        </form>
        </div>
    </div>
</div>

<script>
        var mesajc = document.getElementById('answerModal')
        mesajc.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('id')              
        var email = button.getAttribute('email')
        var message = button.getAttribute('message')        
        var modal_id=mesajc.querySelector('#id') 
        var modal_email=mesajc.querySelector('#email') 
        var modal_message=mesajc.querySelector('#message')           
        modal_email.textContent="Mesaj Gönderen :" + email   
       modal_message.textContent="Ne yazmış bu gereksiz : "+message    
        modal_id.value=id
      
    })
</script>