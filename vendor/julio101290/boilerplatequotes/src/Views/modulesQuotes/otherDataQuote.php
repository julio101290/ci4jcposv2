<p>
<h3>Otros Datos</h3>
<div class="row">


    <div class="col-6">
        <div class="form-group">
            <label for="quoteTo"><?= lang("newQuote.quoteTo") ?>: </label>
            <input class="form-control" type="text" id='quoteTo' name='quoteTo'>

        </div>
    </div>

    <div class="col-3 ">
    </div>
    <div class="col-3 ">
        <div class="form-group">
            <label for="delivaryTime"><?= lang("newQuote.deleveryTime") ?>: </label>
            <input class="form-control" type="text" id='delivaryTime' name='delivaryTime'>

        </div>
    </div>


</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label><?= lang("newQuote.quoteObservations") ?></label>
            <textarea class="form-control" rows="3" placeholder="<?= lang("newQuote.quoteObservations") ?>" id="obsevations" name="obsevations" value="<?= $observations ?>"></textarea>
        </div>
    </div>
</div>
</p>