<?php
error_reporting(0);

$correo = $_POST["correo"];
$asunto = $_POST["asunto"];





require_once '../db/db.php';
require_once('../pdf/fpdf.php');
include_once "../models/cotizar_model.php";

$conexion = Conectar::conexion();

class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

//==========================================================================                Configuracion de tablas
function Row($data,$alinea)
{
    //Calculate the height of the row
    $nb=0;
    for($i=1;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=6*$nb;//alto de la fila
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    $fill = true;
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        if($i<=0)// verifico menor que 5 para alinear las columnas
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        else // verifico si es encabezado para alinearlo a la izquierda
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border

        $this->Rect($x,$y,$w,$h);
        $this->MultiCell($w,6,$data[$i],8,$a,'true'); //aqui modifique ante 5,1
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);

    }
    //Go to the next line
    $this->Ln($h);
}

//==========================================================================                Configuracion de tablas

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

//==========================================================================             Encabezados

function Header()
{

//$this->Image('../../statics/logo.jpg',7,4,40,25);
//$this->Image('img/logo' ,240,5,25,20);

$id = (isset($_POST['IDe'])) ? $_POST['IDe'] : '';

$tipo=new Cotizar_model();
$tipo = $tipo->get_cotizarid($id);

foreach($tipo as $coti){
    $cliente = $coti['cliente'];
    $direccion = $coti['direccion'];
    $telefono = $coti['telefono'];
    $costo = $coti['costo'];
    $municipio = $coti['municipio'];
    $colonia = $coti['colonia'];
    $calle = $coti['calle'];
    $numero = $coti['numero'];
    $cp = $coti['cp'];
}

$this->SetFont('Arial','B',18);
$this->SetXY(10,16);
$this->Cell(10,6,utf8_decode("INOFIS"),0,1,'L');
$this->SetFont('Arial','',10);
$this->SetXY(10,21);
$this->Cell(0,6,utf8_decode("Servicio de Mantenimiento de Aire Acondicionado"),0,1,'L');
$this->SetXY(10,25);
$this->Cell(0,6,utf8_decode("Hugo Fuentes Aguilar Gutierrez"),0,1,'L');
$this->SetXY(10,29);
$this->Cell(0,6,utf8_decode("FUGH6507136L7"),0,1,'L');

$this->SetXY(170,25);
$this->SetFont('Arial','B',18);
$this->Cell(0,6,utf8_decode("COTIZACI??N"),0,1,'L');



$this->SetFont('Arial','B',14);
$this->SetXY(10,36);
$this->Cell(10,6,utf8_decode("Datos del destinatario"),0,1,'L');
$this->SetFont('Arial','',10);
$this->SetXY(10,40);
$this->Cell(0,6,"Nombre: ".utf8_decode($cliente),0,1,'L');
$this->SetXY(10,44);
$this->Cell(0,6,"Municipio: ".utf8_decode($municipio),0,1,'L');
$this->SetXY(10,48);
$this->Cell(0,6,"Colonia: ".utf8_decode($colonia),0,1,'L');
$this->SetXY(10,52);
$this->Cell(0,6,"Calle: ".utf8_decode($calle),0,1,'L');
$this->SetXY(10,56);
$this->Cell(0,6,"Numero: ".utf8_decode($numero),0,1,'L');
$this->SetXY(10,60);
$this->Cell(0,6,"Codigo postal: ".utf8_decode($cp),0,1,'L');
$this->SetXY(10,64);
$this->Cell(0,6,utf8_decode($telefono),0,1,'L');



}

//==========================================================================             Pie de la pagina

function Footer()
{

    $id = (isset($_POST['IDe'])) ? $_POST['IDe'] : '';

$tipo=new Cotizar_model();
$tipo = $tipo->get_cotizarid($id);

foreach($tipo as $coti){

    $costo = $coti['costo'];
}


    $this->SetFont('Arial','',12);
    $this->SetXY(170,150);
    $this->Cell(0,6,utf8_decode("Subtotal : $".number_format($costo,2) ),0,1,'L');
    $this->SetXY(170,156);
    $this->Cell(0,6,utf8_decode("IVA         :    16%"),0,1,'L');
    $this->SetXY(170,161);
    $this->Cell(0,6,utf8_decode("Total      : $".number_format(($costo*0.16) + $costo,2)  ),0,1,'L');

   $this->SetY(-25);
  $this->SetFont('Arial','',9);
  $this->Cell(187,10,'  ',0,0,'C');
  $this->SetY(-20);
  $this->Cell(187,10,' ',0,0,'C');
   $this->SetY(-15);
   $this->SetFont('Arial','I',8);
  $this->Cell(187,10,'Impreso:'.date("d/m/Y").', Hora:'.date("G:i:s"),0,0,'C');


}


//==========================================================================      Cuerpo del programas

}

    $pdf=new PDF('P','mm','Letter'); //P es verical y L horizontal
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetMargins(10,10,10);

    $id = (isset($_POST['IDe'])) ? $_POST['IDe'] : '';


    $alumn=$conexion->query("SELECT * from cotizar where id = '$id'");


     $pdf->Ln(3);

     $pdf->SetWidths(array(180,20));
     $pdf->SetFont('Arial','B',9,'L');
     $pdf->SetFillColor(1,113,185);//color blanco rgb
     $pdf->SetTextColor(255);
     $pdf->SetLineWidth(.3);
    for($i=0;$i<1;$i++)
            {
                $pdf->Row(array(utf8_decode('Servicio'),'Costo'),'L');
            }

    //***************-------------------------encabezados de las tablas
    $pdf->SetWidths(array(180,20));
    $pdf->SetFont('Arial','',10,'L');
   $pdf->SetFillColor(224,235,255);
    $pdf->SetFillColor(255,255,255);//color blanco rgb
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','',8);

        foreach( $alumn as $alumno ){
        $pdf->Row(array(utf8_decode($alumno['servicio']),$alumno['costo']),'L');
        }

$pdf->Output("C:xampp77/htdocs/facturacion/cotizacion.pdf","F");










//Recipiente
$to = $correo;

//remitente del correo
$from = 'ffreddy.mx@gmail.com';
$fromName = 'INOFIS';

//Asunto del email
$subject = 'Se envia adjunto en formato PDF su cotizaci??n'; 

//Ruta del archivo adjunto
$file = "C:/xampp77/htdocs/facturacion/cotizacion.pdf";

//Contenido del Email
$htmlContent = $asunto.'<h1>Cotizaci??n de la empresa INOFIS</h1>
    <p>Este correo electr??nico ha enviado desde script PHP.</p>';

//Encabezado para informaci??n del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//l??mite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparaci??n de archivo
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
        "Content-Description: ".basename($files[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail
$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//Estado de env??o de correo electr??nico
echo $mail?"<h1>Correo enviado.</h1>":"<h1>El env??o de correo fall??.</h1>";

header("refresh:2;url=cotizar.php");

?>