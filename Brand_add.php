<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Thêm thương hiệu</title>
</head>
<body>
<h1 align=center>Thêm thương hiệu</h1>
	<form method=POST enctype="multipart/form-data" action="Brand_add_action.php">
		<table border=0 width=400 align=center>
			<tr>
				<td>Tên thương hiệu:</td>
				<td><input type=text name=tenthuonghieu></td>
			</tr>
			<tr>
				<td>Ảnh thương hiệu:</td>
				<td><input type=file name=anhthuonghieu></td>
			</tr>
			<tr>
				<td>Status:</td>
				<td>
					<input type=radio value=1 checked name=rdCstatus>Active
					<input type=radio value=0 name=rdCstatus>Inactive
				</td>
			</tr>
			<tr>
				<td align=right><input type=submit value=Save></td>
				<td><input type=Reset></td>
			</tr>
		</table>
	</form>
</body>
</html>