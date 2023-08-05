
<?php include("header.php")?>

<style>
.modal-btn{
  margin-top:30px;
}
</style>

<center>a
  

<div class="mt-5">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button></div>
</center>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>






<?php include("footer.php")?>