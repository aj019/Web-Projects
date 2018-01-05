<div class="container">
    <div class="row">
      <div class="col-md-5">
          <div class="suggested_draft" style="">
              <form role='form'>
                  <div class='form-group'>
                    <input type='hidden' placeholder='' id='suggested_draft' value='<?=$draft->id ?>' />
                    <input type='hidden' placeholder='' id='users_id' value='<?=$users_id ?>' />
                    <input type='hidden' placeholder='' id='case_id' value='<?=$case_id ?>' />
                    <input type='text' class='form-control' name='' id='suggested_draft_title' placeholder='Title' value='<?=$draft->draft_title ?>' disabled>
                    <textarea class='form-control' rows='5' cols='62' id='suggested_draft_content'><?=$draft->draft_content ?></textarea>
                  </div>
              </form>
              <div class='draft_update_button'>
                <button class='btn btn-primary' onclick='save_suggested_draft();'>Save</button>
                <button class='btn btn-primary' onclick='save_and_submit();'>Save and Submit</button>                
              </div>                  
          </div> <br>

          <div class="suggestion" style="">
              <form role='form'>
                  <div class='form-group'>
                    <label class="form-group">Suggestion:</label>
                    <textarea class='form-control' rows='5' cols='62' id='' disabled><?=$suggestion_text ?></textarea>
                  </div>
              </form>
                              
          </div>

      </div>  
    </div>
</div>

<script>
   
   function save_suggested_draft(){

    var draft_id = $('#suggested_draft').val();
    var draft_content = $('#suggested_draft_content').val();
    var draft_title = $('#suggested_draft_title').val();
    
      $.ajax({

        url: "<?=site_url('suggestion/saveSuggestedDraft'); ?>",
        data:"draft_id="+draft_id+"&draft_content="+draft_content+"&draft_title="+draft_title ,
        type:"POST",

        success:function(){

         window.location ="<?= site_url('home')?>";
        }
      });
   }
</script>
<script>
  function save_and_submit(){

    var draft_id = $('#suggested_draft').val();
    var draft_content = $('#suggested_draft_content').val();
    var draft_title = $('#suggested_draft_title').val();
    var users_id = $('#users_id').val();
    var case_id = $('#case_id').val();
    
      $.ajax({

        url: "<?=site_url('suggestion/saveSubmitSuggestedDraft'); ?>",
        data:"draft_id="+draft_id+"&draft_content="+draft_content+"&draft_title="+draft_title+"&case_id="+case_id+"&users_id="+users_id ,
        type:"POST",

        success:function(){

          window.location ="<?= site_url('home')?>";
        }
      });
   }
</script>