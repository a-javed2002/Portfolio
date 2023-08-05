<?php
if (isset($_POST['btn_performed_update_show'])) {
    require 'partials/_connection.php';
    $performed_id = $_POST['id'];
    $sql = "SELECT * FROM `performed` join `product` on `performed`.product_id_FK = `product`.product_id where performed_id='$performed_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <label class="col-sm-3 col-form-label">Performed</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="<?php echo $data['performed_id'] ?>" id="performed-name-update" placeholder="Enter Here">
    </div>
    <div class="col-sm-9">
        <input type="hidden" class="form-control" value="<?php echo $data['performed_id'] ?>" id="performed-id">
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>

<?php
if (isset($_POST['btn_product_show'])) {
    require 'partials/_connection.php';
    $component_id = $_POST['id'];
    $sql = "SELECT * FROM `product` WHERE component_id_FK = '$component_id' ORDER BY product_name ASC";
    $res = mysqli_query($con, $sql);
?>
    <label class="col-sm-3 col-form-label">Product</label>
    <div class="col-sm-9">
        <div class="input-group mb-3">
            <select class="wide" id="test-id">
                <option selected disabled>Choose Product</option>
                <?php
                while ($data = mysqli_fetch_assoc($res)) {
                ?>
                    <option value="<?php echo $data['product_id'] ?>"><?php echo strtoupper($data['product_name']) ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>