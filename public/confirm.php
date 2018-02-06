<?php
	require __DIR__ . '/../vendor/autoload.php';

	if($qid = $_GET['qid']) {
		$quotation = new BE\Quotation;
		$q = $quotation::get($qid);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>
		body {
			padding-top: 50px;
		}
		.starter-template {
			padding: 40px 15px;
			text-align: center;
		}
		.form-group {
			display: table;
			content: " ";
		}
	</style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

		<div class="starter-template">
			<div class="panel panel-info">
				<div class="panel-heading">Review Order</div>
				<div class="panel-body">
					<?php
						foreach($q['subscriptions'] as $subscription) { ?>
							<div class="form-group">
								<div class="col-sm-3 col-xs-3">
									<img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="col-xs-12">Subscription</div>
									<div class="col-xs-12"><small>Quantity:<span><?php ?> days</span></small></div>
								</div>
								<div class="col-sm-3 col-xs-3 text-right">
									<h6><span>£</span><?php echo $subscription['total'] ?></h6>
								</div>
							</div>
							<div class="form-group"><hr /></div>
						<?php } ?>
						<?php
							foreach($q['services'] as $service) { ?>
								<div class="form-group">
									<div class="col-sm-3 col-xs-3">
										<img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
									</div>
									<div class="col-sm-6 col-xs-6">
										<div class="col-xs-12">Service</div>
										<div class="col-xs-12"><small>Quantity:<span><?php echo $service['weeks'] ?> weeks</span></small></div>
									</div>
									<div class="col-sm-3 col-xs-3 text-right">
										<h6><span>£</span><?php echo $service['total'] ?></h6>
									</div>
								</div>
								<div class="form-group"><hr /></div>
							<?php } ?>

							<div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order total</strong>
                                    <div class="pull-right"><span>£</span><span><?php echo $q['total'] ?></span></div>
                                </div>
                            </div>
				</div>
			</div>
		</div>


    </div><!-- /.container -->

	<script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
