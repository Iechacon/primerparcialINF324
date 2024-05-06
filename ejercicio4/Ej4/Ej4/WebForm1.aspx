<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="Ej4.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Holaaaaaaaa</title>
</head>
<body>
    <form id="form1" method="get" action="http://localhost/ejercicio4/form.php">
        <div>
            Persona:
            Nombre
            <input id="Text1" type="text" name="nombre" /><br />
            Apellido
            <input id="Text2" type="text" name="apellido" /><br />
            Dirección
            <input id="Text3" type="text" name="direccion" /><br />

            <input id="Submit1" type="submit" value="Aceptar" name="ok" />
            <input id="Submit2" type="submit" value="Cancelar" name="cancel" />

            Persona:
            Numero_cuenta
            <input id="Text4" type="text" name="numero_cuenta" /><br />
            Saldo
            <input id="Text5" type="text" name="saldo" /><br />
            Tipo_cuenta
            <input id="Text6" type="text" name="tipo_cuenta" /><br />
            persona_id
            <input id="Text7" type="text" name="persona_id" /><br />
            <input id="Submit3" type="submit" value="Aceptar" name="ok" />
            <input id="Submit4" type="submit" value="Cancelar" name="cancel" />

        </div>
    </form>
</body>
</html>
