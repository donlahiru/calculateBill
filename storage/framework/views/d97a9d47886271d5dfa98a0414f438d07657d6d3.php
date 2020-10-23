<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Bill Calculate</title>
</head>
<body>
<?php echo e(Form::open(
    array(
        'method'=>'get',
        'url' => URL::to('amount'),
        'autocomplete'=>"off",
        'id' => "calculateBill-form",
        'class' => 'form-horizontal'
    ))); ?>

<div class="container">
    <div style="height: 200px"></div>
    <div class="panel panel-success">
        <div class="panel-heading">Calculate Bill</div>
        <div class="panel-body">
            <div class="form-group has-warning">
                <div class="col-sm-2">
                    <label for="numberOfUnits">Enter No Of Units</label>

                </div>
                <div class="col-sm-6 <?php echo e($errors->first('numberOfUnits') ? 'has-error' : ''); ?>">
                    <input type="text" class="form-control" id="numberOfUnits" name="numberOfUnits"
                           value="<?php echo e($units ?? ''); ?>">
                    <span class="help-block"><?php echo e($errors->first('numberOfUnits') ?? ''); ?></span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <label for="billAmount">Final Bill Amount</label>

                </div>
                <div class="col-sm-6">
                    <span id="finalBillAmount"><b>Rs. <?php echo e(isset($finalAmount) ? number_format($finalAmount,2) : '0.00'); ?></b></span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH /var/www/html/calculatebill/resources/views/bill.blade.php ENDPATH**/ ?>