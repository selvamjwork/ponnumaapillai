<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

    <title>{{$us->user_id}}</title>
  </head>
  <body>
    <table>
    	<tr>
			<div class="row">
	    		<div class="col-md-4">
	    			<img height="80" width="80" src="http://www.ponnumaapillai.com/image/pmplogo.png">
	    		</div>
	    		<div class="col-md-6 pull-right">
	    			<h2>Ponnu Maapillai</h2>
	    			<h4><a href="www.ponnumaapillai.com">https://www.ponnumaapillai.com</a></h4>
	    			<hr>
	    			<div class="pull-right">PM ID : <strong>{{$us->user_id}}</strong></div>
	    		</div>
			</div>
    	</tr>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>