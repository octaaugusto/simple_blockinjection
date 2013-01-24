<?php

require_once("simple_blockinjection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="get" enctype="multipart/form-data" name="form1" id="form1">
<table width="700" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000" style="color:#fff;">FORM TIPO GET</td>
  </tr>
  <tr>
    <td width="150">Campo 1:</td>
    <td><label for="campo1"></label>
      <input type="text" name="campo1" id="campo1" /></td>
  </tr>
  <tr>
    <td>Campo 2:</td>
    <td><label for="campo2"></label>
      <textarea name="campo2" id="campo2" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="50"><input type="submit" name="btsend" id="btsend" value="Enviar" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="50">&nbsp;</td>
  </tr>
</table>
</form>

<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="700" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000" style="color:#fff;">FORM TIPO POST</td>
  </tr>
  <tr>
    <td width="150">Campo 1:</td>
    <td><label for="campo1"></label>
      <input type="text" name="campo1" id="campo1" /></td>
  </tr>
  <tr>
    <td>Campoe 2[0]:</td>
    <td><input type="text" name="campo2[]" id="campo2[]" /></td>
  </tr>
  <tr>
    <td>Campoe 2[1]:</td>
    <td><input type="text" name="campo2[]" id="campo2[]" /></td>
  </tr>
  <tr>
    <td>Campo 3:</td>
    <td><label for="campo3"></label>
      <textarea name="campo3" id="campo3" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>File 1:</td>
    <td><input type="file" name="file1" id="file1" /></td>
  </tr>
  <tr>
    <td>File 2[0]:</td>
    <td><input type="file" name="file2[]" id="file2[]" /></td>
  </tr>
  <tr>
    <td>File 2[1]:</td>
    <td><label for="file1">
      <input type="file" name="file2[]" id="file2[]" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btsend" id="btsend" value="Enviar" /></td>
  </tr>
</table>
</form>
</body>
</html>